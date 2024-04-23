<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListMethodsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_methods')->truncate();
        
        \DB::table('list_methods')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fee' => '1920.00',
                'laboratory_type' => 9,
                'method_id' => 3,
                'reference_id' => 4,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '2024-04-01 00:44:19',
                'updated_at' => '2024-04-01 00:44:19',
            ),
            1 => 
            array (
                'id' => 2,
                'fee' => '1000.00',
                'laboratory_type' => 9,
                'method_id' => 6,
                'reference_id' => 4,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '2024-04-03 01:44:06',
                'updated_at' => '2024-04-03 01:44:06',
            ),
            2 => 
            array (
                'id' => 3,
                'fee' => '550.00',
                'laboratory_type' => 9,
                'method_id' => 9,
                'reference_id' => 4,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '2024-04-16 05:42:52',
                'updated_at' => '2024-04-16 05:42:52',
            ),
            3 => 
            array (
                'id' => 4,
                'fee' => '400.00',
                'laboratory_type' => 9,
                'method_id' => 11,
                'reference_id' => 4,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '2024-04-16 05:45:50',
                'updated_at' => '2024-04-16 05:45:50',
            ),
            4 => 
            array (
                'id' => 5,
                'fee' => '1000.00',
                'laboratory_type' => 9,
                'method_id' => 13,
                'reference_id' => 4,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '2024-04-16 05:47:14',
                'updated_at' => '2024-04-16 05:47:14',
            ),
            5 => 
            array (
                'id' => 6,
                'fee' => '1100.00',
                'laboratory_type' => 9,
                'method_id' => 15,
                'reference_id' => 4,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '2024-04-16 05:48:36',
                'updated_at' => '2024-04-16 05:48:36',
            ),
            6 => 
            array (
                'id' => 7,
                'fee' => '300.00',
                'laboratory_type' => 9,
                'method_id' => 18,
                'reference_id' => 19,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '2024-04-16 08:17:26',
                'updated_at' => '2024-04-16 08:17:26',
            ),
            7 => 
            array (
                'id' => 8,
                'fee' => '350.00',
                'laboratory_type' => 9,
                'method_id' => 21,
                'reference_id' => 19,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '2024-04-16 08:18:29',
                'updated_at' => '2024-04-16 08:18:29',
            ),
            8 => 
            array (
                'id' => 9,
                'fee' => '370.00',
                'laboratory_type' => 9,
                'method_id' => 23,
                'reference_id' => 19,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '2024-04-16 08:20:44',
                'updated_at' => '2024-04-16 08:20:44',
            ),
            9 => 
            array (
                'id' => 10,
                'fee' => '325.00',
                'laboratory_type' => 9,
                'method_id' => 25,
                'reference_id' => 4,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '2024-04-18 02:34:26',
                'updated_at' => '2024-04-18 02:34:26',
            ),
            10 => 
            array (
                'id' => 11,
                'fee' => '375.00',
                'laboratory_type' => 9,
                'method_id' => 28,
                'reference_id' => 4,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '2024-04-18 02:36:23',
                'updated_at' => '2024-04-18 02:36:23',
            ),
        ));

        
    }
}