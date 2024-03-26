<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('configurations')->delete();
        
        \DB::table('configurations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'acronym' => 'DOST-IX',
                'name' => 'Department of Science and Technology - IX',
                'subname' => 'DOST Management System',
                'description' => 'ONELAB (The One-Stop Shop Laboratory)',
                'logo' => NULL,
                'logo_light' => NULL,
                'logo_dark' => NULL,
                'icon' => NULL,
                'version' => '1.0.0'
            ),
        ));
        
        
    }
}