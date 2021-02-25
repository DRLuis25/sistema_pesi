<?php

namespace App\Repositories;

use App\Models\Personal;
use App\Repositories\BaseRepository;

/**
 * Class PersonalRepository
 * @package App\Repositories
 * @version February 25, 2021, 4:55 am UTC
*/

class PersonalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'precio',
        'tipo'
    ];

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
        return Personal::class;
    }
}
