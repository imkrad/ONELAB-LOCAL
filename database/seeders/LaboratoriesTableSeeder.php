<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LaboratoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('laboratories')->delete();
        
        \DB::table('laboratories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'DOST-I',
                'code' => 'R1',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 1,
                'created_at' => '2024-02-28 14:42:29',
                'updated_at' => '2024-02-28 14:42:29',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'DOST-II',
                'code' => 'R2',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 2,
                'created_at' => '2024-02-28 14:46:42',
                'updated_at' => '2024-02-28 14:46:42',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'DOST-III',
                'code' => 'R3',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 3,
                'created_at' => '2024-02-28 14:49:43',
                'updated_at' => '2024-02-28 14:49:43',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'DOST-CALABARZON-L1',
                'code' => 'R4AL1',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 4,
                'created_at' => '2024-02-28 14:53:59',
                'updated_at' => '2024-02-28 14:53:59',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'DOST-CALABARZON-L2',
                'code' => 'R4AL2',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 5,
                'member_id' => 4,
                'created_at' => '2024-02-28 15:02:55',
                'updated_at' => '2024-02-28 15:02:55',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'DOST-CALABARZON-L3',
                'code' => 'R4AL3',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 6,
                'member_id' => 4,
                'created_at' => '2024-02-28 15:04:41',
                'updated_at' => '2024-02-28 15:04:41',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'DOST-4B',
                'code' => 'R4B',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 5,
                'created_at' => '2024-02-28 15:10:33',
                'updated_at' => '2024-02-28 15:10:33',
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'DOST-V',
                'code' => 'R5',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 6,
                'created_at' => '2024-02-28 15:12:58',
                'updated_at' => '2024-02-28 15:12:58',
            ),
            8 => 
            array (
                'id' => 11,
                'name' => 'DOST-VI',
                'code' => 'R6',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 7,
                'created_at' => '2024-02-28 15:17:06',
                'updated_at' => '2024-02-28 15:17:06',
            ),
            9 => 
            array (
                'id' => 12,
                'name' => 'DOST-VII',
                'code' => 'R7',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 8,
                'created_at' => '2024-02-28 15:20:31',
                'updated_at' => '2024-02-28 15:20:31',
            ),
            10 => 
            array (
                'id' => 13,
                'name' => 'DOST-VIII',
                'code' => 'R8',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 9,
                'created_at' => '2024-02-28 15:21:56',
                'updated_at' => '2024-02-28 15:21:56',
            ),
            11 => 
            array (
                'id' => 14,
                'name' => 'DOST-IX',
                'code' => 'R9',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 10,
                'created_at' => '2024-02-28 15:24:53',
                'updated_at' => '2024-02-28 15:24:53',
            ),
            12 => 
            array (
                'id' => 15,
                'name' => 'DOST-X',
                'code' => 'R10',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 11,
                'created_at' => '2024-02-28 15:26:25',
                'updated_at' => '2024-02-28 15:26:25',
            ),
            13 => 
            array (
                'id' => 16,
                'name' => 'DOST-XI',
                'code' => 'R11',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 12,
                'created_at' => '2024-02-28 15:28:40',
                'updated_at' => '2024-02-28 15:28:40',
            ),
            14 => 
            array (
                'id' => 17,
                'name' => 'DOST-XII-L1',
                'code' => 'R12L1',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 13,
                'created_at' => '2024-02-28 15:31:39',
                'updated_at' => '2024-02-28 15:31:39',
            ),
            15 => 
            array (
                'id' => 18,
                'name' => 'DOST-XII-L2',
                'code' => 'R12L2',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 13,
                'created_at' => '2024-02-28 15:36:37',
                'updated_at' => '2024-02-28 15:36:37',
            ),
            16 => 
            array (
                'id' => 19,
                'name' => 'DOST-CARAGA',
                'code' => 'R13',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 14,
                'created_at' => '2024-02-28 15:39:52',
                'updated_at' => '2024-02-28 15:39:52',
            ),
            17 => 
            array (
                'id' => 20,
                'name' => 'DOST-BARMM',
                'code' => 'BARMM',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 3,
                'member_id' => 16,
                'created_at' => '2024-02-28 15:42:03',
                'updated_at' => '2024-02-28 15:42:03',
            ),
            18 => 
            array (
                'id' => 21,
                'name' => 'DOST-FNRI',
                'code' => 'FNRI',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 4,
                'member_id' => 19,
                'created_at' => '2024-02-28 15:46:17',
                'updated_at' => '2024-02-28 15:46:17',
            ),
            19 => 
            array (
                'id' => 22,
                'name' => 'DOST-FPRDI',
                'code' => 'FPRDI',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 4,
                'member_id' => 20,
                'created_at' => '2024-02-28 15:47:50',
                'updated_at' => '2024-02-28 15:47:50',
            ),
            20 => 
            array (
                'id' => 23,
                'name' => 'DOST-ITDI',
                'code' => 'ITDI',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 4,
                'member_id' => 21,
                'created_at' => '2024-02-28 15:50:24',
                'updated_at' => '2024-02-28 15:50:24',
            ),
            21 => 
            array (
                'id' => 24,
                'name' => 'DOST-MIRDC',
                'code' => 'MIRDC',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 4,
                'member_id' => 22,
                'created_at' => '2024-02-28 15:51:33',
                'updated_at' => '2024-02-28 15:51:33',
            ),
            22 => 
            array (
                'id' => 25,
                'name' => 'DOST-PNRI',
                'code' => 'PNRI',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 4,
                'member_id' => 23,
                'created_at' => '2024-02-28 15:55:33',
                'updated_at' => '2024-02-28 15:55:33',
            ),
            23 => 
            array (
                'id' => 26,
                'name' => 'DOST-PTRI',
                'code' => 'PTRI',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 4,
                'member_id' => 24,
                'created_at' => '2024-02-28 15:56:31',
                'updated_at' => '2024-02-28 15:56:31',
            ),
            24 => 
            array (
                'id' => 27,
                'name' => 'FDA',
                'code' => 'FDA',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 93,
                'member_id' => 25,
                'created_at' => '2024-02-28 16:29:28',
                'updated_at' => '2024-02-28 16:29:28',
            ),
            25 => 
            array (
                'id' => 28,
                'name' => 'DOH-NRL',
                'code' => 'NRL',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 93,
                'member_id' => 26,
                'created_at' => '2024-02-28 16:31:50',
                'updated_at' => '2024-02-28 16:31:50',
            ),
            26 => 
            array (
                'id' => 29,
                'name' => 'FPA',
                'code' => 'FPA',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 93,
                'member_id' => 27,
                'created_at' => '2024-02-28 16:33:08',
                'updated_at' => '2024-02-28 16:33:08',
            ),
            27 => 
            array (
                'id' => 30,
                'name' => 'UP-NIH',
                'code' => 'NIH',
                'member_since' => NULL,
                'contact_no' => NULL,
                'is_active' => '1',
                'type_id' => 93,
                'member_id' => 28,
                'created_at' => '2024-02-28 16:34:40',
                'updated_at' => '2024-02-28 16:34:40',
            ),
        ));
        
        
    }
}