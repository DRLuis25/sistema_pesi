<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContratoServicio
 * @package App\Models
 * @version February 25, 2021, 5:00 am UTC
 *
 * @property \App\Models\Cliente $cliente
 * @property \Illuminate\Database\Eloquent\Collection $registroServicioInvitados
 * @property integer $cliente_id
 * @property string $lugar
 * @property string $duracion
 * @property string $fecha
 */
class ContratoServicio extends Model
{
    use SoftDeletes;

    public $table = 'contrato_servicio';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'cliente_id',
        'lugar',
        'duracion',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        'lugar' => 'string',
        'duracion' => 'string',
        'fecha' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cliente_id' => 'required',
        'lugar' => 'required|string|max:255',
        'duracion' => 'required|string|max:255',
        'fecha' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroServicioInvitados()
    {
        return $this->hasMany(\App\Models\RegistroServicioInvitado::class, 'contrato_servicio_id');
    }
}
