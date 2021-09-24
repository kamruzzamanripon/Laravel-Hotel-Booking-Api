<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];
    //protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
    

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
