<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RegistroSancion
 * @package App\Models
 * @version February 25, 2021, 5:05 am UTC
 *
 * @property \App\Models\Personal $personal
 * @property \Illuminate\Database\Eloquent\Collection $justificacionFalta
 * @property string|\Carbon\Carbon $fecha
 * @property string $observacion
 * @property integer $personal_id
 */
class RegistroSancion extends Model
{
    use SoftDeletes;

    public $table = 'registro_sancion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'fecha',
        'observacion',
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
        'observacion' => 'string',
        'personal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha' => 'required',
        'observacion' => 'required|string|max:255',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function justificacionFalta()
    {
        return $this->hasMany(\App\Models\JustificacionFaltum::class, 'registro_sancion_id');
    }
}
