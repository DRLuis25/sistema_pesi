<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ReporteSancion
 * @package App\Models
 * @version February 25, 2021, 5:07 am UTC
 *
 * @property \App\Models\Personal $personal
 * @property string|\Carbon\Carbon $fecha_creacion
 * @property integer $personal_id
 * @property string $archivo
 */
class ReporteSancion extends Model
{
    use SoftDeletes;

    public $table = 'reporte_sancion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'fecha_creacion',
        'personal_id',
        'archivo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_creacion' => 'datetime',
        'personal_id' => 'integer',
        'archivo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_creacion' => 'required',
        'personal_id' => 'required',
        'archivo' => 'required|string|max:255',
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
