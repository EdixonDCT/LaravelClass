<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Schedule;
use App\Models\Assistance;

class WorkingDay extends Model
{
    use HasFactory;

     protected $fillable = ['name','schedule_id'];  

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function assistance()
    {
        return $this->hasMany(Assistance::class, 'working_day_id');
    }
}
