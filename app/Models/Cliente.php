<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 * @package App\Models
 * @version February 25, 2021, 4:57 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $contratoServicios
 * @property \Illuminate\Database\Eloquent\Collection $reclamos
 * @property \Illuminate\Database\Eloquent\Collection $registroServicioTaxis
 * @property string $nombres
 * @property string $apellidoPaterno
 * @property string $apellidoMaterno
 * @property string $telefono
 */
class Cliente extends Model
{
    use SoftDeletes;

    public $table = 'cliente';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'telefono'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombres' => 'string',
        'apellidoPaterno' => 'string',
        'apellidoMaterno' => 'string',
        'telefono' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombres' => 'required|string|max:255',
        'apellidoPaterno' => 'required|string|max:255',
        'apellidoMaterno' => 'required|string|max:255',
        'telefono' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratoServicios()
    {
        return $this->hasMany(\App\Models\ContratoServicio::class, 'cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reclamos()
    {
        return $this->hasMany(\App\Models\Reclamo::class, 'cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroServicioTaxis()
    {
        return $this->hasMany(\App\Models\RegistroServicioTaxi::class, 'cliente_id');
    }
}
