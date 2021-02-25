<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsistenciaPersonal
 * @package App\Models
 * @version February 25, 2021, 5:04 am UTC
 *
 * @property \App\Models\Personal $personal
 * @property string|\Carbon\Carbon $fecha
 * @property string $estado
 * @property integer $personal_id
 */
class AsistenciaPersonal extends Model
{
    use SoftDeletes;

    public $table = 'asistencia_personal';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'fecha',
        'estado',
        'personal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha' => 'datetime',
        'estado' => 'string',
        'personal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha' => 'required',
        'estado' => 'required|string|max:1',
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
