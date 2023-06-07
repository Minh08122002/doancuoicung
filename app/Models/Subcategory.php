<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'Subcategory';
    protected $fillable = ['name','parent_id'];


    /* Mỗi bản trong bảng Subcategory có thể thuộc về một bản ghi cha */
    public function itemType()
    {
        return $this->belongsTo(itemtype::class, 'parent_id');
    }
}