<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'email' => 'info@fromto.sa',
            'mobile' => '+62546776543',
            'location' => 'Kingdom of Saudi Arabia',
            'logo' => '',
            'facebook_url' => 'https://www.facebook.com/sawsan.s.ghabayen/',
            'instgram_url' => 'https://www.facebook.com/sawsan.s.ghabayen/',
            'twitter_url' => 'https://www.facebook.com/sawsan.s.ghabayen/',
            'linkedin_url' => 'https://www.facebook.com/sawsan.s.ghabayen/',
            
        ]);
    }
}
