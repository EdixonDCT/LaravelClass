<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\WorkingDay;
use App\Models\StateReason;

class Assistance extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','working_day_id','reason_id','event_id'];

    public function workingDay()
    {
        return $this->belongsTo(WorkingDay::class, 'working_day_id');
    }
    public function event()
    {
        return $this->belongsTo(StateReason::class, 'reason_id');
    }
}
