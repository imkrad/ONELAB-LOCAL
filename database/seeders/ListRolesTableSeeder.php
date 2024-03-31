<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListRolesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_roles')->truncate();
        
        \DB::table('list_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Laboratory Head',
                'description' => 'The highest user role defined in the system. There should only be one user account assigned for this role.',
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Technical Manager',
                'description' => 'The management role defined in the Laboratory Module. This role has the full control on the monitoring and management of all laboratory transactions which includes cancellation of requests, samples or tests.',
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Customer Relation Officer',
                'description' => 'This user role is responsible in receiving samples and managing transactions in the Laboratory Module from receiving to releasing of reports.',
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Analyst',
                'description' => 'This user role allows analysts to access the eULIMS specifically the Sample Tagging module.',
                'is_active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Accountant',
                'description' => 'The user role defined in the Accounting Module for the monitoring of the issuance of the Order of Payment and Receipts.',
                'is_active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Cashier',
                'description' => 'This user role is assigned for users to facilitate the collection and processing of payments and deposits and is only allowed to access the cashier module.',
                'is_active' => 1,
            ),
        ));

        
    }
}