<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jhon Due',
            'fk_department' => 1,
            'fk_designation' => 1,
            'phone_number' => '1234567890',
        ]);

        User::create([
            'name' => 'Tommy Mark',
            'fk_department' => 2,
            'fk_designation' => 2,
            'phone_number' => '0987654321',
        ]);
    }
}
