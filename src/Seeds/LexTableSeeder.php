<?php

namespace Smarch\Lex\Seeds;

use DB;

use Illuminate\Database\Seeder;

class LexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // currencies
        $currencies = [
            [ 
                'name'          => 'Penny',
                'slug'          => 'base',
                'base_value'    => '1',
                'convertible'   => '1',
                'tradeable'     => '1',
                'sellable'      => '1',
                'rewardable'    => '1',
                'discoverable'  => '1',
                'available'     => '1',
            ],
            [ 
                'name'          => 'Quarter',
                'slug'          => 'quarter',
                'base_value'    => '25',
                'convertible'   => '1',
                'tradeable'     => '1',
                'sellable'      => '1',
                'rewardable'    => '1',
                'discoverable'  => '1',
                'available'     => '1',
            ],
            [ 
                'name'          => 'Dollar',
                'slug'          => 'buck',
                'base_value'    => '100',
                'convertible'   => '1',
                'tradeable'     => '1',
                'sellable'      => '1',
                'rewardable'    => '1',
                'discoverable'  => '1',
                'available'     => '1',
            ],
            [ 
                'name'          => 'Silver',
                'slug'          => 'silver',
                'base_value'    => '1350',
                'convertible'   => '1',
                'tradeable'     => '1',
                'sellable'      => '1',
                'rewardable'    => '1',
                'discoverable'  => '0',
                'available'     => '1',
            ],
            [ 
                'name'          => 'Gold',
                'slug'          => 'gold',
                'base_value'    => '110000',
                'convertible'   => '1',
                'tradeable'     => '0',
                'sellable'      => '1',
                'rewardable'    => '0',
                'discoverable'  => '0',
                'available'     => '1',
            ],
            [ 
                'name'          => 'Unobtanium',
                'slug'          => 'dumbname',
                'base_value'    => '10000000000',
                'convertible'   => '0',
                'tradeable'     => '0',
                'sellable'      => '0',
                'rewardable'    => '1',
                'discoverable'  => '0',
                'available'     => '0',
            ],

        ];
        
        // insert roles
        DB::table('currencies')->insert($currencies);
    }
        
}
