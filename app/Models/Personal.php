<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personal
 * @package App\Models
 * @version February 25, 2021, 4:55 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $actividads
 * @property \Illuminate\Database\Eloquent\Collection $asistenciaPersonals
 * @property \Illuminate\Database\Eloquent\Collection $balanceGenerals
 * @property \Illuminate\Database\Eloquent\Collection $contratoPersonals
 * @property \Illuminate\Database\Eloquent\Collection $estadoGananciaPerdidas
 * @property \Illuminate\Database\Eloquent\Collection $reclamos
 * @property \Illuminate\Database\Eloquent\Collection $registroContables
 * @property \Illuminate\Database\Eloquent\Collection $registroOcurrencias
 * @property \Illuminate\Database\Eloquent\Collection $registroPagoBases
 * @property \Illuminate\Database\Eloquent\Collection $registroPagoPersonals
 * @property \Illuminate\Database\Eloquent\Collection $registroSanciones
 * @property \Illuminate\Database\Eloquent\Collection $registroTorneos
 * @property \Illuminate\Database\Eloquent\Collection $registroTributarios
 * @property \Illuminate\Database\Eloquent\Collection $reglamentos
 * @property \Illuminate\Database\Eloquent\Collection $reporteInspeccions
 * @property \Illuminate\Database\Eloquent\Collection $reporteSanciones
 * @property string $nombres
 * @property string $apellidoPaterno
 * @property string $apellidoMaterno
 * @property number $precio
 * @property string $tipo
 */
class Personal extends Model
{
    use SoftDeletes;

    public $table = 'personal';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'precio',
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombres' => 'string',
        'apellidoPaterno' => 'string',
        'apellidoMaterno' => 'string',
        'precio' => 'float',
        'tipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombres' => 'required|string|max:255',
        'apellidoPaterno' => 'required|string|max:255',
        'apellidoMaterno' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'tipo' => 'required|string|max:1',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function actividads()
    {
        return $this->hasMany(\App\Models\Actividad::class, 'gerente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asistenciaPersonals()
    {
        return $this->hasMany(\App\Models\AsistenciaPersonal::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function balanceGenerals()
    {
        return $this->hasMany(\App\Models\BalanceGeneral::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratoPersonals()
    {
        return $this->hasMany(\App\Models\ContratoPersonal::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function estadoGananciaPerdidas()
    {
        return $this->hasMany(\App\Models\EstadoGananciaPerdida::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reclamos()
    {
        return $this->hasMany(\App\Models\Reclamo::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroContables()
    {
        return $this->hasMany(\App\Models\RegistroContable::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroOcurrencias()
    {
        return $this->hasMany(\App\Models\RegistroOcurrencia::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroPagoBases()
    {
        return $this->hasMany(\App\Models\RegistroPagoBase::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroPagoPersonals()
    {
        return $this->hasMany(\App\Models\RegistroPagoPersonal::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroSanciones()
    {
        return $this->hasMany(\App\Models\RegistroSancione::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroTorneos()
    {
        return $this->hasMany(\App\Models\RegistroTorneo::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroTributarios()
    {
        return $this->hasMany(\App\Models\RegistroTributario::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reglamentos()
    {
        return $this->hasMany(\App\Models\Reglamento::class, 'gerente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reporteInspeccions()
    {
        return $this->hasMany(\App\Models\ReporteInspeccion::class, 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reporteSanciones()
    {
        return $this->hasMany(\App\Models\ReporteSancione::class, 'personal_id');
    }
}