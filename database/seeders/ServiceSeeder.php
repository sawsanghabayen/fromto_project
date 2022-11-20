<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'title' => 'Transport Vehicles',
            'title_ar' => 'Transport Vehicles',
            'content' => 'Transport vehicles (we safely transport goods, products and cargo).',
            'content_ar' => 'Transport vehicles (we safely transport goods, products and cargo).',
            'image' => '',

            
        ],
    );
    Service::create([
            'title' => 'Furniture Moving',
            'title_ar' => 'Furniture Moving',
            'content' => 'Furniture moving (this service provides technicians to help upon request).',
            'content_ar' => 'Furniture moving (this service provides technicians to help upon request).',
            'image' => '',

            
        ],
    );
    Service::create([
            'title' => 'Furniture Moving',
            'title_ar' => 'Furniture Moving',
            'content' => 'Furniture moving (this service provides technicians to help upon request).',
            'content_ar' => 'Furniture moving (this service provides technicians to help upon request).',
            'image' => '',

            
        ],
    );
    Service::create([
            'title' => 'Car Transport',
            'title_ar' => 'Car Transport',
            'content' => 'Car transport and shipment to the place you want.',
            'content_ar' => 'Car transport and shipment to the place you want.',
            'image' => '',

            
        ],
    );
    Service::create([
            'title' => 'On-the-road Maintenance',
            'title_ar' => 'On-the-road Maintenance',
            'content' => 'On-the-road maintenance services.',
            'content_ar' => 'On-the-road maintenance services.',
            'image' => '',

            
        ],
    );
    Service::create([
            'title' => 'Shipping',
            'title_ar' => 'Shipping',
            'content' => 'Shipping products and raw materials.',
            'content_ar' => 'Shipping products and raw materials.',
            'image' => '',

            
        ],
    );
    }
}
