<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListStatusesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_statuses')->truncate();
        
        \DB::table('list_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Pending',
                'type' => 'Request',
                'color' => 'bg-warning',
                'others' => 'text-warning',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Waiting',
                'type' => 'Request',
                'color' => 'bg-info',
                'others' => 'text-info',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Ongoing',
                'type' => 'Request',
                'color' => 'bg-secondary',
                'others' => 'text-secondary',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Completed',
                'type' => 'Request',
                'color' => 'bg-success',
                'others' => 'text-success',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Cancelled',
                'type' => 'Request',
                'color' => 'bg-danger',
                'others' => 'text-danger',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Pending',
                'type' => 'Payment',
                'color' => 'bg-warning-subtle',
                'others' => 'text-warning',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Paid',
                'type' => 'Payment',
                'color' => 'bg-success-subtle',
                'others' => 'text-success',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Cancelled',
                'type' => 'Payment',
                'color' => 'bg-danger-subtle',
                'others' => 'text-danger',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Pending',
                'type' => 'Analysis',
                'color' => 'bg-warning-subtle',
                'others' => 'text-warning',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Ongoing',
                'type' => 'Analysis',
                'color' => 'bg-secondary-subtle',
                'others' => 'text-secondary',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Completed',
                'type' => 'Analysis',
                'color' => 'bg-success-subtle',
                'others' => 'text-success',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Cancelled',
                'type' => 'Analysis',
                'color' => 'bg-danger-subtle',
                'others' => 'text-danger',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Pending',
                'type' => 'Quotation',
                'color' => 'bg-warning',
                'others' => 'text-warning',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Completed',
                'type' => 'Quotation',
                'color' => 'bg-success',
                'others' => 'text-success',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Cancelled',
                'type' => 'Quotation',
                'color' => 'bg-danger',
                'others' => 'text-danger',
                'is_active' => 1,
                'created_at' => '2024-03-28 02:33:01',
                'updated_at' => '2024-03-28 02:33:01',
            ),
        ));

        
    }
}