<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Role;
use App\Models\Comment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'username',
        'email',
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

// we have Role_id in user table that laravel automatically find the model name first
//  and the primary key of the model name. here Role is the model in users table and id is roles table's primary key.
//   if you dont use id then by defualt you have to declare foreign key and primary key inside the belongsTo method.
   
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function posts(){
        return $this->hasMany(Post::Class );
    }

    public function favourite_posts(){
        return $this->belongsToMany(Post::class)->withTimeStamps();
    }

     public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function scopeAuthors($query){
        return $query->where('role_id', 2);
    }
}

