<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'mobile' => '',
            'profile_image' => 'unknown.png',
            'password' => Hash::make('admin'),
            'login_type' => 'email',
            'google_id' => NULL,
            'facebook_id' => NULL,
            'type' => 1,
            'tax' => '5',
            'delivery_charge' => '10',
            'currency' => '$',
            'max_order_qty' => 10,
            'min_order_amount' => 10,
            'max_order_amount' => 1000,
            'lat' => '40.7128',
            'lang' => '-74.0060',
            'map' => 'Map Key',
            'firebase' => 'Firebase Key',
            'timezone' => 'Asia/Kolkata',
            'token' => '',
            'referral_amount' => '20',
            'wallet' => NULL,
            'referral_code' => NULL,
            'is_available' => 1,
            'otp' => NULL,
            'is_verified' => NULL,
            'purchase_key' => NULL,
            'created_at' => '2020-06-05 07:21:20',
            'updated_at' => '2021-02-21 01:20:49',
        ]);
    }
}
