<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'published_at',
        'user_id',
        'category_id',
        'image',
        'active',
        'comments_enabled'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    protected static function booted()
    {
        static::creating(function ($post) {
            if (Auth::check()) {
                $post->user_id = Auth::id();
            }
        });
    }
    public function shortBody(){
        return Str::words($this->body, '15');
    }
    public function shortTitle(){
        return strtoupper(Str::words($this->title, '10'));
    }
    public function shortTitle2(){
        return Str::words($this->title, '10');
    }

    public function scopeFilter(Builder $query, array $filters):void{
        $query->when(
            $filters['search']??false,
            fn($query, $search)=>$query
            ->where('title','like','%'.$search.'%')
            ->orWhere('body', 'like', '%' . $search . '%')
        );
        $query->when(
            $filters['category']??false,
            fn($query, $search)=>$query->whereHas('category', fn($query, $category)=>$query->where('slug',$category))
        );
    }

}
