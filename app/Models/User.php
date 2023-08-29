<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'password',
        'surname',
        'email',
        'date_of_birth',
        'address',
        'bio',
        'github_link',
        'linkedin_link',
        'vat_number',
        'phone_number',
        'soft_skill',
        'img_path',
        'bg_dev',
        'cv',
    ];

    public function languages(){
        return $this->belongsToMany(Code_language::class);
    }

    public function valutations(){
        return $this->belongsToMany(Valutation::class);
    }

    public function review(){
        return $this->belongsTo(Review::class);
    }

    public function message(){
        return $this->belongsTo(Message::class);
    }

    public function sponsor(){
        return $this->belongsToMany(Sponsor::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
