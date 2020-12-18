<?php

namespace App\Http\Controllers\Auth;

use Hash;
use JWTAuth;
use App\Models\User;
use App\Models\Setting;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;

class LoginAPIController extends AppBaseController
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth.jwt')->except(['login', 'register']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $token = null;
        $credentials = request(['username', 'password']);
        // return 'asdsad';
        $user = User::where('username', $request->username)->first();
        //si el USUARIO NO EXISTE BOTA ERROR
        if (!$user) {
            return $this->errorResponse('El usuario no existe', 401);
        }

        //SI SUS CONTRASEÑAS NO COINCIDEN BOTA ERROR
        if (!Hash::check($request['password'], $user->password)) {
            return $this->errorResponse('Password incorrecto', 401);
        }

        //SI EL USUARIO ESTA CON ESTADO INACTIVO BOTA ERROR
        if ($user->status === 'I') {
            return $this->errorResponse('Usted ya realizó su voto. Muchas gracias.', 401);
        }

        //SI EL ADMINISTRADOR AUN NO ELIGIO LA ELECCION POR DEFECTO ENTONCES NO PODRA ENTRAR NI EL COMITE NI EL ELECTOR.
        // $electorRole =  $user->hasRole(['elector', 'comite']);

        //ELECCION POR DEFECTO
        $electionSetting = Setting::getSetting('default_election');
        $election = Election::find($electionSetting);
        if ($user->hasRole(['comite', 'elector'])) {
            if (!$election) {
                return $this->errorResponse('Aún no hay Elecciones programadas. Espere por favor.', 403);
            }
        }


        // if ($user->hasRole(['comite'])) {
        // }

        //POR AHORA ESTO FUNCIONA.
        //COMPARAMOS LA FECHA DE AHORA CON LA QUE ESTA EN LA BASE DE DATOS. Y SI ES MAYOR PODRA INGRESAR.
        //SI NO PUES BOTAMOS ERRORES.
        if ($user->hasRole(['elector'])) {
            //FECHA DE HOY
            $now = Carbon::now();
            //FECHA DEL EVENTO
            $election_date = Carbon::parse($election->start_date)->format('Y-m-d H:i:s');
            $remaining_minutes =  $now->diffInMinutes($election_date);
            if ($now->lessThan($election_date)) {
                if ($remaining_minutes < 10) {
                    if ($remaining_minutes < 2) {
                        return $this->errorResponse('Aun no empiezan las votaciones. Falta ' . $remaining_minutes . ' minuto', 403);
                    }
                    return $this->errorResponse('Aun no empiezan las votaciones. Faltan ' . $remaining_minutes . ' minutos', 403);
                }
                return $this->errorResponse('Aun no empiezan las votaciones.', 403);
            }
        }

        //
        //INTENTAMOS LOGUEAR
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->errorResponse('Usuario o password incorrectos', 401);
            }
        } catch (\Throwable $th) {
            return $th;
            return $this->errorResponse('No se pudo generar el token', 500);
        }
        if (Hash::check($request['password'], bcrypt('password')) && $user->status === 'R') {
            return $this->respondWithTokenToResetPasword($token);
        }
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(['data' => Auth::user()->with(['employee', 'roles'])->where('id', Auth::id())->first()]);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->guard('api')->refresh());
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        $header = $request->header('Authorization');

        if ($header) {
            try {
                JWTAuth::invalidate($request->token);

                return response()->json([
                    'success' => true,
                    'message' => 'Sesion cerrada satisfactoriamente'
                ]);
            } catch (JWTException $exception) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, the user cannot be logged out'
                ], 500);
            }
        }
        $this->errorResponse('No existe el token en la cabecera', 500);
    }
    public function resetPassword(Request $request, User $user)
    {
        $user->password = $request->password;
        $user->status = 'A';
        $user->save();
        return $this->successResponse('Contraseña actualizada correctamente.', 200);
    }

    /**
     * @param RegistrationFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $token = JWTAuth::fromUser($user);
        return $this->respondWithToken($token);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires' => auth('api')->factory()->getTTL(),
        ])->header('Authorization', $token);;
    }
    protected function respondWithTokenToResetPasword($token)
    {
        return response()->json([
            'reset_password' => true,
            'token_type' => 'bearer',
            'expires' => auth('api')->factory()->getTTL(),
        ])->header('Authorization', $token);;
    }
}
