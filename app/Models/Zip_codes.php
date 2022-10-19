<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zip_codes extends Model
{
    protected $table='zip_codes';

    use HasFactory;

    protected $primaryKey = 'zip_code';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = ['zip_code', 'locality', 'federal_entity_key', 'municipality_key'];

    protected $hidden = ['federal_entity_key', 'municipality_key','created_at','updated_at'];

    public function settlements()
    {
        return $this->hasMany('App\Models\Settlements','zip_code')->orderBy('key');
    }


    public function federal_entity(){
        return $this->belongsTo('App\Models\Federal_entity');
    }

    public function municipality(){
        return $this->belongsTo('App\Models\Municipality');
    }

}
