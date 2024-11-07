<?php

namespace Modules\Base\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Base\Models\BaseSequence;

class BaseSequenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BaseSequence::create([
            'name' => 'Book Sequence',
            'code' => 'BOOK_SEQUENCE',
            'sequence_size' => 5,
            'step' => 1,
            'next_number' => 1,
        ]);
    }
}
