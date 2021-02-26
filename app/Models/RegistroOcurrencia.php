<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RegistroOcurrencia
 * @package App\Models
 * @version February 25, 2021, 5:05 am UTC
 *
 * @property \App\Models\Personal $personal
 * @property string $descripcion
 * @property string|\Carbon\Carbon $fecha
 * @property integer $personal_id
 */
class RegistroOcurrencia extends Model
{
    use SoftDeletes;

    public $table = 'registro_ocurrencias';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'descripcion',
        'fecha',
        'personal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'fecha' => 'datetime',
        'personal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required|string|max:255',
        'fecha' => 'required',
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
