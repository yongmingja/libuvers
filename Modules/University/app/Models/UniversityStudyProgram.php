<?php

namespace Modules\University\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\University\Database\Factories\UniversityStudyProgramFactory;

class UniversityStudyProgram extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name'
    ];

    protected static function newFactory(): UniversityStudyProgramFactory
    {
        //return UniversityStudyProgramFactory::new();
    }
}
