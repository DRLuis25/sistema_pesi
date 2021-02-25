<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Propietario
 * @package App\Models
 * @version February 25, 2021, 4:58 am UTC
 *
 * @property \App\Models\Inscripcion $inscripcion
 * @property \Illuminate\Database\Eloquent\Collection $documentoInscripcions
 * @property integer $inscripcion_id
 */
class Propietario extends Model
{
    use SoftDeletes;

    public $table = 'propietario';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'inscripcion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'inscripcion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'inscripcion_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function inscripcion()
    {
        return $this->belongsTo(\App\Models\Inscripcion::class, 'inscripcion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documentoInscripcions()
    {
        return $this->hasMany(\App\Models\DocumentoInscripcion::class, 'propietario_id');
    }
}
