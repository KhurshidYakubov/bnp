<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Menu extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = ['parent_id', 'order', 'link'];
    public $translatedAttributes = ['name'];


    public function submenus()
    {
        return $this->belongsTo('App\Models\Menu', 'parent_id', 'id');
    }

    public function menuTranslation()
    {
        return $this->hasMany('App\Models\MenuTranslation');
    }


    public static function buildTree(array $elements, $parentId = null)
    {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }


}
