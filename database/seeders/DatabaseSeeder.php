<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \DB::table('users')->insert([
            'username' => 'administrator',
            'email' => 'kradjumli@gmail.com',
            'password' => bcrypt('123456789'),
            'role' => 'Administrator',
            'is_active' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('user_profiles')->insert([
            'firstname' => 'Ra-ouf',
            'lastname' => 'Jumli',
            'middlename' => 'Indanan',
            'avatar' => 'avatar.jpg',
            'gender' => 'Male',
            'user_id' => 1,
            'mobile' => '09171531652',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->call(ConfigurationsTableSeeder::class);
        $this->call(ListMenusTableSeeder::class);
        // $this->call(LocationRegionsTableSeeder::class);
        // $this->call(LocationProvincesTableSeeder::class);
        // $this->call(LocationMunicipalitiesTableSeeder::class);
        // $this->call(LocationBarangaysTableSeeder::class);
        // $this->call(ConfigurationsTableSeeder::class);
        // $this->call(ListDropdownsTableSeeder::class);
        // $this->call(ConfigurationsTableSeeder::class);
        // $this->call(ListMenusTableSeeder::class);
        // $this->call(MembersTableSeeder::class);
        // $this->call(LaboratoriesTableSeeder::class);
        // $this->call(AddressesTableSeeder::class);
        // $this->call(CustomerNamesTableSeeder::class);
        // $this->call(CustomersTableSeeder::class);
        // $this->call(ListNamesTableSeeder::class);
        // $this->call(ListMethodsTableSeeder::class);
        // $this->call(ListTestservicesTableSeeder::class);
    }
}
