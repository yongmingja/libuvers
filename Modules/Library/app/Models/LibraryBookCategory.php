<?php

namespace Modules\Library\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Library\Database\Factories\LibraryBookCategoryFactory;

class LibraryBookCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name'
    ];

    protected static function newFactory(): LibraryBookCategoryFactory
    {
        //return LibraryBookCategoryFactory::new();
    }
}
