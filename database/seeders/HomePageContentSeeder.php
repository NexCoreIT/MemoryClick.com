<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomePageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('home_page_contents')->insert([
            'homepage_title'   => 'Welcome to Our Website',
            'homepage_content' => 'This is the main homepage content.',
            'about_title'      => 'About Us',
            'about_content'    => 'We provide high-quality services.',
            'home_btn'         => 'Learn More',
            'about_btn'        => 'Read More',
            'footer_title'     => 'Stay Connected',
            'footer_btn'       => 'Subscribe',
            'youtube_link'     => 'https://youtube.com/example',
            'facebook_link'    => 'https://facebook.com/example',
            'linkedin_link'    => 'https://linkedin.com/example',
        ]);
    }
}
