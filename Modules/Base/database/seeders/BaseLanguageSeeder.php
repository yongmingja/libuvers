<?php

namespace Modules\Base\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Base\Models\BaseLanguage;

class BaseLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BaseLanguage::create([ "name" => "Indonesia", "code" => "ID" ]);
        BaseLanguage::create([ "name" => "English", "code" => "EN" ]);
    }
}
