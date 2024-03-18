<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ststus extends Model
{
    use HasFactory;
    protected $table = 'states';
    protected $fillable = ['status', 'number', 'name'];
}
