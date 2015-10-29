<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * List of supported courses.
     *
     * @var array
     */
    protected $courses = [
        [
            'name' => 'Bachelor of Business Information Technology',
            'slug' => 'Bsc.BIT',
        ],
        [
            'name' => 'Bachelor of Commerce',
            'slug' => 'Bsc.COM',
        ],
        [
            'name' => 'Bachelor of Construction Management',
            'slug' => 'BCM',
        ],
        [
            'name' => 'Bachelor of Landscape Architecture',
            'slug' => 'BLA',
        ],
        [
            'name' => 'Bachelor of Purchasing and Supplies Management',
            'slug' => 'BPSM',
        ],
        [
            'name' => 'Bachelor of Science Biochemistry',
            'slug' => 'Bsc. BioChem',
        ],
        [
            'name' => 'Bachelor of Science in Industrial Biotechnology',
            'slug' => 'Bsc. IB',
        ],
        [
            'name' => 'Bachelor of Architectural Technology',
            'slug' => 'BAT',
        ],
        [
            'name' => 'BSc. Agribusiness Economics and Food Industry Management',
            'slug' => 'Bsc. AEFIM',
        ],
        [
            'name' => 'BSc. Actuarial Science',
            'slug' => 'Bsc.Acturial',
        ],
        [
            'name' => 'BSc. Agribusiness Management and Enterprise Development',
            'slug' => 'Bsc.AMED',
        ],
        [
            'name' => 'BSc. Agricultural Economics and Rural Development',
            'slug' => 'Bsc.AERD',
        ],
        [
            'name' => 'BSc. Analytical Chemistry',
            'slug' => 'Bsc.Analytical Chem',
        ],
        [
            'name' => 'BSc. Animal Health, Production and Processing',
            'slug' => 'Bsc.AHPP',
        ],
        [
            'name' => 'BSc. Biochemistry and Molecular Biology</',
            'slug' => 'Bsc.BMB',
        ],
        [
            'name' => 'BSc. Biomechanical and Process Engineering',
            'slug' => 'Bsc.BPE',
        ],
        [
            'name' => 'BSc. Biotechnology',
            'slug' => 'Bsc.BioTech',
        ],
        [
            'name' => 'BSc. Botany',
            'slug' => 'Bsc.Botany',
        ],
        [
            'name' => 'BSc. Chemistry',
            'slug' => 'Bsc.Chem',
        ],
        [
            'name' => 'BSc. Civil Engineering',
            'slug' => 'Bsc.Civil',
        ],
        [
            'name' => 'BSc. Computer Science',
            'slug' => 'Bsc.CS',
        ],
        [
            'name' => 'BSc. Computer Technology',
            'slug' => 'Bsc.CT',
        ],
        [
            'name' => 'BSc. Computer Technology',
            'slug' => 'Bsc.CT',
        ],
        [
            'name' => 'BSc. Crop Protection',
            'slug' => 'Bsc.CP',
        ],
        [
            'name' => 'BSc. Electrical and Electronic Engineering',
            'slug' => 'Bsc.EEE',
        ],
        [
            'name' => 'BSc. Electronic and Computer Engineering',
            'slug' => 'Bsc.ECE',
        ],
        [
            'name' => 'BSc. Environmental Horticulture And Landscaping Technology',
            'slug' => 'Bsc.EHLT',
        ],
        [
            'name' => 'BSc. Financial Engineering',
            'slug' => 'Bsc.FE',
        ],[
            'name' => 'BSc. Food Science and Nutrition',
            'slug' => 'Bsc.FSN',
        ],[
            'name' => 'BSc. Food Science and Postharvest Technology',
            'slug' => 'Bsc.FSPT',
        ],
        [
            'name' => 'BSc. Geomatics Engineering',
            'slug' => 'Bsc.GE',
        ],
        [
            'name' => 'BSc. Horticulture',
            'slug' => 'Bsc.Horticulture',
        ],
        [
            'name' => 'BSc. Human Nutrition and Dietetics',
            'slug' => 'Bsc.HND',
        ],
        [
            'name' => 'BSc. Industrial Chemistry',
            'slug' => 'Bsc.IndustrialChem',
        ],
        [
            'name' => 'BSc. Information Technology',
            'slug' => 'Bsc.IT',
        ],
        [
            'name' => 'BSc. Land Resource Planning and Management',
            'slug' => 'Bsc.LRPM',
        ],[
            'name' => 'BSc. Mechanical Engineering',
            'slug' => 'BSC.Mechanical Eng.',
        ],
        [
            'name' => 'BSc. Mechatronics Engineering',
            'slug' => 'Bsc.Mechatronics Eng.',
        ],
        [
            'name' => 'BSc. Medical Laboratory Sciences',
            'slug' => 'Bsc.MLS',
        ],
        [
            'name' => 'BSc. Medical Microbiology',
            'slug' => 'Bsc.MM',
        ],
        [
            'name' => 'BSc. Physics',
            'slug' => 'Bsc.Physics',
        ],[
            'name' => 'BSc. Soil, Water and Environmental Engineering',
            'slug' => 'Bsc.SWEE',
        ],[
            'name' => 'BSc. Telecommunication and Information Engineering',
            'slug' => 'Bsc.TIE',
        ],
        [
            'name' => 'Diploma in Clinical Medicine',
            'slug' => 'Dip.CM',
        ],[
            'name' => 'Diploma in HIV/AIDS Management',
            'slug' => 'Dip.HIV/AIDS Mgt.',
        ],
        [
            'name' => 'Diploma In Architecture',
            'slug' => 'Dip.Arch',
        ],
        [
            'name' => 'Diploma in Business Administration',
            'slug' => 'Dip.BA',
        ],[
            'name' => 'Diploma in Business Information Technology',
            'slug' => 'Dip.BIT',
        ],
        [
            'name' => 'Diploma in Food Technology',
            'slug' => 'Dip.FT',
        ],
        [
            'name' => 'Diploma in Information Technology',
            'slug' => 'Dip.IT',
        ],[
            'name' => 'Diploma in Purchasing and Supplies Management',
            'slug' => 'Dip.PSM',
        ],[
            'name' => 'Certificate in HIV/AIDS Management',
            'slug' => 'Cert.HIV/AIDS Mgt',
        ],
        [
            'name' => 'Certificate in Information Technology',
            'slug' => 'Cert.IT',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->courses as $course)
        {
            DB::table('courses')->insert([
                'name' => $course['name'],
                'slug' => $course['slug'],
            ]);
        }
    }
}
