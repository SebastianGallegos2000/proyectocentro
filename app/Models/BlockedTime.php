<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedTime extends Model
{
    use HasFactory;
    protected $table = 'blocked_time';
    protected $fillable = ['blockDate', 'blockTime'];
}
