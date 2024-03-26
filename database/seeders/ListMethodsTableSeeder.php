<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_methods')->delete();
        
        \DB::table('list_methods')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fee' => '1920.00',
                'laboratory_type' => 9,
                'method_id' => 3,
                'reference_id' => 4,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:56:42',
                'updated_at' => '2024-03-06 21:56:42',
            ),
            1 => 
            array (
                'id' => 2,
                'fee' => '1000.00',
                'laboratory_type' => 9,
                'method_id' => 7,
                'reference_id' => 4,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:57:38',
                'updated_at' => '2024-03-06 21:57:38',
            ),
            2 => 
            array (
                'id' => 3,
                'fee' => '560.00',
                'laboratory_type' => 9,
                'method_id' => 9,
                'reference_id' => 4,
                'is_active' => 1,
                'created_at' => '2024-03-06 22:00:33',
                'updated_at' => '2024-03-06 22:00:33',
            ),
            3 => 
            array (
                'id' => 4,
                'fee' => '325.00',
                'laboratory_type' => 9,
                'method_id' => 11,
                'reference_id' => 4,
                'is_active' => 1,
                'created_at' => '2024-03-06 22:02:35',
                'updated_at' => '2024-03-06 22:02:35',
            ),
        ));
        
        
    }
}