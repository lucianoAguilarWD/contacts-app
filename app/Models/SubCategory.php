<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function User()
    {
        return $this->belongsToMany(User::class, 'user_sub_categories');
    }
}
