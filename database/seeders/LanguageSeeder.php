<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            "code" => "ar",
            "name" => "arabic",
            "localname" => "العربية",
            "direction" => "rtl",
        ]);

        Language::create([
            "code" => "ar_IQ",
            "name" => "arabic",
            "localname" => "العربية",
            "direction" => "rtl",
        ]);

        Language::create([
            "code" => "en_US",
            "name" => "english",
            "localname" => "english",
            "direction" => "rtl",
        ]);

        Language::create([
            "code" => "fa_IR",
            "name" => "persian",
            "localname" => "فارسی",
            "direction" => "rtl",
        ]);
    }
}
