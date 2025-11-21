<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Reason;

class StateReason extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function reason()
    {
        return $this->hasMany(Reason::class, 'state_reason_id');
    }
}
