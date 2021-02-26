<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JustificacionFalta
 * @package App\Models
 * @version February 25, 2021, 5:06 am UTC
 *
 * @property \App\Models\RegistroSancion $registroSancion
 * @property string|\Carbon\Carbon $fecha_justificacion
 * @property string $descripcion
 * @property integer $registro_sancion_id
 */
class JustificacionFalta extends Model
{
    use SoftDeletes;

    public $table = 'justificación_falta';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'fecha_justificacion',
        'descripcion',
        'registro_sancion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_justificacion' => 'datetime',
        'descripcion' => 'string',
        'registro_sancion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_justificacion' => 'required',
        'descripcion' => 'required|string|max:255',
        'registro_sancion_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function registroSancion()
    {
        return $this->belongsTo(\App\Models\RegistroSancion::class, 'registro_sancion_id');
    }
}
