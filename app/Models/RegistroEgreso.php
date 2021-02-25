<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RegistroEgreso
 * @package App\Models
 * @version February 25, 2021, 5:08 am UTC
 *
 * @property \App\Models\RegistroPagoPersonal $registroPagoPersonal
 * @property number $monto
 * @property string|\Carbon\Carbon $fecha_egreso
 * @property string $descripcion
 * @property integer $registro_pago_personal_id
 */
class RegistroEgreso extends Model
{
    use SoftDeletes;

    public $table = 'registro_egreso';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'monto',
        'fecha_egreso',
        'descripcion',
        'registro_pago_personal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'monto' => 'float',
        'fecha_egreso' => 'datetime',
        'descripcion' => 'string',
        'registro_pago_personal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'monto' => 'required|numeric',
        'fecha_egreso' => 'required',
        'descripcion' => 'required|string|max:255',
        'registro_pago_personal_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function registroPagoPersonal()
    {
        return $this->belongsTo(\App\Models\RegistroPagoPersonal::class, 'registro_pago_personal_id');
    }
}
