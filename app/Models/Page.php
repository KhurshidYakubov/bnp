<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Page extends Model
{
    use HasFactory;
    use Translatable;
    use Sluggable;

    protected $fillable = ['static', 'definition', 'slug'];
    public $translatedAttributes = ['title', 'body', 'description'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function makeSlug($slugable)
    {
        $slug = SlugService::createSlug(Page::class, 'slug', $slugable, ['unique' => false]);

        return $slug;
    }


}
