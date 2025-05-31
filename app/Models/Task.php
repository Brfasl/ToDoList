<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'category_id',
        'title',
        'content',
        'status',
        'deadline'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }



    //belongsTo (hasMany hasOne)
    //belongstoMany hasManyThrough
    public function getCategory(){
        return $this->belongsTo(Category::class,'category_id','id');
    }


}
