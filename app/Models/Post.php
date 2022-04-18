<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories(){
        return $this->belongsToMany( Category::class)->withTimeStamps();
    }

     public function tags(){
        return $this->belongsToMany( Tag::class)->withTimeStamps();
    }
    public function favourite_to_users(){
        return $this->belongsToMany(User::class)->withTimeStamps();
    }

     public function comments(){
          return $this->hasMany(Comment::class);
    }

    public function scopeApproved($query){
        return $query->where('is_approved', 1);
    }
    public function scopePublished($query){
        return $query->where('status', 1);
    }

    public function scopeNotApproved($query){
        return $query->where('is_approved', 0);
    }
}
