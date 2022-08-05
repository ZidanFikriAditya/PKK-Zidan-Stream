<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','description','film','thumbnail','durasi','category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }


}
