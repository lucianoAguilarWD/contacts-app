<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Archived_User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    const ROLE_ADMIN = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'image',
        'url',
        'phone',
        'categories',
        'subcategories',
    ];
}
