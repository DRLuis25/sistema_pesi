<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DocumentoInscripcion
 * @package App\Models
 * @version February 25, 2021, 4:59 am UTC
 *
 * @property \App\Models\Conductor $conductor
 * @property \App\Models\Propietario $propietario
 * @property \App\Models\Vehiculo $vehiculo
 * @property \Illuminate\Database\Eloquent\Collection $inspeccions
 * @property integer $conductor_id
 * @property integer $propietario_id
 * @property integer $vehiculo_id
 */
class DocumentoInscripcion extends Model
{
    use SoftDeletes;

    public $table = 'documento_inscripcion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'conductor_id',
        'propietario_id',
        'vehiculo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'conductor_id' => 'integer',
        'propietario_id' => 'integer',
        'vehiculo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'conductor_id' => 'required',
        'propietario_id' => 'required',
        'vehiculo_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function conductor()
    {
        return $this->belongsTo(\App\Models\Conductor::class, 'conductor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function propietario()
    {
        return $this->belongsTo(\App\Models\Propietario::class, 'propietario_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vehiculo()
    {
        return $this->belongsTo(\App\Models\Vehiculo::class, 'vehiculo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inspeccions()
    {
        return $this->hasMany(\App\Models\Inspeccion::class, 'documento_inscripcion_id');
    }
}
