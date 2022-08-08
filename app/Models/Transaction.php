<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'status','expired'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Package(){
        return $this->belongsTo(Package::class);
    }
}
