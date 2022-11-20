<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Detail::create([
            'title' => 'FromTo Transportation Services And Help Is On The Way',
            'title_ar' => 'FromTo Transportation Services And Help Is On The Way',
            'content' => 'Our application specializes in express transportation services, goods transportation, delivery services, and logistics services, in order to meet the needs and demands of our customers for transportation services for factories, companies, and individuals.',
            'content_ar' => 'Our application specializes in express transportation services, goods transportation, delivery services, and logistics services, in order to meet the needs and demands of our customers for transportation services for factories, companies, and individuals.',
            'image' => '',

            
        ],
    );
        Detail::create([
            'title' => 'About FromTo',
            'title_ar' => 'About FromTo',
            'content' => 'Our application specializes in express transportation services, goods transportation, delivery services, and logistics services, in order to meet the needs and demands of our customers for transportation services for factories, companies, and individuals.',
            'content_ar' => 'Our application specializes in express transportation services, goods transportation, delivery services, and logistics services, in order to meet the needs and demands of our customers for transportation services for factories, companies, and individuals.',
            'image' => '',

            
        ],
    );
       
    }
}
