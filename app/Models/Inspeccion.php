<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Inspeccion
 * @package App\Models
 * @version February 25, 2021, 5:00 am UTC
 *
 * @property \App\Models\DocumentoInscripcion $documentoInscripcion
 * @property integer $documento_inscripcion_id
 * @property string $observaciones
 * @property string|\Carbon\Carbon $fecha
 * @property string $estado
 */
class Inspeccion extends Model
{
    use SoftDeletes;

    public $table = 'inspeccion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'documento_inscripcion_id',
        'observaciones',
        'fecha',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'documento_inscripcion_id' => 'integer',
        'observaciones' => 'string',
        'fecha' => 'datetime',
        'estado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'documento_inscripcion_id' => 'required',
        'observaciones' => 'required|string|max:255',
        'fecha' => 'required',
        'estado' => 'required|string|max:1',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function documentoInscripcion()
    {
        return $this->belongsTo(\App\Models\DocumentoInscripcion::class, 'documento_inscripcion_id');
    }
}
