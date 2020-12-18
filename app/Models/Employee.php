<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema()
 */
class Employee extends Model
{
    /**
     *
     *  @OA\Property(
     *      property="name",
     *      description="name of the Employee",
     *      type="string"
     *  ),
     *  @OA\Property(
     *      property="alias",
     *      description="alias of the Employee",
     *      type="string"
     *  ),
     *  @OA\Property(
     *      property="phone",
     *      description="phone just 9 numbers",
     *      type="integer",
     *      format="int32"
     *  ),
     *  @OA\Property(
     *      property="status",
     *      description="status like: created=C, deleted=D",
     *      type="char",
     *  ),
     *  @OA\Property(
     *      property="created_at",
     *      description="date when Employee was created",
     *      type="string",
     *      format="date-time"
     *  ),
     *  @OA\Property(
     *      property="updated_at",
     *      description="date when Employee was updated",
     *      type="string",
     *      format="date-time"
     *  )
     */

    public $fillable = [
        'name',
        'father_last_name',
        'mother_last_name',
        'condition',
        'dni'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'integer',
        'name'  => 'string',
        'father_last_name' => 'string',
        'mother_last_name' => 'integer',
        'condition' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'  => 'required|size:50',
        'father_last_name' => 'string|size:20',
        'mother_last_name' => 'numeric|max:999999999',
        'condition' => 'string|size:1'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function employee_groups()
    {
        return $this->hasMany(EmployeeGroup::class);
    }
}
