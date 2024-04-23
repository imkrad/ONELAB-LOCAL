<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListMenusTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_menus')->truncate();
        
        \DB::table('list_menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dashboard',
                'icon' => 'ri-apps-line',
                'route' => '/',
                'path' => 'Modules/Dashboard',
                'group' => 'Menu',
                'order' => 1,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dropdown',
                'icon' => 'ri-list-check',
                'route' => '/lists/dropdowns',
                'path' => 'Modules/Lists/Dropdowns',
                'group' => 'Lists',
                'order' => 2,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Locations',
                'icon' => 'ri-earth-fill',
                'route' => NULL,
                'path' => 'Modules/Lists/Locations',
                'group' => 'Lists',
                'order' => 3,
                'has_child' => 1,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Regions',
                'icon' => NULL,
                'route' => '/lists/locations/regions',
                'path' => '/lists/locations/regions',
                'group' => 'Locations',
                'order' => 1,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Provinces',
                'icon' => NULL,
                'route' => '/lists/locations/provinces',
                'path' => '/lists/locations/provinces',
                'group' => 'Locations',
                'order' => 2,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Municipalities',
                'icon' => NULL,
                'route' => '/lists/locations/municipalities',
                'path' => '/lists/locations/municipalities',
                'group' => 'Locations',
                'order' => 3,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Barangays',
                'icon' => NULL,
                'route' => '/lists/locations/barangays',
                'path' => '/lists/locations/barangays',
                'group' => 'Locations',
                'order' => 4,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Laboratories',
                'icon' => 'ri-government-line',
                'route' => '/lists/laboratories',
                'path' => 'Modules/Lists/Laboratories',
                'group' => 'Lists',
                'order' => 4,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Customers',
                'icon' => 'ri-team-fill',
                'route' => '/customers',
                'path' => 'Modules/Customers',
                'group' => 'Menu',
                'order' => 5,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Services',
                'icon' => 'bx bxs-flask',
                'route' => NULL,
                'path' => 'Modules/Services',
                'group' => 'Menu',
                'order' => 6,
                'has_child' => 1,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Testservices',
                'icon' => NULL,
                'route' => '/services/testservices',
                'path' => '/services/testservices',
                'group' => 'Services',
                'order' => 1,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Packages',
                'icon' => NULL,
                'route' => '/services/packages',
                'path' => '/services/packages',
                'group' => 'Services',
                'order' => 2,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'TS Requests',
                'icon' => 'ri-hand-coin-fill',
                'route' => '/requests',
                'path' => 'Modules/Requests',
                'group' => 'Menu',
                'order' => 7,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Quotation',
                'icon' => 'ri-price-tag-3-fill',
                'route' => '/quotations',
                'path' => 'Modules/Quotation',
                'group' => 'Menu',
                'order' => 8,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
        ));

        
    }
}