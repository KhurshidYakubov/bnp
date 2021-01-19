<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Post extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use \Conner\Tagging\Taggable;

    protected $fillable = [
        'category_id', 'img', 'age', 'time', 'link', 'static'
    ];
    public $translatedAttributes = ['title', 'body', 'short_desc', 'definition', 'content', 'link_type'];

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function postTranslation()
    {
        return $this->hasMany('App\Models\PostTranslation');
    }
}
