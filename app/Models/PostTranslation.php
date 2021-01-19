<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'short_desc','definition', 'content', 'link_type'];
    public $timestamps = false;
}
