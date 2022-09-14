<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['name','fullname','age','reg_date'];
    public static function className()
    {
        return class_basename(static::class);
    }

    /**
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        self::saved(function ($model) {
            Redis::del(Redis::key(Post::className()));
        });
    }
}
