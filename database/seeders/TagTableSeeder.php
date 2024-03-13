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
        // 'category_name' => ''
        $roles = [
            [
                'title' => 'EN 39',
                'description' => '',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 74-1',
                'description' => '2005 Couplers, spigot pins and base plates for use in falsework and scaffolds Couplers for tubes. Requirements and test procedures',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 74-2',
                'description' => '2008 Couplers, spigot pins and baseplates for use in falsework and scaffolds Special couplers. Requirements and test procedures',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 74-3',
                'description' => '2007 Couplers, spigot pins and baseplates for use in falsework and scaffolds Plain base plates and spigot pins. Requirements and test procedures ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'BS EN 789',
                'description' => '2004 Timber structures. Test methods. Determination of mechanical properties of wood based panels ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 1004',
                'description' => '2004 Mobile access and working towers made of prefabricated elements. Materials, dimensions, design loads, safety and performance requirements',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 1058',
                'description' => '2009 Wood-based panels. Determination of characteristic 5-percentile values and characteristic mean values',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 1065',
                'description' => '1999 Adjustable telescopic steel props. Product specifications, design and assessment by calculation and tests ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 1090-1',
                'description' => '2009+A1: 2011 Execution of steel structures and aluminium structures Requirements for conformity assessment of structural components',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 1090-2',
                'description' => '2008+A1: 2011 Execution of steel structures and aluminium structures Technical requirements for steel structures',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 1090-3',
                'description' => '2008 Execution of steel structures and aluminium structures Technical requirements for aluminium structures',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 1263-1',
                'description' => '2002 Safety nets Safety requirements, test methods ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 1263-2',
                'description' => '2002 Safety nets Safety requirements for the positioning limits',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 1298',
                'description' => '1996 Mobile access and working towers. Rules and guidelines for the preparation of an instruction manual ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'BS EN 12063',
                'description' => '1999 Execution of special geotechnical work. Sheet pile walls',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 12369-1',
                'description' => '2001 Wood-based panels. Characteristic values for structural design OSB, particleboards and fireboards',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'BS EN 12369-2',
                'description' => '2011 Wood-based panels. Characteristic values for structural design. Plywood',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 12810-1',
                'description' => '2003 Facade scaffolds made of prefabricated components. Product specifications',
                'category_name' => 'European Standards'
            ],

            [
                'title' => 'EN 12810-2',
                'description' => '2003 Facade scaffolds made of prefabricated components. Particular methods of structural design',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 12811-1',
                'description' => '2003 Temporary works equipment. Scaffolds. Performance requirements and general design ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 12811-2',
                'description' => '2004 Temporary works equipment. Information on materials ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 12811-3',
                'description' => '2002 Temporary works equipment. Load testing ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 12811-4',
                'description' => '2013 Temporary works equipment Protection fans for scaffolds. Performance requirements and product design ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 12812',
                'description' => '2008 Falsework ‐ performance requirements and general design',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 12813',
                'description' => '2004 Temporary works equipment. Load bearing towers of prefabricated components. Particular methods of structural design',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 13331-1',
                'description' => '2002 Trench lining systems Product specifications ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 13331-2',
                'description' => '2002 Trench lining systems Assessment by calculation or test ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 13374',
                'description' => '2013 Temporary edge protection systems. Product specification. Test methods ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 13377',
                'description' => '2002 Prefabricated timber formwork beams. Requirements, classification and assessment ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 14653-1',
                'description' => '2005 Manually operated hydraulic shoring systems for groundwork support Product specifications ',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 14653-2',
                'description' => '2005 Manually operated hydraulic shoring systems for groundwork support Assessment by calculation or test',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 16031',
                'description' => '2012 Adjustable telescopic aluminium props. Product specifications, design and assessment by calculation and tests',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'Eurocode 0',
                'description' => 'Basis of structural design',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'BS EN 1990',
                'description' => '2002 +A1:2005    Eurocode 0: Basis of structural design',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'NA to BS EN 1990:2002 + A1',
                'description' => '2005     UK National Annex to Eurocode 0 Basis of structural design',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'EN 1991 Eurocode',
                'description' => 'Actions on Structures',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'Eurocode 1',
                'description' => 'Actions on structures',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'BS EN 1991-1-1',
                'description' => '2002    Eurocode 1: Actions on structures. General Actions. Densities, self-weight, imposed load for buildings',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'NA to BS EN 1991-1-1',
                'description' => '2002 UK National Annex to Eurocode 1: Actions on structures. General Actions. Densities, self-weight, imposed load for buildings',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'BS EN 1991-1-5',
                'description' => '2003 Eurocode 1: Actions on structures. General Actions. Thermal actions',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'NA to BS EN 1991-1-6',
                'description' => '2005 UK National Annex to Eurocode 1: Actions on structures. General Actions. Actions during execution',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'BS EN 1991-1-7',
                'description' => '2006 +A1:2014 Eurocode 1: Actions on structures. General Actions. Accidental actions',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'BS EN 1991-2',
                'description' => '2003 Eurocode 1: Actions on structures. Traffic loads on bridges',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'NA +A1',
                'description' => '2020 to BS EN 1991-2:2003     UK National Annex to Eurocode 1: Actions on structures. Traffic loads on bridges',
                'category_name' => 'European Standards'
            ],[
                'title' => 'EN 1992 Eurocode 2',
                'description' => 'Design of concrete structures',
                'category_name' => 'European Standards'
            ],[
                'title' => 'EN 1993 Eurocode 3',
                'description' => 'Design of steel structures',
                'category_name' => 'European Standards'
            ],[
                'title' => 'EN 1994 Eurocode 4',
                'description' => 'Design of composite steel and concrete structures',
                'category_name' => 'European Standards'
            ],[
                'title' => 'Eurocode 5',
                'description' => 'Design of timber structures',
                'category_name' => 'European Standards'
            ],[
                'title' => 'NA to BS EN 1995-1-1:',
                'description' => '2004 + A2:2014 UK National Annex to Eurocode 5: Design of timber structures – Part 1-1 General – common rules and rules for buildings',
                'category_name' => 'European Standards'
            ],[
                'title' => 'BS EN 1995-2',
                'description' => '2004 Eurocode 5: Design of timber structures – Part 2 Bridges',
                'category_name' => 'European Standards'
            ],[
                'title' => 'NA to BS EN 1995-2',
                'description' => '2004 UK National Annex to Eurocode 5: Design of timber structures – Part 2 Bridges',
                'category_name' => 'European Standards'
            ],[
                'title' => 'EN 1996 Eurocode 6',
                'description' => 'Design of masonry structures',
                'category_name' => 'European Standards'
            ],[
                'title' => 'Eurocode 7',
                'description' => 'Geotechnical design',
                'category_name' => 'European Standards'
            ],[
                'title' => 'BS EN 1997-1',
                'description' => '2004+A1:2013 Eurocode 7: Geotechnical design – Part 1 General rules',
                'category_name' => 'European Standards'
            ],[
                'title' => 'NA+A2',
                'description' => '2022 to BS EN 1997-1:2004+A1:2013   UK National Annex to Eurocode 7: Geotechnical design – Part 1 General rules',
                'category_name' => 'European Standards'
            ],[
                'title' => 'BS EN 1997-2',
                'description' => '2007 Eurocode 7: Geotechnical design – Part 2 Ground investigation and testing',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'NA to BS EN 1997-2',
                'description' => '2007 UK National Annex to Eurocode 7: Geotechnical design – Part 2 Ground investigation and testing',
                'category_name' => 'European Standards'
            ],
            [
                'title' => 'BS EN 13369',
                'description' => '2023 Common rules for precast concrete products',
                'category_name' => 'Execution Standards referenced in British Standards or Eurocodes'
            ],
            [
                'title' => 'EN 1998 Eurocode 8',
                'description' => 'Design of structures for earthquake resistance',
                'category_name' => 'Execution Standards referenced in British Standards or Eurocodes'
            ],
            [
                'title' => 'EN 1998 Eurocode 9',
                'description' => 'Design of aluminium structures',
                'category_name' => 'Execution Standards referenced in British Standards or Eurocodes'
            ],
            [
                'title' => 'BS 8002',
                'description' => '2015 Code of practice for earth retaining structures',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'BS 8004',
                'description' => '2015 +A1 2020 Code of practice for foundations',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'BS 8006-1',
                'description' => '2010+A1: 2016 Code of practice for strengthened/reinforced soils and other fills',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'BS 8500-1',
                'description' => '2023 Concrete – Complementary British Standard to BS EN 206: Method of specifying and guidance for the specifier.',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'BS 8500-2',
                'description' => '2023 Concrete – Complementary British Standard to BS EN 206: Specification for constituent materials and concrete.',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'BS 1139',
                'description' => 'Part 1: Safety nets Safety requirements, test methods',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'BS 1139',
                'description' => 'Part 2: Section 2.1: 1991 Metal Scaffolding. Couplers. Specification for Steel Couplers, Loose Spigots and Baseplates for use in Working Scaffolds and Falsework Made of Steel Tubes',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'BS 1139',
                'description' => 'Part 2: Section 2.2: 1991 Metal Scaffolding. Couplers. Specification for Steel and Aluminium Couplers, Fittings and Accessories for use in Tubular Scaffolding ',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'BS 1139',
                'description' => 'Part 4: 1982 Metal Scaffolding. Specification for Prefabricated Steel Splitheads and Trestles ',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'BS 1139',
                'description' => 'Part 6: 2005 Metal scaffolding. Specification for prefabricated tower scaffolds outside the scope of EN 1004, but utilizing components from such systems',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'BS 2482',
                'description' => '2009 Specification for timber scaffold boards',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'BS 5975',
                'description' => '2008+A1: 2011 Code of practice for temporary works procedures and the permissible stress design of falsework',
                'category_name' => 'British Standards'
            ],
            [
                'title' => 'MCHW Volume 1',
                'description' => 'October 2022     Specification for Highway Works',
                'category_name' => 'The Manual Contract Document for Highway Works (MCHW)'
            ],
            [
                'title' => 'MCHW Volume 2',
                'description' => 'October 2022     Notes for guidance on the Specification for Highway Works',
                'category_name' => 'The Manual Contract Document for Highway Works (MCHW)'
            ],
            [
                'title' => 'Formwork',
                'description' => 'A Guide to Good Practice, 2nd Edition. Concrete Society',
                'category_name' => 'Other documents'
            ],[
                'title' => 'SCI Publication P360',
                'description' => 'A Guide to Good Practice, 2nd Edition. Concrete Society',
                'category_name' => 'Other documents'
            ],[
                'title' => 'TG20',
                'description' => '13 Good Practice Guidance for Tube and Fitting Scaffolding, NASC',
                'category_name' => 'Other documents'
            ],[
                'title' => 'Hewlett, Jones, Marchand and Bell (2014)',
                'description' => 'Re-visiting Bragg to keep UK’s temporary works safe under',
                'category_name' => 'Other documents'
            ],[
                'title' => 'EuroNorms',
                'description' => 'Proceedings of the Institution of Civil Engineers – Forensic Engineering 167 (May 2014): 58-68 ',
                'category_name' => 'Other documents'
            ],[
                'title' => 'CIRIA C777',
                'description' => 'General fixings – guidance on selection and whole-life management',
                'category_name' => 'Other documents'
            ],

        ];

        foreach ($roles as $role) {
            Tag::create($role);
        }
    }
}
