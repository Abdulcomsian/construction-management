<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'title' => 'TWF 2012-01-DEC13',
                'description' => 'Hoardings - a Guide to good practice'
            ],
            [
                'title' => 'BS 5975:2019',
                'description' => 'Temporary Works Procedures'
            ],
            [
                'title' => 'BS 1722-5:2006',
                'description' => 'Fences. Specification for close-boarded fences and wooden palisade fences'
            ],
            [
                'title' => 'BS 559:2009',
                'description' => 'Specification for the design and construction of signs for publicity, decorative and 
                general purposes'
            ],
            [
                'title' => 'BS EN 1991-1',
                'description' => 'Eurocode 1: Actions on structures and National Annex'
            ],
            [
                'title' => 'BS EN 13200-3:2018',
                'description' => 'Spectator facilities. Separating elements - requirements'
            ],
            [
                'title' => 'BS EN 1997-1:2004',
                'description' => 'Eurocode 7. Geotechnical design - General rules'
            ],
            [
                'title' => 'BS EN 338:2016',
                'description' => 'Structural timber. Strength classes'
            ],
            [
                'title' => 'CIRIA SP95',
                'description' => 'The design and construction of sheet-piled cofferdams                '
            ],
            [
                'title' => 'BS EN 335:2013',
                'description' => 'Durability of wood and wood-based products - Use classes: definitions, application to 
                solid wood and wood-based products'
            ],
            [
                'title' => 'BS EN 12369-1',
                'description' => 'Wood-based panels. Characteristic values for structural design OSB, particleboards 
                and fireboards'
            ],
            [
                'title' => 'BS EN 310:1993',
                'description' => 'Wood-based panels. Determination of modulus of elasticity in bending and of
                bending strength'
            ],
            [
                'title' => 'BS EN 1995-1-1:2004',
                'description' => 'Design of Timber Structures - General. Common Rules and Rules for Buildings'
            ],
            [
                'title' => 'TG 20:21',
                'description' => 'Good practice Guidance for Tube and Fitting Scaffolding'
            ],
            [
                'title' => 'SG 4:15',
                'description' => 'Preventing Falls in Scaffolding Operations'
            ],
            [
                'title' => 'BS EN 1990:2002',
                'description' => 'Basis of Structural Design'
            ],
            [
                'title' => 'BS EN 350-2016',
                'description' => 'Durability of wood and wood-based products. Testing and classification of the durability 
                to biological agents of wood and wood-based materials'
            ],
            [
                'title' => 'BS 6180:2011',
                'description' => 'Barriers in and about Buildings. Code of Practice'
            ],


        ];

        foreach ($roles as $role) {
            Tag::create($role);
        }
    }
}
