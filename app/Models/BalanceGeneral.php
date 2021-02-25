<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BalanceGeneral
 * @package App\Models
 * @version February 25, 2021, 5:09 am UTC
 *
 * @property \App\Models\Personal $personal
 * @property number $activos
 * @property number $pasivos
 * @property number $capital
 * @property string|\Carbon\Carbon $fecha_pago_tributo
 * @property string $descripcion
 * @property integer $personal_id
 */
class BalanceGeneral extends Model
{
    use SoftDeletes;

    public $table = 'balance_general';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'activos',
        'pasivos',
        'capital',
        'fecha_pago_tributo',
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
        'activos' => 'float',
        'pasivos' => 'float',
        'capital' => 'float',
        'fecha_pago_tributo' => 'datetime',
        'descripcion' => 'string',
        'personal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'activos' => 'required|numeric',
        'pasivos' => 'required|numeric',
        'capital' => 'required|numeric',
        'fecha_pago_tributo' => 'required',
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
