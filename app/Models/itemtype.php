<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class itemtype extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'item_type';
    protected $fillable = ['name', 'created_by', 'updated_by', 'comments', 'created_at', 'updated_at'];

    public function CreatedByUser(){
        return $this->belongTo(User::class, 'created_by');
    }

    public function UpdateByUser(){
        return $this->belongTo(User::class, 'updated_at');
    }
/** trả về danh sách các loại tin tức con của một loại tin tức cha cụ thể code dưới đang sai*/
    public function children()
        {
            return $this->hasMany(Subcategory::class, 'parent_id');
        }
    public function itemType()
        {
            return $this->belongsTo(ItemType::class);
        }
    public function user()
        {
            return $this->belongsTo(User::class, 'created_by');
        }
    public function post()
        {
            return $this->hasMany(Post::class, 'item_type_id');
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
