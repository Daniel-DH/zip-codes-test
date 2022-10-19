<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Federal_entity extends Model
{
    protected $table='federal_entity';

    use HasFactory;

    protected $primaryKey = 'key';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = ['key', 'name'];

	protected $hidden = ['created_at','updated_at'];

    public function Zip_codes()
    {
        return $this->hasMany('App\Zip_codes','federal_entity_key');
	}
}
