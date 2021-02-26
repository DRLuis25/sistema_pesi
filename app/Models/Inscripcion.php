<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Inscripcion
 * @package App\Models
 * @version February 25, 2021, 10:14 pm UTC
 *
 * @property \App\Models\Propietario $propietario
 * @property \Illuminate\Database\Eloquent\Collection $vehiculos
 * @property string $tarjeta_propiedad
 * @property string $soat_afocat_numero
 * @property string $soat_afocat
 * @property string $certificado_gps
 * @property string $certificado_gas
 * @property string $revision_tecnica
 * @property integer $propietario_id
 * @property string $estado
 */
class Inscripcion extends Model
{
    use SoftDeletes;

    public $table = 'inscripcion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'tarjeta_propiedad',
        //'soat_afocat_numero',
        'soat_afocat',
        'certificado_gps',
        'certificado_gas',
        'revision_tecnica',
        'propietario_id',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tarjeta_propiedad' => 'string',
        //'soat_afocat_numero' => 'string',
        'soat_afocat' => 'string',
        'certificado_gps' => 'string',
        'certificado_gas' => 'string',
        'revision_tecnica' => 'string',
        'propietario_id' => 'integer',
        'estado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tarjeta_propiedad' => 'nullable|max:255',
        //'soat_afocat_numero' => 'required|string|max:255',
        'soat_afocat' => 'nullable|max:255',
        'certificado_gps' => 'nullable|max:255',
        'certificado_gas' => 'nullable|max:255',
        'revision_tecnica' => 'nullable|max:255',
        'propietario_id' => 'required|unique:inscripcion',
        'estado' => 'required|string|max:1',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'placa' => 'required|string|max:15|min:7',
        'color' => 'nullable|string|max:255|min:3',
        'marca' => 'required|string|max:255|min:2',
        'modelo' => 'required|string|max:255|min:1',
    ];
    public static $updateRules = [
        'tarjeta_propiedad' => 'nullable|max:255',
        //'soat_afocat_numero' => 'required|string|max:255',
        'soat_afocat' => 'nullable|max:255',
        'certificado_gps' => 'nullable|max:255',
        'certificado_gas' => 'nullable|max:255',
        'revision_tecnica' => 'nullable|max:255',
        'propietario_id' => 'required',
        'estado' => 'required|string|max:1',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function propietario()
    {
        return $this->belongsTo(\App\Models\Propietario::class, 'propietario_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function vehiculos()
    {
        return $this->hasMany(\App\Models\Vehiculo::class, 'inscripcion_id');
    }
}
