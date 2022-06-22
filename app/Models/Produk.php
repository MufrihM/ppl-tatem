<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Produk extends Model
{
    use HasFactory,Sluggable;

    protected $table = 'produks';

    protected $guarded = ['id'];

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
}
