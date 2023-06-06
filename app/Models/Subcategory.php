<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'Subcategory ';
    protected $fillable = ['name','parent_id'];


    /* Mỗi bản trong bảng Subcategory có thể thuộc về một bản ghi cha */
    public function parent()
    {
        return $this->belongsTo(itemtype::class, 'parent_id');
    }
}
