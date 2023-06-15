<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $fillable = ['created_by','updated_by','title','parent_id','content','image_1','image_2','image_3','image_4','image_5','status'];

    public function Subcategory(){
        return $this->hasOne(Subcategory::class,'parent_id');
    }
    public function children()
    {
        return $this->belongsTo(Subcategory::class, 'parent_id', 'id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
