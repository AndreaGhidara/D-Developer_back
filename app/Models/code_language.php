<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code_language extends Model
{
    use HasFactory;

    protected $fillable = [
        'technology'
    ];
    public function user(){
        return $this->belongsToMany(User::class);
    }
}