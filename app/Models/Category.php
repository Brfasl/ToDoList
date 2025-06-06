<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'user_id',
        'name',
        'is_active'
    ];


    public function user()
    {
        return $this->getUser();
    }

    public function getTask(){
        return $this->hasMany(Task::class,'category_id','id');
    }


    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
