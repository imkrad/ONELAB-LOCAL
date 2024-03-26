<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('members')->delete();
        
        \DB::table('members')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Department of Science and Technology - I',
                'acronym' => 'DOST-I',
                'website' => 'http://region1.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:04:21',
                'updated_at' => '2021-01-30 18:04:21',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Department of Science and Technology - II',
                'acronym' => 'DOST-II',
                'website' => 'http://region2.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:07:21',
                'updated_at' => '2021-01-30 18:08:59',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Department of Science and Technology - III',
                'acronym' => 'DOST-III',
                'website' => 'http://region3.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:10:24',
                'updated_at' => '2021-01-30 18:10:24',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Department of Science and Technology - IVA',
                'acronym' => 'DOST-IVA',
                'website' => 'http://region4a.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:11:45',
                'updated_at' => '2021-01-30 18:18:47',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Department of Science and Technology - IVB',
                'acronym' => 'DOST-IVB',
                'website' => 'http://region4b.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:14:11',
                'updated_at' => '2021-01-30 18:14:11',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Department of Science and Technology - V',
                'acronym' => 'DOST-V',
                'website' => 'http://region5.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:20:00',
                'updated_at' => '2021-01-30 18:20:00',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Department of Science and Technology - VI',
                'acronym' => 'DOST-VI',
                'website' => 'http://region6.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:20:34',
                'updated_at' => '2021-01-30 18:20:34',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Department of Science and Technology - VII',
                'acronym' => 'DOST-VII',
                'website' => 'http://region7.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:20:55',
                'updated_at' => '2021-01-30 18:20:55',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Department of Science and Technology - VIII',
                'acronym' => 'DOST-VIII',
                'website' => 'http://region8.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:21:15',
                'updated_at' => '2021-01-30 18:21:15',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Department of Science and Technology - IX',
                'acronym' => 'DOST-IX',
                'website' => 'http://region9.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:21:44',
                'updated_at' => '2021-01-30 18:21:44',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Department of Science and Technology - X',
                'acronym' => 'DOST-X',
                'website' => 'http://region10.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:22:23',
                'updated_at' => '2021-01-30 18:22:23',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Department of Science and Technology - XI',
                'acronym' => 'DOST-XI',
                'website' => 'http://region11.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:22:45',
                'updated_at' => '2021-01-30 18:22:45',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Department of Science and Technology - XII',
                'acronym' => 'DOST-XII',
                'website' => 'http://region12.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:25:03',
                'updated_at' => '2021-01-30 18:25:03',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Department of Science and Technology - XIII',
                'acronym' => 'DOST-CARAGA',
                'website' => 'http://caraga.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:26:01',
                'updated_at' => '2021-01-30 18:26:01',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Department of Science and Technology - Cordillera Administrative Region',
                'acronym' => 'DOST-CAR',
                'website' => 'http://car.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:26:45',
                'updated_at' => '2021-01-30 18:26:45',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Department of Science and Technology - Bangsamoro Autonomous Region In Muslim Mindanao',
                'acronym' => 'DOST-BARMM',
                'website' => 'http://armm.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:27:21',
                'updated_at' => '2021-01-30 18:27:21',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Department of Science and Technology - National Capital Region',
                'acronym' => 'DOST-NCR',
                'website' => 'http://ncr.dost.gov.ph/',
                'avatar' => 'dost.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Department of Science and Technology - Advanced Science and Technology Institute',
                'acronym' => 'DOST-ASTI',
                'website' => 'http://asti.dost.gov.ph/',
                'avatar' => 'asti.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Department of Science and Technology - Food and Nutrition Research Institute',
                'acronym' => 'DOST-FNRI',
                'website' => 'http://fnri.dost.gov.ph/',
                'avatar' => 'fnri.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Department of Science and Technology - Forest Product Research and Development Institute',
                'acronym' => 'DOST-FPRDI',
                'website' => 'http://fprdi.dost.gov.ph/',
                'avatar' => 'fprdi.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Department of Science and Technology - Industrial Technology Development Institute',
                'acronym' => 'DOST-ITDI',
                'website' => 'http://itdi.dost.gov.ph/',
                'avatar' => 'itdi.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Department of Science and Technology - Metal Industry Research and Development Center',
                'acronym' => 'DOST-MIRDC',
                'website' => 'http://mirdc.dost.gov.ph/',
                'avatar' => 'mirdc.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Department of Science and Technology - Philippine Nuclear Research Institute',
                'acronym' => 'DOST-PNRI',
                'website' => 'http://pnri.dost.gov.ph/',
                'avatar' => 'pnri.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Department of Science and Technology - Philippine Textile Research Institute',
                'acronym' => 'DOST-PTRI',
                'website' => 'http://ptri.dost.gov.ph/',
                'avatar' => 'ptri.png',
                'is_active' => 1,
                'is_dost' => 1,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Food and Drug Administration',
                'acronym' => 'FDA',
                'website' => 'http://www.fda.gov.ph/',
                'avatar' => 'fda.png',
                'is_active' => 1,
                'is_dost' => 0,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Department of Health - National Reference Laboratory',
                'acronym' => 'DOH-NRL',
                'website' => 'http://www.nrleamcdoh.org/ ',
                'avatar' => 'nrl.png',
                'is_active' => 1,
                'is_dost' => 0,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Fertilizer and Pesticide Authority',
                'acronym' => 'FPA',
                'website' => 'http://fpa.da.gov.ph/',
                'avatar' => 'fpa.png',
                'is_active' => 1,
                'is_dost' => 0,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'University of the Philippines - National Institutes of Health',
                'acronym' => 'UP-NIH',
                'website' => 'http://nih.upm.edu.ph/',
                'avatar' => 'up.png',
                'is_active' => 1,
                'is_dost' => 0,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'SGS',
                'acronym' => 'SGS',
                'website' => 'http://www.sgs.com/',
                'avatar' => 'sgs.png',
                'is_active' => 1,
                'is_dost' => 0,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Philippine Institute of Pure and Applied Chemistry',
                'acronym' => 'PIPAC',
                'website' => 'http://www.pipac.com.ph/',
                'avatar' => 'pipac.png',
                'is_active' => 1,
                'is_dost' => 0,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'The First Analytical Services and Technical Cooperative',
                'acronym' => 'F.A.S.T Laboratories',
                'website' => 'http://www.fastlaboratories.com.ph/ ',
                'avatar' => 'fast.png',
                'is_active' => 1,
                'is_dost' => 0,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Jefcor Laboratories, Inc.',
                'acronym' => 'JEFCOR',
                'website' => 'http://jefcorlabs.com/',
                'avatar' => 'avatar.jpg',
                'is_active' => 1,
                'is_dost' => 0,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Intertek Philippines',
                'acronym' => 'INTERTEK',
                'website' => 'https://www.intertek.com',
                'avatar' => 'avatar.jpg',
                'is_active' => 1,
                'is_dost' => 0,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Qualibet Testing Services Corporation',
                'acronym' => 'QUALIBET',
                'website' => 'https://qualibetlab.com/',
                'avatar' => 'avatar.jpg',
                'is_active' => 1,
                'is_dost' => 0,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Optimal Laboratories Inc.',
                'acronym' => 'OPTIMAL',
                'website' => 'http://optimallabinc.com/',
                'avatar' => 'avatar.jpg',
                'is_active' => 1,
                'is_dost' => 0,
                'created_at' => '2021-01-30 18:27:57',
                'updated_at' => '2021-01-30 18:27:57',
            ),
        ));
        
        
    }
}