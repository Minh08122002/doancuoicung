<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $fillable = ['created_by','updated_by','title','item_type_id','content','image_1','image_2','image_3','image_4','image_5','status'];

    public function item_type(){
        return $this->hasOne(ItemType::class,'id','item_type_id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
