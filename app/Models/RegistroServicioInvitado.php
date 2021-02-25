<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RegistroServicioInvitado
 * @package App\Models
 * @version February 25, 2021, 5:01 am UTC
 *
 * @property \App\Models\ContratoServicio $contratoServicio
 * @property integer $contrato_servicio_id
 * @property number $costo
 */
class RegistroServicioInvitado extends Model
{
    use SoftDeletes;

    public $table = 'registro_servicio_invitado';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contrato_servicio_id',
        'costo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contrato_servicio_id' => 'integer',
        'costo' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contrato_servicio_id' => 'required',
        'costo' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contratoServicio()
    {
        return $this->belongsTo(\App\Models\ContratoServicio::class, 'contrato_servicio_id');
    }
}
