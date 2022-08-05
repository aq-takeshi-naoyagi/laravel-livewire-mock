<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestTask extends Model
{
    use HasFactory;
    protected $table = 'TestTasks';
    protected $fillable = ['task','deadline'];
}
