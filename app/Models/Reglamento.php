<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reglamento
 * @package App\Models
 * @version February 25, 2021, 4:56 am UTC
 *
 * @property \App\Models\Personal $gerente
 * @property string $descripcion
 * @property integer $gerente_id
 */
class Reglamento extends Model
{
    use SoftDeletes;

    public $table = 'reglamento';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'descripcion',
        'gerente_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'gerente_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required|string|max:255',
        'gerente_id' => 'required',
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
