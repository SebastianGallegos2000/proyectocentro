<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedDay extends Model
{
    use HasFactory;
    protected $table = 'blocked_days';
    protected $fillable = ['date', 'reason'];
}
