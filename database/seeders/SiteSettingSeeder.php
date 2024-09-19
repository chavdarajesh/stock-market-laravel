<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SiteSetting::truncate();
        $Faqs =  [
            [
                'key' => 'header_logo',
                'value' => null,
                'title' => 'Header Logo',
                'description' => null,
                'status' => 1,
                'order' => 1,
                'created_at' => Carbon::now('Asia/Kolkata')
            ],
            [
                'key' => 'favicon',
                'value' => null,
                'title' => 'Favicon',
                'description' => null,
                'status' => 1,
                'order' => 3,
                'created_at' => Carbon::now('Asia/Kolkata')
            ],
            [
                'key' => 'loader',
                'value' => null,
                'title' => 'Loader',
                'description' => null,
                'status' => 1,
                'order' => 4,
                'created_at' => Carbon::now('Asia/Kolkata')
            ],
            [
                'key' => 'social_facebook_url',
                'value' => 'https://facebook.com',
                'title' => 'Facebook URL',
                'description' => null,
                'status' => 1,
                'order' => 10,
                'created_at' => Carbon::now('Asia/Kolkata')
            ],
            [
                'key' => 'social_linkedin_url',
                'value' => 'https://www.linkedin.com',
                'title' => 'Linkedin URL',
                'description' => null,
                'status' => 1,
                'order' => 11,
                'created_at' => Carbon::now('Asia/Kolkata')
            ],
            [
                'key' => 'social_instagram_url',
                'value' => 'https://www.instagram.com',
                'title' => 'Instagram URL',
                'description' => null,
                'status' => 1,
                'order' => 12,
                'created_at' => Carbon::now('Asia/Kolkata')
            ],
            [
                'key' => 'social_youtube_url',
                'value' => 'https://youtube.com',
                'title' => 'Youtube URL',
                'description' => null,
                'status' => 1,
                'order' => 13,
                'created_at' => Carbon::now('Asia/Kolkata')
            ],
            [
                'key' => 'career_enquiry_email',
                'value' => null,
                'title' => 'Enquiry Email',
                'description' => null,
                'status' => 1,
                'order' => 14,
                'created_at' => Carbon::now('Asia/Kolkata')
            ],
        ];
        SiteSetting::insert($Faqs);
    }
}
