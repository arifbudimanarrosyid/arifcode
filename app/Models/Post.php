<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = [
        'created_at',
        'updated_at',
        'published_at',
    ];
    protected $with = ['category', 'comments'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function incrementViewCount() {
        $this->views++;
        return $this->save();
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
