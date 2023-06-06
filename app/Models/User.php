<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $fillable = [
        "email",
        "password",
        "name",
        "address",
        "phone",
        "role",
        "avatar"
    ];
    public function createdProductTypes()
    {
        return $this->hasMany(ProductType::class, 'created_by');
    }

    public function updatedProductTypes()
    {
        return $this->hasMany(ProductType::class, 'updated_by');
    }
}
