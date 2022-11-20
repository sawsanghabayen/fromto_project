<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::create([
            'title' => 'Download the App',
            'title_ar' => 'Download the App',
            'content' => 'Available on google play store all versions & Apple app store.',
            'content_ar' => 'Available on google play store all versions & Apple app store.',
            'question_id' => '1',
            'image' => '',

            
        ],
    );
        Answer::create([
            'title' => 'Activate Your Account',
            'title_ar' => 'Activate Your Account',
            'content' => 'The account can be only activated on the phone number.',
            'content_ar' => 'The account can be only activated on the phone number.',
            'question_id' => '1',
            'image' => '',

            
        ],
    );
        Answer::create([
            'title' => 'Receive A Request',
            'title_ar' => 'Receive A Request',
            'content' => 'Request the service from the list of services and wait for help.',
            'content_ar' => 'Request the service from the list of services and wait for help.',
            'question_id' => '1',
            'image' => '',

            
        ],
    );







    // *****************Q2**************

    Answer::create([
        'title' => 'Customized solutions according to the needs of each place.',
        'title_ar' => 'Customized solutions according to the needs of each place.',
        'question_id' => '2',

        'content' => '',
        'content_ar' => '',
        'image' => '',

        
    ],
);
Answer::create([
    'title' => '24h customer service.',
    'title_ar' => '24h customer service.',
    'question_id' => '2',
    'content' => '',
    'content_ar' => '',
    'image' => '',

    
],
);
Answer::create([
    'title' => ' Quality and price',
    'title_ar' => ' Quality and price',
    'question_id' => '2',
    'content' => '',
    'content_ar' => '',
    'image' => '',

    
],
);
Answer::create([
    'title' => 'Transparency in tracking your shipment',
    'title_ar' => 'Transparency in tracking your shipment',
    'content' => '',
    'content_ar' => '',
    'question_id' => '2',
    'image' => '',

    
],
);
Answer::create([
    'title' => 'Detailed-prices',
    'title_ar' => 'Detailed-prices',
    'content' => '',
    'content_ar' => '',
    'question_id' => '2',
    'image' => '',

    
],
);
Answer::create([
    'title' => 'Providing different payment methods.',
    'title_ar' => 'Providing different payment methods.',
    'question_id' => '2',
    'content' => '',
    'content_ar' => '',
    'image' => '',

    
],
);






  
    }
}
