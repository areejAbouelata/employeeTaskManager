<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'email',
        'password',
        'user_type' ,
        'last_name' ,
        'image'
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
        'password' => 'hashed',
    ];
    protected $appends = ['image' , 'full_name'];


    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id');
    }

    public function setImageAttribute($value)
    {
        if ($value && $value->isValid()) {
            if (isset($this->attributes['image']) && $this->attributes['image']) {
                if (file_exists(storage_path('app/public/images/user/'. $this->attributes['image']))) {
                    \File::delete(storage_path('app/public/images/user/'. $this->attributes['image']));
                }
            }
            $image = uploadFile($value,'user');
            $this->attributes['image'] = $image;
        }
    }

    public function getImageAttribute()
    {
        $image = isset($this->attributes['image']) && $this->attributes['image'] ? 'storage/images/user/'.$this->attributes['image'] : 'dashboardAssets/images/backgrounds/avatar.jpg';
        return asset($image);
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['name'] .$this->attributes['last_name'] ;
    }
}
