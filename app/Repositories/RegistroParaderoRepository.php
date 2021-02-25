<?php

namespace App\Repositories;

use App\Models\RegistroParadero;
use App\Repositories\BaseRepository;

/**
 * Class RegistroParaderoRepository
 * @package App\Repositories
 * @version February 25, 2021, 4:54 am UTC
*/

class RegistroParaderoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'direccion'
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
        return RegistroParadero::class;
    }
}
