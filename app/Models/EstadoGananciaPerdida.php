<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EstadoGananciaPerdida
 * @package App\Models
 * @version February 25, 2021, 5:10 am UTC
 *
 * @property \App\Models\Personal $personal
 * @property number $utilidad_bruta
 * @property number $impuestos
 * @property string|\Carbon\Carbon $fecha
 * @property string $descripcion
 * @property integer $personal_id
 */
class EstadoGananciaPerdida extends Model
{
    use SoftDeletes;

    public $table = 'estado_ganancia_perdida';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'utilidad_bruta',
        'impuestos',
        'fecha',
        'descripcion',
        'personal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'utilidad_bruta' => 'float',
        'impuestos' => 'float',
        'fecha' => 'datetime',
        'descripcion' => 'string',
        'personal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'utilidad_bruta' => 'required|numeric',
        'impuestos' => 'required|numeric',
        'fecha' => 'required',
        'descripcion' => 'required|string|max:255',
        'personal_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function personal()
    {
        return $this->belongsTo(\App\Models\Personal::class, 'personal_id');
    }
}
