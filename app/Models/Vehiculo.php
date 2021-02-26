<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vehiculo
 * @package App\Models
 * @version February 25, 2021, 8:38 pm UTC
 *
 * @property \App\Models\Inscripcion $inscripcion
 * @property \Illuminate\Database\Eloquent\Collection $documentoInscripcions
 * @property string $placa
 * @property string $color
 * @property string $marca
 * @property string $modelo
 * @property integer $inscripcion_id
 */
class Vehiculo extends Model
{
    use SoftDeletes;

    public $table = 'vehiculo';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'placa',
        'color',
        'marca',
        'modelo',
        'inscripcion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'placa' => 'string',
        'color' => 'string',
        'marca' => 'string',
        'modelo' => 'string',
        'inscripcion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'placa' => 'required|string|max:255',
        'color' => 'nullable|string|max:255',
        'marca' => 'required|string|max:255',
        'modelo' => 'required|string|max:255',
        'inscripcion_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function inscripcion()
    {
        return $this->belongsTo(\App\Models\Inscripcion::class, 'inscripcion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documentoInscripcions()
    {
        return $this->hasMany(\App\Models\DocumentoInscripcion::class, 'vehiculo_id');
    }
}
