<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumnoMaterium
 *
 * @property $id
 * @property $alumno_id
 * @property $materia_id
 *
 * @property Alumno $alumno
 * @property Materia $materia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AlumnoMaterium extends Model
{
    
    static $rules = [
		'alumno_id' => 'required',
		'materia_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    public $timestamps = false;
    
    protected $fillable = ['alumno_id','materia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alumno()
    {
        return $this->hasOne('App\Models\Alumno', 'id', 'alumno_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'materia_id');
    }
    

}
