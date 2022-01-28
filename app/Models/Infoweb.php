<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infoweb extends Model
{
    use HasFactory;
    protected $table = 'infoweb';
    protected $guarded = [];
    public $timestamps = false;
}
