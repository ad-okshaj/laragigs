<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];

    public function scopeFilter($query, array $filters) {
        // for home page tags filtering.
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%'); // searching in database ie. queries.
        }
        // for home page search bar filtering.
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%') // searching in database ie. queries.
                ->orWhere('company', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
         }
    }

    // Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}