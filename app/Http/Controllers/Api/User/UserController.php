<?php


namespace App\Http\Controllers\Api\User;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Repositories\UserRepository;
use App\Http\Resources\User\UserResource;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\User\UserCollection;

class UserController extends AppBaseController
{
    /** @var  userRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        // TODO: Importante: esta es la policy que nos ayuda a determinar las acciones que puede hacer un usario.
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * @OA\Get(
     *     path="/users",
     *     summary="Mostrar Usuarios del sistema",
     *     tags={"users"},
     *     @OA\Response(
     *         response="401",
     *         description="Inserta tu token pues hermano!",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de Usuarios del sistema. Correcto",
     *     ),
     *     security={
     *         {"bearer": {}}
     *     }
     * )
     */
    public function index()
    {
        $users = $this->userRepository->all();
        // User::with()
        // var_dump(User::with('company', 'employee')->get());

        return $this->showAll(new UserCollection($users));
    }


    /**
     * @OA\Post(
     *     path="/users",
     *     tags={"users"},
     *     operationId="store",
     *     summary="Agregar un nuevo usuario.",
     *     @OA\RequestBody(
     *         description="usuario a ser creado",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Inserta tu token pues hermano!",
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Creado",
     *     ),
     *     security={
     *         {"bearer": {}}
     *     }
     * )
     */
    public function store(UserRequest $request)
    {
        $campos = $request->validated();
        $user = $this->userRepository->create($campos);

        return $this->showOne(new UserResource($user), 201);
    }

    /**
     * @OA\Get(
     *     path="/users/{userID}",
     *     summary="Buscar usuarios por ID",
     *     description="Retorna un usuarios",
     *     operationId="show",
     *     tags={"users"},
     *     @OA\Parameter(
     *         description="ID del usuarios a retornar",
     *         in="path",
     *         name="userID",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Inserta tu token pues hermano!",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="usuarios no existe"
     *     ),
     *     security={
     *       {"bearer": {}}
     *     }
     * )
     */
    public function show(User $user)
    {
        return $this->showOne(new UserResource($user), 200);
    }

    /**
     * @OA\Put(
     *     path="/users/{userID}",
     *     tags={"users"},
     *     operationId="update",
     *     summary="Actualizar una Usuario de productos existente",
     *     description="",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Usuario de productos a ser actualizada",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Parameter(
     *         description="ID del Usuario de productos a actualizar",
     *         in="path",
     *         name="userID",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuario de productos no encontrado",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Inserta tu token pues hermano!",
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Usuario de productos actualizado correctamente"
     *     ),
     *     security={
     *       {"bearer": {}}
     *     }
     * )
     */
    public function update(UserRequest $request, User $user)
    {
        $campos = $request->validated();

        $user = $this->userRepository->update($campos, $user);

        return $this->showOne(new UserResource($user), 200);
    }

    /**
     * @OA\Delete(
     *     path="/users/{userID}",
     *     summary="Elimina un Usuario de productos",
     *     description="",
     *     operationId="delete",
     *     tags={"users"},
     *     @OA\Parameter(
     *         description="Id del Usuario de productos a eliminar",
     *         in="path",
     *         name="userID",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuario de productos no encontrado",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Inserta tu token pues hermano!",
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Usuario de productos eliminado correctamente"
     *     ),
     *     security={
     *       {"bearer": {}}
     *     }
     * )
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->showOne(new UserResource($user), 200);
    }
}
