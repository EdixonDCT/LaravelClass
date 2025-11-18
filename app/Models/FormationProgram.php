<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Ficha;

class FormationProgram extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'ficha_id');
    }
}
