<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\stateReason;
use App\Models\Assistance;

class Reason extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','state_reason_id'];

    public function stateReason()
    {
        return $this->belongsTo(stateReason::class, 'state_reason_id');
    }
    
    public function assistance()
    {
        return $this->hasMany(Assistance::class, 'reason_id');
    }
}
//hasmany es ke otra tabla tiene su id
//belongsto es que tiene el id de otra tabla