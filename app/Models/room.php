<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room';
    protected $fillable = ['name', 'user_id_1', 'user_id_2', 'start_date', 'end_date'];


    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($room) {
            $latestRoom = self::orderBy('id', 'desc')->first();

            if ($latestRoom) {
                $latestId = substr($latestRoom->id, 2);
                $newId = 'MN' . str_pad($latestId + 1, 5, '0', STR_PAD_LEFT);
            } else {
                $newId = 'MN00001';
            }

            $room->id = $newId;
        });
    }
}
