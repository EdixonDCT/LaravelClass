<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FormationProgram;
use App\Models\Ficha;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','names','last_names','phone','email','ficha_id'];

    public function users()
    {
        return $this->belongsTo(FormationProgram::class, 'user_id');
    }

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'ficha_id');
    }
}
