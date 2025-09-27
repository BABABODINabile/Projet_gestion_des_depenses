<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'type',
        'nom',
        'description',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function operations(){
        return $this->hasMany(Operation::class);
    }

}
