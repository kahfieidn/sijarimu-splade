<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::create([
            'nik' => 'Pemohon',
            'nomor_handphone' => 'Pemohon',
            'name' => 'Pemohon',
            'email' => 'pemohon@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'nik' => 'Front Office',
            'nomor_handphone' => 'Front Office',
            'name' => 'Front Office',
            'email' => 'front@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'nik' => 'Back Office',
            'nomor_handphone' => 'Back Office',
            'name' => 'Back Office',
            'email' => 'back@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'nik' => 'OPD',
            'nomor_handphone' => 'OPD',
            'name' => 'OPD',
            'email' => 'opd@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'nik' => 'Verifikator 1',
            'nomor_handphone' => 'Verifikator 1',
            'name' => 'Verifikator 1',
            'email' => 'verifikator-1@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'nik' => 'Verifikator 2',
            'nomor_handphone' => 'Verifikator 2',
            'name' => 'Verifikator 2',
            'email' => 'verifikator-2@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'nik' => 'Kepala Dinas',
            'nomor_handphone' => 'Kepala Dinas',
            'name' => 'Kepala Dinas',
            'email' => 'kadis@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'nik' => 'Admin',
            'nomor_handphone' => 'Admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'nik' => 'Admin 1',
            'nomor_handphone' => 'Admin 1',
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'nik' => 'Admin 2',
            'nomor_handphone' => 'Admin 2',
            'name' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        \App\Models\User::create([
            'nik' => 'Admin 3',
            'nomor_handphone' => 'Admin 3',
            'name' => 'Admin 3',
            'email' => 'admin3@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);

        // Create permissions
        Permission::firstOrCreate(['name' => 'permission_pemohon']);
        Permission::firstOrCreate(['name' => 'permission_front_office']);
        Permission::firstOrCreate(['name' => 'permission_back_office']);
        Permission::firstOrCreate(['name' => 'permission_opd']);
        Permission::firstOrCreate(['name' => 'permission_verifikator_1']);
        Permission::firstOrCreate(['name' => 'permission_verifikator_2']);
        Permission::firstOrCreate(['name' => 'permission_kepala_dinas']);
        Permission::firstOrCreate(['name' => 'permission_admin']);
        Permission::firstOrCreate(['name' => 'permission_admin_1']);
        Permission::firstOrCreate(['name' => 'permission_admin_2']);
        Permission::firstOrCreate(['name' => 'permission_admin_3']);

        // Create roles
        $pemohon = Role::firstOrCreate(['name' => 'pemohon']);
        $front_office = Role::firstOrCreate(['name' => 'front_office']);
        $back_office = Role::firstOrCreate(['name' => 'back_office']);
        $opd = Role::firstOrCreate(['name' => 'opd']);
        $verifikator_1 = Role::firstOrCreate(['name' => 'verifikator_1']);
        $verifikator_2 = Role::firstOrCreate(['name' => 'verifikator_2']);
        $kepala_dinas = Role::firstOrCreate(['name' => 'kepala_dinas']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin_1 = Role::firstOrCreate(['name' => 'admin_1']);
        $admin_2 = Role::firstOrCreate(['name' => 'admin_2']);
        $admin_3 = Role::firstOrCreate(['name' => 'admin_3']);

        // Give permission to certain role
        $pemohon->givePermissionTo(['permission_pemohon']);
        $front_office->givePermissionTo(['permission_front_office']);
        $back_office->givePermissionTo(['permission_back_office']);
        $opd->givePermissionTo(['permission_opd']);
        $verifikator_1->givePermissionTo(['permission_verifikator_1']);
        $verifikator_2->givePermissionTo(['permission_verifikator_2']);
        $kepala_dinas->givePermissionTo(['permission_kepala_dinas']);
        $admin->givePermissionTo(['permission_admin']);
        $admin_1->givePermissionTo(['permission_admin_1']);
        $admin_2->givePermissionTo(['permission_admin_2']);
        $admin_3->givePermissionTo(['permission_admin_3']);

        // Assign role to user
        User::find(1)->assignRole(['pemohon']);
        User::find(2)->assignRole(['front_office']);
        User::find(3)->assignRole(['back_office']);
        User::find(4)->assignRole(['opd']);
        User::find(5)->assignRole(['verifikator_1']);
        User::find(6)->assignRole(['verifikator_2']);
        User::find(7)->assignRole(['kepala_dinas']);
        User::find(8)->assignRole(['admin']);
        User::find(9)->assignRole(['admin_1']);
        User::find(10)->assignRole(['admin_2']);
        User::find(11)->assignRole(['admin_3']);

        $this->call(JenisIzinSeeder::class);
        $this->call(SektorSeeder::class);
        $this->call(PerizinanSeeder::class);
        $this->call(PersyaratanSeeder::class);
        $this->call(StatusPermohonanSeeder::class);
        $this->call(PermohonanSeeder::class);
    }
}
