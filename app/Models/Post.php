<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function getRouteKeyName() {
        return 'slug';
      }

    protected $fillable = ["title","body","slug","user_id"];

    protected $filters = [];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    public function user(){
        // $this->belongsTo(User::class);
       return $this->belongsTo("App\Models\User");
    }
    public function category(){
        return $this->belongsToMany("App\Models\Category");
    }
}
