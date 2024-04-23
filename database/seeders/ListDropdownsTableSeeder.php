<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListDropdownsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_dropdowns')->truncate();
        
        \DB::table('list_dropdowns')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'n/a',
                'classification' => 'n/a',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Regional Standards and Testing Laboratories',
                'classification' => 'Agency Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'RSTL',
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Research and Development Institutes',
                'classification' => 'Agency Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'RDI',
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Regional Metrology Lab',
                'classification' => 'Agency Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'RML',
                'is_active' => 1,
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Regional Volumetric Calibration Laboratory',
                'classification' => 'Agency Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'RVCL',
                'is_active' => 1,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Cavite Water & Wastewater Testing Laboratory',
                'classification' => 'Agency Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'CWWTL',
                'is_active' => 1,
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Private Sector',
                'classification' => 'Agency Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'PS',
                'is_active' => 1,
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Chemical Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'CHE',
                'is_active' => 1,
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Microbiological Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'MIC',
                'is_active' => 1,
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Metrology Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'MET',
                'is_active' => 1,
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'Physical Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'PHY',
                'is_active' => 0,
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'Formula of Conversion',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'FOC',
                'is_active' => 0,
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'Shelf Life Testing',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'SHL',
                'is_active' => 0,
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'Biological Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'BIO',
                'is_active' => 0,
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'Gamma or Electron Beam Irradiation Facilities',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'GEB',
                'is_active' => 0,
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'Pulp and Paper Testing Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'PPTL',
                'is_active' => 0,
            ),
            16 => 
            array (
                'id' => 18,
                'name' => 'Plywood Testing Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'PLY',
                'is_active' => 0,
            ),
            17 => 
            array (
                'id' => 19,
                'name' => 'Physical and Performance Testing Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'PPT',
                'is_active' => 0,
            ),
            18 => 
            array (
                'id' => 20,
                'name' => 'Furniture Testing Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'FTC',
                'is_active' => 0,
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'Mechanical Metallurgy Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'MML',
                'is_active' => 0,
            ),
            20 => 
            array (
                'id' => 22,
                'name' => 'Physico-Chemical Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'PCL',
                'is_active' => 0,
            ),
            21 => 
            array (
                'id' => 23,
                'name' => 'Corrosion Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'COR',
                'is_active' => 0,
            ),
            22 => 
            array (
                'id' => 24,
                'name' => 'Halal Verification Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'HAL',
                'is_active' => 0,
            ),
            23 => 
            array (
                'id' => 25,
            'name' => 'Organic Chemistry Laboratory (ITDI)',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'OCS',
                'is_active' => 0,
            ),
            24 => 
            array (
                'id' => 26,
            'name' => 'Inorganic Chemistry Laboratory (ITDI)',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'ICS',
                'is_active' => 0,
            ),
            25 => 
            array (
                'id' => 27,
                'name' => 'Pharmacology and Toxicology Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'PTS',
                'is_active' => 0,
            ),
            26 => 
            array (
                'id' => 28,
                'name' => 'Radiation Protection Services',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'RPS',
                'is_active' => 0,
            ),
            27 => 
            array (
                'id' => 29,
                'name' => 'Advance Device and Materials Testing Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'ADMATEL',
                'is_active' => 0,
            ),
            28 => 
            array (
                'id' => 30,
                'name' => 'National Metrology Lab',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'NML',
                'is_active' => 0,
            ),
            29 => 
            array (
                'id' => 31,
                'name' => 'Packaging Testing Division',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'PTD',
                'is_active' => 0,
            ),
            30 => 
            array (
                'id' => 32,
                'name' => 'Nuclear Analytical Techniques Application Section',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'NATA',
                'is_active' => 0,
            ),
            31 => 
            array (
                'id' => 33,
                'name' => 'Biochemical Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'BIOCHE',
                'is_active' => 0,
            ),
            32 => 
            array (
                'id' => 34,
                'name' => 'Rubber Testing Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'RTL',
                'is_active' => 0,
            ),
            33 => 
            array (
                'id' => 35,
                'name' => 'Auto-Parts Testing Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'ATL',
                'is_active' => 0,
            ),
            34 => 
            array (
                'id' => 36,
                'name' => 'Instrumentation Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'INS',
                'is_active' => 0,
            ),
            35 => 
            array (
                'id' => 37,
                'name' => 'Non-Destructive Testing Laboratory',
                'classification' => 'Laboratory',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'NDT',
                'is_active' => 0,
            ),
            36 => 
            array (
                'id' => 38,
                'name' => 'Raw and Processed Food',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            37 => 
            array (
                'id' => 39,
                'name' => 'Marine Products',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            38 => 
            array (
                'id' => 40,
                'name' => 'Canned / Bottled Fish',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            39 => 
            array (
                'id' => 41,
                'name' => 'Fishmeal',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            40 => 
            array (
                'id' => 42,
                'name' => 'Seaweeds',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            41 => 
            array (
                'id' => 43,
                'name' => 'Petroleum Products / Haulers',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            42 => 
            array (
                'id' => 44,
                'name' => 'Mining',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            43 => 
            array (
                'id' => 45,
                'name' => 'Hospitals',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            44 => 
            array (
                'id' => 46,
                'name' => 'Academe / Students',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            45 => 
            array (
                'id' => 47,
                'name' => 'Beverage and Juices',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            46 => 
            array (
                'id' => 48,
                'name' => 'Government / LGUs',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            47 => 
            array (
                'id' => 49,
                'name' => 'Construction',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            48 => 
            array (
                'id' => 50,
                'name' => 'Water Refilling / Bottled Water',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            49 => 
            array (
                'id' => 51,
                'name' => 'Students',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            50 => 
            array (
                'id' => 52,
                'name' => 'Private Individual',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            51 => 
            array (
                'id' => 53,
                'name' => 'Others',
                'classification' => 'Bussiness Nature',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            52 => 
            array (
                'id' => 54,
                'name' => 'Agriculture, Forestry and Fishing',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            53 => 
            array (
                'id' => 55,
                'name' => 'Mining and Quarrying',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            54 => 
            array (
                'id' => 56,
                'name' => 'Manufacturing',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            55 => 
            array (
                'id' => 57,
                'name' => 'Electricity, Gas, Steam and Air Conditioning supply',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            56 => 
            array (
                'id' => 58,
                'name' => 'Water Supply, Sewerage, Waste Management and Remediation Activities',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            57 => 
            array (
                'id' => 59,
                'name' => 'Construction',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            58 => 
            array (
                'id' => 60,
                'name' => 'Wholesale and RetailtTrade; Repair of motor Vehicles and Motorcycles',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            59 => 
            array (
                'id' => 61,
                'name' => 'Transportation and Storage',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            60 => 
            array (
                'id' => 62,
                'name' => 'Accommodation and Food service activities',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            61 => 
            array (
                'id' => 63,
                'name' => 'Information and Communication',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            62 => 
            array (
                'id' => 64,
                'name' => 'Financial and Insurance Activities',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            63 => 
            array (
                'id' => 65,
                'name' => 'Real Estate Activities',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            64 => 
            array (
                'id' => 66,
                'name' => 'Professional, Scientific and Technical Services',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            65 => 
            array (
                'id' => 67,
                'name' => 'Administrative and Support Service Activities',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            66 => 
            array (
                'id' => 68,
                'name' => 'Public Administrative and Defense; Compulsory Social Security',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            67 => 
            array (
                'id' => 69,
                'name' => 'Education',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            68 => 
            array (
                'id' => 70,
                'name' => 'Human Health and Social Work Activities',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            69 => 
            array (
                'id' => 71,
                'name' => 'Arts, Entertainment and Recreation',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            70 => 
            array (
                'id' => 72,
                'name' => 'Other Service Activities',
                'classification' => 'Industry Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            71 => 
            array (
                'id' => 73,
                'name' => 'Individual',
                'classification' => 'Class',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            72 => 
            array (
                'id' => 74,
                'name' => 'Firm',
                'classification' => 'Class',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            73 => 
            array (
                'id' => 75,
                'name' => 'Setup Core',
                'classification' => 'Customer Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            74 => 
            array (
                'id' => 76,
                'name' => 'Setup Non-core',
                'classification' => 'Customer Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            75 => 
            array (
                'id' => 77,
                'name' => 'Non Setup',
                'classification' => 'Customer Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            76 => 
            array (
                'id' => 78,
                'name' => 'Academic',
                'classification' => 'Purpose',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            77 => 
            array (
                'id' => 79,
                'name' => 'Research and Development',
                'classification' => 'Purpose',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            78 => 
            array (
                'id' => 80,
                'name' => 'Tariff / Registration',
                'classification' => 'Purpose',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            79 => 
            array (
                'id' => 81,
                'name' => 'Nutrition Labeling',
                'classification' => 'Purpose',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            80 => 
            array (
                'id' => 82,
                'name' => 'Bidding',
                'classification' => 'Purpose',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            81 => 
            array (
                'id' => 83,
                'name' => 'Quality Evaluation',
                'classification' => 'Purpose',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            82 => 
            array (
                'id' => 84,
                'name' => 'RA 9242 Certification',
                'classification' => 'Purpose',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            83 => 
            array (
                'id' => 85,
                'name' => 'Regulatory',
                'classification' => 'Purpose',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            84 => 
            array (
                'id' => 86,
                'name' => 'Export',
                'classification' => 'Purpose',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            85 => 
            array (
                'id' => 87,
                'name' => 'Pick up',
                'classification' => 'Mode of Release',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            86 => 
            array (
                'id' => 88,
                'name' => 'Delivery',
                'classification' => 'Mode of Release',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            87 => 
            array (
                'id' => 89,
                'name' => 'Mail',
                'classification' => 'Mode of Release',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            88 => 
            array (
                'id' => 90,
                'name' => 'Fax',
                'classification' => 'Mode of Release',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            89 => 
            array (
                'id' => 91,
                'name' => 'Percentage',
                'classification' => 'Discount',
                'type' => 'Subtype',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            90 => 
            array (
                'id' => 92,
                'name' => 'Amount',
                'classification' => 'Discount',
                'type' => 'Subtype',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            91 => 
            array (
                'id' => 93,
                'name' => 'Government Sector',
                'classification' => 'Agency Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'GS',
                'is_active' => 1,
            ),
            92 => 
            array (
                'id' => 94,
                'name' => 'Method',
                'classification' => 'Service Name',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            93 => 
            array (
                'id' => 95,
                'name' => 'Reference',
                'classification' => 'Service Name',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            94 => 
            array (
                'id' => 96,
                'name' => 'Sample Type',
                'classification' => 'Service Name',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            95 => 
            array (
                'id' => 97,
                'name' => 'Test Name',
                'classification' => 'Service Name',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            96 => 
            array (
                'id' => 98,
                'name' => 'Unlimited',
                'classification' => 'Discount',
                'type' => 'Type',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            97 => 
            array (
                'id' => 99,
                'name' => 'Limited',
                'classification' => 'Discount',
                'type' => 'Type',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            98 => 
            array (
                'id' => 100,
                'name' => 'Total Based',
                'classification' => 'Discount',
                'type' => 'Based',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            99 => 
            array (
                'id' => 101,
                'name' => 'Item Based',
                'classification' => 'Discount',
                'type' => 'Based',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            100 => 
            array (
                'id' => 102,
                'name' => 'Occassional Based',
                'classification' => 'Discount',
                'type' => 'Based',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            101 => 
            array (
                'id' => 103,
                'name' => 'Cash',
                'classification' => 'Payment Mode',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            102 => 
            array (
                'id' => 104,
                'name' => 'Cheque',
                'classification' => 'Payment Mode',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            103 => 
            array (
                'id' => 105,
                'name' => 'Money Order',
                'classification' => 'Payment Mode',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            104 => 
            array (
                'id' => 106,
                'name' => 'Bank to Bank',
                'classification' => 'Payment Mode',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            105 => 
            array (
                'id' => 107,
                'name' => 'Analysis Fee',
                'classification' => 'Collection Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            106 => 
            array (
                'id' => 108,
                'name' => 'Calibration Fee',
                'classification' => 'Collection Type',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
        ));

        
    }
}