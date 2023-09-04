<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Sponsor;

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

    public function programmingLanguages(){
        return $this->belongsToMany(ProgrammingLanguages::class,'programming_languages_users');
    }

    public function valutations(){
        return $this->belongsToMany(Valutation::class,'user_valutations');
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    public function message(){
        return $this->hasMany(Message::class);
    }

    public function sponsors(){
        return $this->belongsToMany(Sponsor::class, 'sponsor_users')
            ->withPivot('start_date', 'end_date')
            ->withTimestamps();
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
