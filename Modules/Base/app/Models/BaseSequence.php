<?php

namespace Modules\Base\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Database\Factories\BaseSequenceFactory;

class BaseSequence extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'code',
        'prefix',
        'suffix',
        'sequence_size',
        'step',
        'next_number'
    ];

    public static function getNextByCode($code)
    {
        $sequence = self::where('code', $code)->firstOrFail();

        $nextNumber = str_pad($sequence->next_number, $sequence->sequence_size, '0', STR_PAD_LEFT);

        $identifier = self::replacePlaceholders($sequence->prefix) . $nextNumber . self::replacePlaceholders($sequence->suffix);

        $sequence->next_number += $sequence->step;
        $sequence->save();

        return $identifier;
    }

    protected static function replacePlaceholders($template)
    {
        if (is_null($template)) {
            return '';
        }

        $now = Carbon::now();

        return str_replace([
            '%(year)s', '%(y)s', '%(month)s', '%(day)s', '%(doy)s', '%(woy)s', '%(weekday)s', '%(h24)s', '%(h12)s', '%(min)s', '%(sec)s'
        ], [
            $now->format('Y'), // Current Year with Century
            $now->format('y'), // Current Year without Century
            $now->format('m'), // Month
            $now->format('d'), // Day
            $now->format('z'), // Day of the Year
            $now->format('W'), // Week of the Year
            $now->format('N'), // Day of the Week (0:Monday)
            $now->format('H'), // Hour 00->24
            $now->format('h'), // Hour 00->12
            $now->format('i'), // Minute
            $now->format('s')  // Second
        ], $template);
    }

    protected static function newFactory(): BaseSequenceFactory
    {
        //return BaseSequenceFactory::new();
    }
}
