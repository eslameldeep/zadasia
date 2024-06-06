<?php

namespace App\Domain\Core\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Domain\Core\Traits\InteractWithChat;
use App\Domain\Echocloud\Mail\ResetPasswordEmail;
use App\Domain\Station\Models\Device;
use App\Domain\Station\Models\Template;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Support\Facades\Mail;

class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia, InteractWithChat;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

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

    public function adminlte_image()
    {
        return !empty($this->getFirstMediaUrl('avatar')) ? $this->getFirstMediaUrl('avatar') :
        'https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=' . $this->name;
    }

    public function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }

    public function adminlte_profile_url()
    {
        return 'dashboard.core.profile.edit';
    }

    public function getAvatarAttribute()
    {
        return !empty($this->getFirstMediaUrl('avatar')) ? $this->getFirstMediaUrl('avatar') :
        'https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=' . $this->name;
    }

    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     */
    public function sendPasswordResetNotification($token): void
    {
        if(request()->routeIs('dashboard.*')){
            $url = route('dashboard.password.reset' , $token);
        }else{
            $url = route('echocloud.password.reset' , $token);
        }
        Mail::to($this->email)->send(new ResetPasswordEmail($this , $url));
    }


    public function templates()
    {
        return $this->hasMany(Template::class);
    }


    public function templatesDevices()
    {
        return $this->belongsToMany(Device::class, 'device_user');
    }

    public function devices() {
        return $this->belongsToMany(Device::class ,'device_template_user' )->withPivot('template_id') ;
    }
    
}
