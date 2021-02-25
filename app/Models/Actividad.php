<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Actividad
 * @package App\Models
 * @version February 25, 2021, 4:57 am UTC
 *
 * @property \App\Models\Personal $gerente
 * @property string $descripcion
 * @property integer $gerente_id
 * @property string|\Carbon\Carbon $fecha
 */
class Actividad extends Model
{
    use SoftDeletes;

    public $table = 'actividad';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'descripcion',
        'gerente_id',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'gerente_id' => 'integer',
        'fecha' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required|string|max:255',
        'gerente_id' => 'required',
        'fecha' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function gerente()
    {
        return $this->belongsTo(\App\Models\Personal::class, 'gerente_id');
    }
}
