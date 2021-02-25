<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Inscripcion
 * @package App\Models
 * @version February 25, 2021, 4:58 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $propietarios
 * @property \Illuminate\Database\Eloquent\Collection $vehiculos
 * @property string $tarjeta_propiedad
 * @property string $soat_afocat
 * @property string $certificado_gps
 * @property string $certificado_gas
 * @property string $revision_tecnica
 * @property string $dni
 * @property string $nombre_propietario
 * @property string $apellidoPaterno_propietario
 * @property string $apellidoMaterno_propietario
 * @property string $telefono_propietario
 */
class Inscripcion extends Model
{
    use SoftDeletes;

    public $table = 'inscripcion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'tarjeta_propiedad',
        'soat_afocat',
        'certificado_gps',
        'certificado_gas',
        'revision_tecnica',
        'dni',
        'nombre_propietario',
        'apellidoPaterno_propietario',
        'apellidoMaterno_propietario',
        'telefono_propietario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tarjeta_propiedad' => 'string',
        'soat_afocat' => 'string',
        'certificado_gps' => 'string',
        'certificado_gas' => 'string',
        'revision_tecnica' => 'string',
        'dni' => 'string',
        'nombre_propietario' => 'string',
        'apellidoPaterno_propietario' => 'string',
        'apellidoMaterno_propietario' => 'string',
        'telefono_propietario' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tarjeta_propiedad' => 'required|string|max:255',
        'soat_afocat' => 'required|string|max:255',
        'certificado_gps' => 'required|string|max:255',
        'certificado_gas' => 'required|string|max:255',
        'revision_tecnica' => 'required|string|max:255',
        'dni' => 'required|string|max:8',
        'nombre_propietario' => 'required|string|max:255',
        'apellidoPaterno_propietario' => 'required|string|max:255',
        'apellidoMaterno_propietario' => 'required|string|max:255',
        'telefono_propietario' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function propietarios()
    {
        return $this->hasMany(\App\Models\Propietario::class, 'inscripcion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function vehiculos()
    {
        return $this->hasMany(\App\Models\Vehiculo::class, 'inscripcion_id');
    }
}
