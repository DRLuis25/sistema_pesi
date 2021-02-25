<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Conductor
 * @package App\Models
 * @version February 25, 2021, 4:59 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $documentoInscripcions
 * @property \Illuminate\Database\Eloquent\Collection $registroPagoBases
 * @property string $dni
 * @property string $descripcion
 * @property string $certificado_pnp
 * @property string $brevete
 * @property string $fotocheck
 * @property string $recibo
 * @property string $foto
 */
class Conductor extends Model
{
    use SoftDeletes;

    public $table = 'conductor';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'dni',
        'descripcion',
        'certificado_pnp',
        'brevete',
        'fotocheck',
        'recibo',
        'foto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dni' => 'string',
        'descripcion' => 'string',
        'certificado_pnp' => 'string',
        'brevete' => 'string',
        'fotocheck' => 'string',
        'recibo' => 'string',
        'foto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dni' => 'required|string|max:8',
        'descripcion' => 'required|string|max:255',
        'certificado_pnp' => 'required|string|max:255',
        'brevete' => 'required|string|max:255',
        'fotocheck' => 'required|string|max:255',
        'recibo' => 'required|string|max:255',
        'foto' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documentoInscripcions()
    {
        return $this->hasMany(\App\Models\DocumentoInscripcion::class, 'conductor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function registroPagoBases()
    {
        return $this->hasMany(\App\Models\RegistroPagoBase::class, 'conductor_id');
    }
}
