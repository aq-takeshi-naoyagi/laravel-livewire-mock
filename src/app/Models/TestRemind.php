<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestRemind extends Model
{
    use HasFactory;
    protected $table = 'TestReminds';
    protected $fillable = ['task','deadline'];
}
