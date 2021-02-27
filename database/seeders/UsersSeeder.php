<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->get()->count() == 0) {
            DB::table('users')->insert([
                'email' => "alex@tempmail.com",
                'active' => "1",
                'created_at' => now()
            ]);
            DB::table('users')->insert([
                'email' => "maria@tempmail.com",
                'active' => "1",
                'created_at' => now()
            ]);
            DB::table('users')->insert([
                'email' => "john@tempmail.com",
                'active' => "1",
                'created_at' => now()
            ]);
            DB::table('users')->insert([
                'email' => "dominik@test.com",
                'active' => "0",
                'created_at' => now()
            ]);
            DB::table('users')->insert([
                'email' => "andreas@yahoo.de",
                'active' => "0",
                'created_at' => now()
            ]);
            DB::table('users')->insert([
                'email' => "Taaaaaaa@test.com",
                'active' => "1",
                'created_at' => now()
            ]);
            DB::table('users')->insert([
                'email' => "rerere@test_mail.com",
                'active' => "1",
                'created_at' => now()
            ]);
            DB::table('users')->insert([
                'email' => "rerere@test_mail.com",
                'active' => "1",
                'created_at' => now()
            ]);
        }
        else { echo "Table is not empty, therefore NOT "; }
    }
}
