<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use HasFactory,HasApiTokens,Notifiable;
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
    public $timestamps = true;
}
