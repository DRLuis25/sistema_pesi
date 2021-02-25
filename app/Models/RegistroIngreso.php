<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RegistroIngreso
 * @package App\Models
 * @version February 25, 2021, 5:08 am UTC
 *
 * @property \App\Models\RegistroPagoBase $registroPagoBase
 * @property number $monto
 * @property string|\Carbon\Carbon $fecha_ingreso
 * @property string $descripcion
 * @property integer $registro_pago_base_id
 */
class RegistroIngreso extends Model
{
    use SoftDeletes;

    public $table = 'registro_ingreso';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'monto',
        'fecha_ingreso',
        'descripcion',
        'registro_pago_base_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'monto' => 'float',
        'fecha_ingreso' => 'datetime',
        'descripcion' => 'string',
        'registro_pago_base_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'monto' => 'required|numeric',
        'fecha_ingreso' => 'required',
        'descripcion' => 'required|string|max:255',
        'registro_pago_base_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function registroPagoBase()
    {
        return $this->belongsTo(\App\Models\RegistroPagoBase::class, 'registro_pago_base_id');
    }
}
