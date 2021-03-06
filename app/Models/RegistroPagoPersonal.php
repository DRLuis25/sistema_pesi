<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RegistroPagoPersonal
 * @package App\Models
 * @version February 25, 2021, 5:07 am UTC
 *
 * @property \App\Models\Personal $personal
 * @property \Illuminate\Database\Eloquent\Collection $registroEgresos
 * @property number $monto
 * @property string|\Carbon\Carbon $fecha_pago
 * @property string $descripcion
 * @property integer $personal_id
 */
class RegistroPagoPersonal extends Model
{
    use SoftDeletes;

    public $table = 'registro_pago_personal';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'monto',
        'fecha_pago',
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
        'monto' => 'float',
        'fecha_pago' => 'datetime',
        'descripcion' => 'string',
        'personal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'monto' => 'required|numeric',
        'fecha_pago' => 'required',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroEgresos()
    {
        return $this->hasMany(\App\Models\RegistroEgreso::class, 'registro_pago_personal_id');
    }
}
