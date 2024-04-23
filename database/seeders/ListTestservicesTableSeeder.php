<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListTestservicesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_testservices')->truncate();
        
        \DB::table('list_testservices')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'R9S-CHE-00001',
                'laboratory_type' => 9,
                'sampletype_id' => 1,
                'testname_id' => 2,
                'method_id' => 1,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-01 08:44:21',
                'updated_at' => '2024-04-16 16:12:09',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'R9S-CHE-00002',
                'laboratory_type' => 9,
                'sampletype_id' => 1,
                'testname_id' => 5,
                'method_id' => 1,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-01 08:44:36',
                'updated_at' => '2024-04-16 16:12:09',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'R9S-CHE-00003',
                'laboratory_type' => 9,
                'sampletype_id' => 1,
                'testname_id' => 5,
                'method_id' => 2,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-03 09:44:11',
                'updated_at' => '2024-04-16 16:12:09',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'R9S-CHE-00004',
                'laboratory_type' => 9,
                'sampletype_id' => 7,
                'testname_id' => 8,
                'method_id' => 3,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-16 13:42:56',
                'updated_at' => '2024-04-16 16:12:09',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'R9S-CHE-00005',
                'laboratory_type' => 9,
                'sampletype_id' => 7,
                'testname_id' => 10,
                'method_id' => 4,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-16 13:45:54',
                'updated_at' => '2024-04-16 16:12:09',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'R9S-CHE-00006',
                'laboratory_type' => 9,
                'sampletype_id' => 7,
                'testname_id' => 12,
                'method_id' => 5,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-16 13:47:17',
                'updated_at' => '2024-04-16 16:12:09',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'R9S-CHE-00007',
                'laboratory_type' => 9,
                'sampletype_id' => 7,
                'testname_id' => 14,
                'method_id' => 6,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-16 13:48:39',
                'updated_at' => '2024-04-16 16:12:09',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 'R9S-CHE-00008',
                'laboratory_type' => 9,
                'sampletype_id' => 16,
                'testname_id' => 17,
                'method_id' => 7,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-16 16:17:30',
                'updated_at' => '2024-04-19 11:39:27',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 'R9S-CHE-00009',
                'laboratory_type' => 9,
                'sampletype_id' => 16,
                'testname_id' => 20,
                'method_id' => 8,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-16 16:18:32',
                'updated_at' => '2024-04-19 11:39:27',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => 'R9S-CHE-00010',
                'laboratory_type' => 9,
                'sampletype_id' => 16,
                'testname_id' => 22,
                'method_id' => 9,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-16 16:20:48',
                'updated_at' => '2024-04-19 11:39:27',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => 'R9S-CHE-00011',
                'laboratory_type' => 9,
                'sampletype_id' => 24,
                'testname_id' => 20,
                'method_id' => 10,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-18 10:34:28',
                'updated_at' => '2024-04-19 11:39:27',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => 'R9S-CHE-00012',
                'laboratory_type' => 9,
                'sampletype_id' => 26,
                'testname_id' => 27,
                'method_id' => 11,
                'laboratory_id' => 14,
                'is_active' => 1,
                'is_synced' => 1,
                'created_at' => '2024-04-18 10:36:26',
                'updated_at' => '2024-04-19 11:39:27',
            ),
        ));

        
    }
}