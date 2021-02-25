<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContratoPersonal
 * @package App\Models
 * @version February 25, 2021, 4:56 am UTC
 *
 * @property \App\Models\Personal $personal
 * @property integer $personal_id
 */
class ContratoPersonal extends Model
{
    use SoftDeletes;

    public $table = 'contrato_personal';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'personal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
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
