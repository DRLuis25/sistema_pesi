<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Propietario
 * @package App\Models
 * @version February 25, 2021, 10:13 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $documentoInscripcions
 * @property \Illuminate\Database\Eloquent\Collection $inscripcions
 * @property string $dni
 * @property string $nombre_propietario
 * @property string $apellidoPaterno_propietario
 * @property string $apellidoMaterno_propietario
 * @property string $telefono_propietario
 */
class Propietario extends Model
{
    use SoftDeletes;

    public $table = 'propietario';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $appends = ['full_name'];

    public $fillable = [
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
        'dni' => 'required|string|max:8|min:8',
        'nombre_propietario' => 'required|string|max:255|min:4|regex:/(^[A-Za-z ]+$)+/',
        'apellidoPaterno_propietario' => 'required|string|max:255|min:4|regex:/(^[A-Za-z ]+$)+/',
        'apellidoMaterno_propietario' => 'required|string|max:255|min:4|regex:/(^[A-Za-z ]+$)+/',
        'telefono_propietario' => 'required|string|max:14',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documentoInscripcions()
    {
        return $this->hasMany(\App\Models\DocumentoInscripcion::class, 'propietario_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inscripcions()
    {
        return $this->hasMany(\App\Models\Inscripcion::class, 'propietario_id');
    }
    public function getFullNameAttribute()
    {
        return $this->apellidoPaterno_propietario." ".$this->apellidoMaterno_propietario.", ".$this->nombre_propietario;
    }
}
