<?php

use Illuminate\Database\Seeder;

class InstitutionTableSeeder extends Seeder
{
    /**
     * List of the supported universities.
     *
     * @var array
     */
    protected $institutions = [
        [
            'name' => 'Jomo Kenyatta University of Science and Technology',
            'slug' => 'JKUAT'
        ],
        [
            'name' => 'Kenyatta University',
            'slug' => 'KU'
        ],
        [
            'name' => 'Moi University',
            'slug' => 'MU'
        ],
        [
            'name' => 'Mount Kenya University',
            'slug' => 'MKU'
        ],
        [
            'name' => 'Kenya Methodist University',
            'slug' => 'KEMU'
        ],
        [
            'name' => 'University of Nairobi',
            'slug' => 'UON'
        ],
        [
            'name' => 'United States International University',
            'slug' => 'USIU'
        ],


    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->institutions as $institution)
        {
            DB::table('institutions')->insert([
                'name' => $institution['name'],
                'slug' => $institution['slug'],
            ]);
        }
    }
}
