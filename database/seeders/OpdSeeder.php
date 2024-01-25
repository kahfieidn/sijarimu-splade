<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Opd::create([
            'user_id' => '4',
            'sektor_id' => '2',
            'role_id' => '4',
        ]);
    }
}
