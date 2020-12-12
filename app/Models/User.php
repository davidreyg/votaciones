<?php

namespace App\Models;

use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @OA\Schema()
 */
class User extends Authenticatable implements HasMedia, JWTSubject
{
    use Notifiable, InteractsWithMedia, HasRoles, HasPermissions;

    /**
     *
     *      @OA\Property(
     *          property="id",
     *          description="id",
     *          type="integer",
     *      ),
     *      @OA\Property(
     *          property="uesrname",
     *          description="Username of the User",
     *          type="string"
     *      ),
     *      @OA\Property(
     *          property="password",
     *          description="Passowrd of the User",
     *          type="string"
     *      ),
     *      @OA\Property(
     *          property="Email",
     *          description="Email of the User",
     *          type="integer",
     *          format="int32"
     *      ),
     *      @OA\Property(
     *          property="employee_id",
     *          description="Employee id of the User",
     *          type="string"
     *      ),
     *      @OA\Property(
     *          property="company_id",
     *          description="Company id of the User",
     *          type="string"
     *      ),
     *      @OA\Property(
     *          property="created_at",
     *          description="When the User was created",
     *          type="string",
     *          format="date-time"
     *      ),
     *      @OA\Property(
     *          property="updated_at",
     *          description="When the User was updated",
     *          type="string",
     *          format="date-time"
     *      )
     * )
     */



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'employee_id',
        'company_id',
    ];

    // protected $appends = [
    //     'formattedCreatedAt',
    //     'avatar'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'email' => 'string',
        'password' => 'string',
        'employee_id' => 'integer',
        'company_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username'  => 'required|string',
        'email' => 'required|string|email',
        // 'password' => 'nullable|string',
        'company_id' => 'required|exists:companies,id',
        'employee_id' => 'required|exists:employees,id',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getFormattedCreatedAtAttribute()
    {
        $dateFormat = CompanySetting::getSetting('carbon_date_format', $this->company_id);
        return Carbon::parse($this->created_at)->format($dateFormat);
    }

    public function getAvatarAttribute()
    {
        $avatar = $this->getMedia('admin_avatar')->first();
        if ($avatar) {
            return  asset($avatar->getUrl());
        }
        return;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
