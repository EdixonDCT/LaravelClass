<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FormationProgram;

class Ficha extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','programa_id'];

    public function formationProgram()
    {
        return $this->belongsTo(FormationProgram::class, 'formation_program_id');
    }
}
