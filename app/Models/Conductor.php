<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Conductor
 * @package App\Models
 * @version February 25, 2021, 8:36 pm UTC
 *
 * @property \App\Models\FichaConductor $fichaConductor
 * @property \Illuminate\Database\Eloquent\Collection $documentoInscripcions
 * @property \Illuminate\Database\Eloquent\Collection $registroPagoBases
 * @property string|\Carbon\Carbon $fecha_contrato
 * @property string $observaciones
 * @property integer $ficha_conductor_id
 */
class Conductor extends Model
{
    use SoftDeletes;

    public $table = 'conductor';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'fecha_contrato',
        'observaciones',
        'ficha_conductor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_contrato' => 'datetime',
        'observaciones' => 'string',
        'ficha_conductor_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_contrato' => 'required',
        'observaciones' => 'nullable|string|max:255',
        'ficha_conductor_id' => 'required|unique:conductor',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
    public static $updateRules = [
        'fecha_contrato' => 'required',
        'observaciones' => 'nullable|string|max:255',
        'ficha_conductor_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fichaConductor()
    {
        return $this->belongsTo(\App\Models\FichaConductor::class, 'ficha_conductor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documentoInscripcions()
    {
        return $this->hasMany(\App\Models\DocumentoInscripcion::class, 'conductor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroPagoBases()
    {
        return $this->hasMany(\App\Models\RegistroPagoBase::class, 'conductor_id');
    }
}
