<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class aboutseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
            'id' => 1,
            'about_content' => 'About is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'image' => 'about-5fa8f1af82a9a.jpg',
            'logo' => 'logo-6030f93f7573e.png',
            'footer_logo' => 'footer-6030f93f752a7.png',
            'favicon' => 'favicon-6030f9f848460.png',
            'fb' => 'https://www.facebook.com/',
            'twitter' => 'https://twitter.com/',
            'insta' => 'https://www.instagram.com/',
            'android' => 'https://play.google.com/store/apps',
            'ios' => 'https://www.apple.com/in/itunes/',
            'copyright' => 'Copyright Restaurant Website © 2020.All Rights Reserved.',
            'title' => 'Single restaurant food ordering Website and Delivery Boy App with Admin Panel',
            'short_title' => 'Restaurant Website',
            'mobile' => '+91 7016428845',
            'email' => 'infotechgravity@gmail.com',
            'address' => '518-519, Amby Valley Arcade, VIP Cir, nr. Essar Petroleum, Uttran, Surat, Gujarat 394105',
            'created_at' => '2021-02-20 12:00:56',
            'updated_at' => '2021-02-20 19:00:56',
        ]);
    }
}
