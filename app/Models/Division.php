<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    public $table = 'divisions';

    protected $fillable = [
        'name'
    ];

    public function userDetail()
    {
    	return $this->hasMany(UserDetail::class);
    }
}