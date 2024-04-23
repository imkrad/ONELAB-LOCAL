<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListDiscountsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_discounts')->truncate();
        
        \DB::table('list_discounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Regular',
                'value' => '0',
                'from' => NULL,
                'to' => NULL,
                'based_id' => 100,
                'type_id' => 98,
                'subtype_id' => 92,
                'is_active' => 1,
                'created_at' => '2024-03-27 03:14:39',
                'updated_at' => '2024-03-27 03:14:39',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Student',
                'value' => '20',
                'from' => NULL,
                'to' => NULL,
                'based_id' => 100,
                'type_id' => 98,
                'subtype_id' => 91,
                'is_active' => 1,
                'created_at' => '2024-03-27 03:14:39',
                'updated_at' => '2024-03-27 03:14:39',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Senior Citizen',
                'value' => '20',
                'from' => NULL,
                'to' => NULL,
                'based_id' => 100,
                'type_id' => 98,
                'subtype_id' => 91,
                'is_active' => 1,
                'created_at' => '2024-03-27 03:14:39',
                'updated_at' => '2024-03-27 03:14:39',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Persons with Disabilities',
                'value' => '20',
                'from' => NULL,
                'to' => NULL,
                'based_id' => 100,
                'type_id' => 98,
                'subtype_id' => 91,
                'is_active' => 1,
                'created_at' => '2024-03-27 03:14:39',
                'updated_at' => '2024-03-27 03:14:39',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Fully Subsidized',
                'value' => '100',
                'from' => NULL,
                'to' => NULL,
                'based_id' => 100,
                'type_id' => 98,
                'subtype_id' => 91,
                'is_active' => 1,
                'created_at' => '2024-03-27 03:14:39',
                'updated_at' => '2024-03-27 03:14:39',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Gratis',
                'value' => '100',
                'from' => NULL,
                'to' => NULL,
                'based_id' => 100,
                'type_id' => 98,
                'subtype_id' => 91,
                'is_active' => 1,
                'created_at' => '2024-03-27 03:14:39',
                'updated_at' => '2024-03-27 03:14:39',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Health Units',
                'value' => '100',
                'from' => NULL,
                'to' => NULL,
                'based_id' => 100,
                'type_id' => 98,
                'subtype_id' => 91,
                'is_active' => 1,
                'created_at' => '2024-03-27 03:14:39',
                'updated_at' => '2024-03-27 03:14:39',
            ),
        ));

        
    }
}