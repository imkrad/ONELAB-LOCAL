<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerNamesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customer_names')->delete();
        
        \DB::table('customer_names')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Coca-Cola Beverages Philippines, Inc.',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-03-05 13:56:11',
                'updated_at' => '2024-03-05 13:56:11',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Zamboanga Peninsula Medical Center',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-03-05 14:11:45',
                'updated_at' => '2024-03-05 14:11:45',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Zamboanga Nickel Corporation',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-03-05 14:50:19',
                'updated_at' => '2024-03-05 14:50:19',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Z.C. Victory Fishing Corporation',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-03-05 14:53:28',
                'updated_at' => '2024-03-05 14:53:28',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Pepsi-Cola Products Philippines, Inc.',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-03-05 14:56:00',
                'updated_at' => '2024-03-05 14:56:00',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Zaragoza Foods Corporation',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-03-05 14:58:26',
                'updated_at' => '2024-03-05 14:58:26',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'West Metro Medical Center',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-03-05 15:00:51',
                'updated_at' => '2024-03-05 15:00:51',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Millennium Ocean Star Corporation',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-03-05 15:04:03',
                'updated_at' => '2024-03-05 15:04:03',
            ),
        ));
        
        
    }
}