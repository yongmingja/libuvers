<?php

namespace Modules\Base\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Database\Factories\BaseLanguageFactory;

class BaseLanguage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'code'
    ];

    protected static function newFactory(): BaseLanguageFactory
    {
        //return BaseLanguageFactory::new();
    }
}
