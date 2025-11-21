<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\WorkingDay;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['star_time','end_time'];

    public function workingDay()
    {
        return $this->hasMany(WorkingDay::class, 'schedule_id');
    }
}
