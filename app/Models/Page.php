<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'content', 
        'parent'
    ];

    public function getParentTitle($pageId) {
        $pageTitle = Page::where('id', $pageId)->first()->title;
        return $pageTitle;
    }
}
