<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SampleDataSeeder extends Seeder
{
    public function run()
    {
        // Seed roles table with sample Indonesian data
        DB::table('roles')->insert([
            ['role_name' => 'Admin', 'created_at' => now(),],
            ['role_name' => 'Supervisor', 'created_at' => now(),],
            ['role_name' => 'Customer', 'created_at' => now(),],
        ]);

        // Seed class_levels table with sample Indonesian data
        DB::table('class_levels')->insert([
            ['cl_name' => 'Pelanggan Baru', 'created_at' => now(),],
            ['cl_name' => 'Pelanggan Lama', 'created_at' => now(),],
            ['cl_name' => 'Reseller', 'created_at' => now(),],

        ]);

        // Seed users table with sample Indonesian data
        DB::table('users')->insert([
            [
                'name' => 'Agus',
                'email' => 'agus@bidigiprint.com',
                'password' => Hash::make('password123'),
                'acc_unique_num' => 'AB12345678',
                'acc_birthplace' => 'Jakarta',
                'acc_datebirth' => '1995-08-10',
                'acc_address' => 'Jl. Merdeka No. 123',
                'acc_phone' => '081234567890',
                'acc_religion' => 'Islam',
                'acc_gender' => 'Laki-laki',
                'acc_class' => NULL,
                'id_role' => 1,
                'id_cl' => 2,
                'nis' => NULL,
                'created_at' => now(),
            ],

            [
                'name' => 'Admin 1',
                'email' => 'admin@bidigiprint.com',
                'password' => Hash::make('password123'),
                'acc_unique_num' => 'CD87654321',
                'acc_birthplace' => 'Surabaya',
                'acc_datebirth' => '1992-05-25',
                'acc_address' => 'Jl. Pahlawan No. 789',
                'acc_phone' => '087654321098',
                'acc_religion' => 'Islam',
                'acc_gender' => 'Laki - Laki',
                'acc_class' => NULL,
                'id_role' => 1,
                'id_cl' => 2,
                'nis' => NULL,
                'created_at' => now(),
            ],
            [
                'name' => 'Hendra Wijaya',
                'email' => 'hendra@etabungan.com',
                'password' => Hash::make('password123'),
                'acc_unique_num' => 'EF54321876',
                'acc_birthplace' => 'Medan',
                'acc_datebirth' => '1988-11-12',
                'acc_address' => 'Jl. Medan Baru No. 456',
                'acc_phone' => '089876543210',
                'acc_religion' => 'Islam',
                'acc_gender' => 'Laki-laki',
                'acc_class' => '1A',
                'id_role' => 3,
                'id_cl' => 2,
                'nis' => 87367465,
                'created_at' => now(),
            ],
            // Add more users here
        ]);

        // Seed transactions table with sample data (you can add more data as needed)
        DB::table('transactions')->insert([
            [
                'tr_id' => mt_rand(1000000000, 9999999999),
                'id_acc' => 3,
                'tr_debt' => 1000,
                'tr_credit' => NULL,
                'created_at' => now(),
            ],
            // Add more transactions here
        ]);
    }
}
