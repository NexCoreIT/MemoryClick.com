<?php

namespace Database\Seeders;

use App\Models\CustomPage;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomPage::create([
            'title' => 'About Us',
            'slug' => Str::slug('About Us'),
            'meta_title' => 'About Our Real Estate Company',
            'meta_description' => 'Learn more about our real estate agency, providing top-quality services in buying, selling, and renting properties.',
            'meta_keywords' => 'real estate, property, homes, apartments, buy, sell, rent',
            'status' => 1, // Active
            'body' => '
                <h2>Welcome to Our Real Estate Agency</h2>
                <p>At <strong>Prime Realty</strong>, we specialize in connecting buyers, sellers, and renters with their perfect properties. With years of experience in the real estate industry, we ensure smooth transactions, competitive pricing, and expert guidance.</p>

                <h3>Why Choose Us?</h3>
                <ul>
                    <li>Wide range of residential and commercial properties.</li>
                    <li>Expert real estate agents with deep market knowledge.</li>
                    <li>Seamless buying, selling, and renting experience.</li>
                    <li>Transparent pricing and professional service.</li>
                </ul>

                <h3>Our Mission</h3>
                <p>We aim to simplify the real estate process by offering expert guidance, reliable listings, and excellent customer service to help you find your dream home or investment property.</p>

                <p>Contact us today to explore opportunities in the real estate market!</p>
            ',
        ]);

    }
}
