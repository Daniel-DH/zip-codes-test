<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table='municipality';

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
        return $this->hasMany('App\Zip_codes','municipality_key');
	}
}
