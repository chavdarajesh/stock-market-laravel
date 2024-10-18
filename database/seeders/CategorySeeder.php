<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            [
                'name' => 'Stocks',
                'slug' => Str::slug('Stocks'),
                'description' => 'Stocks',
                'created_at'=>Carbon::now('Asia/Kolkata')
            ],
            [
                'name' => 'Economy Outlook',
                'slug' => Str::slug('Economy Outlook'),
                'description' => 'Economy Outlook',
                'created_at'=>Carbon::now('Asia/Kolkata')
            ],
            [
                'name' => 'Research',
                'slug' => Str::slug('Research'),
                'description' => 'Research',
                'created_at'=>Carbon::now('Asia/Kolkata')
            ],
            [
                'name' => "IPO's",
                'slug' => Str::slug("IPO's"),
                'description' => "IPO's",
                'created_at'=>Carbon::now('Asia/Kolkata')
            ],
            [
                'name' => "Company News",
                'slug' => Str::slug("Company News"),
                'description' => 'Company News',
                'created_at'=>Carbon::now('Asia/Kolkata')
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
