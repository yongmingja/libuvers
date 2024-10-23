<?php

namespace Modules\Library\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseLanguage;
use Modules\Library\Database\Factories\LibraryBookBookFactory;

class LibraryBookBook extends Model
{
    use HasUuids, HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'writer',
        'publisher',
        'isbn',
        'publish_place',
        'publish_period',
        'publish_year',
        'internal_reference',
        'type',
        'synopsis',
        'cover_path',
        'book_path',
        'is_publish',
        'stock',
        'rate',
        'category_id',
        'language_id',
    ];

    protected static function newFactory(): LibraryBookBookFactory
    {
        //return LibraryBookBookFactory::new();
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(LibraryBookCategory::class, 'category_id', 'id');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(BaseLanguage::class, 'language_id', 'id');
    }

}
