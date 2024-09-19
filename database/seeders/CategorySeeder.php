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
                'name' => 'Exterior',
                'slug' => Str::slug('Exterior'),
                'description' => 'Category for exterior designs and elements',
                'created_at'=>Carbon::now('Asia/Kolkata')
            ],
            [
                'name' => 'Interior',
                'slug' => Str::slug('Interior'),
                'description' => 'Category for interior designs and elements',
                'created_at'=>Carbon::now('Asia/Kolkata')
            ],
            [
                'name' => 'Animation',
                'slug' => Str::slug('Animation'),
                'description' => 'Category for animations and visual effects',
                'created_at'=>Carbon::now('Asia/Kolkata')
            ],
            [
                'name' => 'AR/VR',
                'slug' => Str::slug('AR/VR'),
                'description' => 'Category for augmented and virtual reality experiences',
                'created_at'=>Carbon::now('Asia/Kolkata')
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
