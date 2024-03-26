<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListNamesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_names')->delete();
        
        \DB::table('list_names')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Alcoholic Drinks / Beverages/ Fruit Wine',
                'type_id' => 96,
                'laboratory_type' => 9,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:15:15',
                'updated_at' => '2024-03-06 21:15:15',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Magnesium',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:15:22',
                'updated_at' => '2024-03-06 21:15:22',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'AOAC 985.35',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:15:44',
                'updated_at' => '2024-03-06 21:15:44',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Association of Official Analytical Chemists',
                'type_id' => 95,
                'laboratory_type' => 9,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:15:52',
                'updated_at' => '2024-03-06 21:15:52',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Potassium',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:25:44',
                'updated_at' => '2024-03-06 21:25:44',
            ),
            5 => 
            array (
                'id' => 6,
            'name' => 'Alcohol (as Ethanol)',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:26:52',
                'updated_at' => '2024-03-06 21:26:52',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'AOAC 969.12',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:27:08',
                'updated_at' => '2024-03-06 21:27:08',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Total Volatile Acidity',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:29:57',
                'updated_at' => '2024-03-06 21:29:57',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'AOAC 964.08',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'created_at' => '2024-03-06 21:30:14',
                'updated_at' => '2024-03-06 21:30:14',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'pH',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'created_at' => '2024-03-06 22:02:05',
                'updated_at' => '2024-03-06 22:02:05',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'AOAC 960.19',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'created_at' => '2024-03-06 22:02:17',
                'updated_at' => '2024-03-06 22:02:17',
            ),
        ));
        
        
    }
}