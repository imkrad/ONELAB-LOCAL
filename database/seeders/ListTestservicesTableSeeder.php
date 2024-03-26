<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListTestservicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_testservices')->delete();
        
        \DB::table('list_testservices')->insert(array (
            0 => 
            array (
                'id' => 2,
                'laboratory_type' => 9,
                'sampletype_id' => 1,
                'testname_id' => 2,
                'method_id' => 1,
                'laboratory_id' => 14,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:56:47',
                'updated_at' => '2024-03-06 21:56:47',
            ),
            1 => 
            array (
                'id' => 3,
                'laboratory_type' => 9,
                'sampletype_id' => 1,
                'testname_id' => 5,
                'method_id' => 1,
                'laboratory_id' => 14,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:57:06',
                'updated_at' => '2024-03-06 21:57:06',
            ),
            2 => 
            array (
                'id' => 4,
                'laboratory_type' => 9,
                'sampletype_id' => 1,
                'testname_id' => 6,
                'method_id' => 2,
                'laboratory_id' => 14,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:57:44',
                'updated_at' => '2024-03-06 21:57:44',
            ),
            3 => 
            array (
                'id' => 5,
                'laboratory_type' => 9,
                'sampletype_id' => 1,
                'testname_id' => 8,
                'method_id' => 3,
                'laboratory_id' => 14,
                'is_active' => 1,
                'created_at' => '2024-03-06 22:00:38',
                'updated_at' => '2024-03-06 22:00:38',
            ),
            4 => 
            array (
                'id' => 6,
                'laboratory_type' => 9,
                'sampletype_id' => 1,
                'testname_id' => 10,
                'method_id' => 4,
                'laboratory_id' => 14,
                'is_active' => 1,
                'created_at' => '2024-03-06 22:02:43',
                'updated_at' => '2024-03-06 22:02:43',
            ),
        ));
        
        
    }
}