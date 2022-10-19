<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlements extends Model
{
    protected $table='settlements';

    use HasFactory;

    protected $primaryKey = 'key';

    protected $fillable = ['key', 'name','zone_type','settlement_type','zip_code_id'];

    protected $hidden = ['zip_code_id','created_at','updated_at'];

/**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'settlement_type' => 'array',
    ];
}
