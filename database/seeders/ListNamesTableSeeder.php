<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListNamesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_names')->truncate();
        
        \DB::table('list_names')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Alcoholic Drinks / Beverages / Fruit Wine',
                'type_id' => 96,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Magnesium',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'AOAC 985.35',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Official Methods of Analysis of AOAC International',
                'type_id' => 95,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Potassium',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'AOAC 985.36',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Flour, Cereal Foods, Bread & other Baked Products',
                'type_id' => 96,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Ash',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'AOAC 923.03',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Moisture',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'AOAC 925.10',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Crude Protein',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'AOAC 2001.11',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Total Fat',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'AOAC 2003.05 & AOAC 922.06',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Water / Seawater',
                'type_id' => 96,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Turbidity',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'SMEWW 2130 B',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Standard Methods for the Examination of Water & Wastewater',
                'type_id' => 95,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'pH',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'SMEWW 4500-H+',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            21 => 
            array (
                'id' => 22,
            'name' => 'Chlorine (residual)',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'SMEWW 4500-Cl- B',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            23 => 
            array (
                'id' => 24,
            'name' => 'Acidified Foods (semi-solid)',
                'type_id' => 96,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'AOAC 981.12',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            25 => 
            array (
                'id' => 26,
            'name' => 'Food Products (Other analyses)',
                'type_id' => 96,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Water Activity',
                'type_id' => 97,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'AOAC 978.18',
                'type_id' => 94,
                'laboratory_type' => 9,
                'is_active' => 1,
                'is_synced' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));

        
    }
}