<?php

namespace Modules\Library\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Library\Database\Factories\LibraryBookCategoryFactory;

class LibraryBookCategory extends Model
{
    use HasUuids, HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name'
    ];

    public function getKeyName()
    {
        return 'uuid';
    }

    protected static function newFactory(): LibraryBookCategoryFactory
    {
        //return LibraryBookCategoryFactory::new();
    }
}
