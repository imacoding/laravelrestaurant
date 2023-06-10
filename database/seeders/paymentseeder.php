<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class paymentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('payment')->truncate();
         DB::table('payment')->insert([
            [
                'id' => 1,
                'payment_name' => 'Stripe',
                'is_available' => 1,
                'test_public_key' => 'pk_test_51IT6YDGK6GRnWLWIG3yv42vkg6wdkyLiBONgAdle8WsXUlssCOROQOxd5GC9ddHoOLFdOvqUHaKJmXddKc57cwOQ00ualHyac1',
                'test_secret_key' => 'sk_test_51IT6YDGK6GRnWLWIoQfPpbknJtSThsbEAYdQIDtNvS7caEEDPFXQL0CAplQdTBX86rVgJBwunItGiJe3YP2tVWOm00SKX2uoVz',
                'live_public_key' => NULL,
                'live_secret_key' => NULL,
                'environment' => 1,
                'created_at' => '2020-12-29 07:45:15',
                'updated_at' => '2021-02-21 01:26:11',
            ],
            [
                'id' => 2,
                'payment_name' => 'RazorPay',
                'is_available' => 1,
                'test_public_key' => '',
                'test_secret_key' => '',
                'live_public_key' => NULL,
                'live_secret_key' => NULL,
                'environment' => 1,
                'created_at' => '2020-12-29 07:45:15',
                'updated_at' => '2021-02-21 01:26:27',
            ],
            [
                'id' => 3,
                'payment_name' => 'COD',
                'is_available' => 1,
                'test_public_key' => '',
                'test_secret_key' => '',
                'live_public_key' => NULL,
                'live_secret_key' => NULL,
                'environment' => 1,
                'created_at' => '2020-12-29 07:54:50',
                'updated_at' => '2020-12-29 09:38:41',
            ],
        ]);
    }
}
