<?php

namespace App\Http\Repositories;

use App\Models\Charge;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 * @version April 10, 2020, 7:21 pm -05
 */

class ChargeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Charge::class;
    }
}
