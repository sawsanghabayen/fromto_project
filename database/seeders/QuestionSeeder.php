<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'title' => 'How To Use FromTo',
            'title_ar' => 'How To Use FromTo',
            'image' => '',

            
        ],
    );
    Question::create([
        'title' => 'What Makes Us Unique?',
        'title_ar' => 'What Makes Us Unique?',
        'image' => '',

        
    ],
);

    Question::create([
        'title' => 'Do You Have A Question? Call Us Now',
        'title_ar' => 'هل لديك سؤال؟ اتصل بنا الآن',
        'image' => '',

        
    ],
);
    Question::create([
        'title' => 'Why FromTo?',
        'title_ar' => 'لماذا فروم تو؟',
        'image' => '',

        
    ],
);
    }
}
