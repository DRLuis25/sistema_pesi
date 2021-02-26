<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FichaConductor
 * @package App\Models
 * @version February 25, 2021, 8:35 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $conductors
 * @property string $certificado_pnp
 * @property string $brevete_nro
 * @property string $brevete
 * @property string $fotocheck
 * @property string $dni
 * @property string $recibo
 * @property string $foto
 */
class FichaConductor extends Model
{
    use SoftDeletes;

    public $table = 'ficha_conductor';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $appends = ['full_name'];
    public $fillable = [
        'certificado_pnp',
        'brevete_nro',
        'brevete',
        'fotocheck',
        'dni',
        'recibo',
        'foto',
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'direccion',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'certificado_pnp' => 'string',
        'brevete_nro' => 'string',
        'brevete' => 'string',
        'fotocheck' => 'string',
        'dni' => 'string',
        'recibo' => 'string',
        'foto' => 'string',
        'nombres' => 'string',
        'apellidoPaterno' => 'string',
        'apellidoMaterno' => 'string',
        'direccion' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'certificado_pnp' => 'nullable',
        'brevete_nro' => 'required',
        'brevete' => 'nullable',
        'fotocheck' => 'nullable',
        'dni' => 'required|string|min:8|max:8',
        'recibo' => 'nullable',
        'foto' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'nombres' => 'string|min:4',
        'apellidoPaterno' => 'string|min:4',
        'apellidoMaterno' => 'string|min:4',
        'direccion' => 'string|nullable',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function conductors()
    {
        return $this->hasMany(\App\Models\Conductor::class, 'ficha_conductor_id');
    }

    public function getFullNameAttribute()
    {
        return $this->apellidoPaterno." ".$this->apellidoMaterno.", ".$this->nombres;
    }
}
