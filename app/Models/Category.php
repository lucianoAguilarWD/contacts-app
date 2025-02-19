<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $fillable = ['name'];
    public function User(){
        return $this->belongsToMany(User::class, 'category_user');
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
