<?php

use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
        	[
	        	'id' => 3,
	            'name' => 'Super Mario Bros. 3',
	            'type_id' => 1
        	]
        ]);

        DB::table('neslockers')->insert([
        	[
	        	'id' => 1
        	],
        	[
	        	'id' => 2
        	],
        	[
	        	'id' => 3
        	]
        ]);

        DB::table('nes_basics')->insert([
        	[
        		'id' => 1,
        		'game_id' => 3,
        		'short' => 'Super mario bros. 3 is good',
        		'long' => 'It is really really really really really good'
        	]
        ]);

        DB::table('nes_achievements')->insert([
        	[
	        	'id' => 1,
	        	'game_id' => 3,
	        	'name' => 'Conqueror - Grass Land',
	        	'description' => 'Complete World 1 by defeating the airship boss.',
	        	'neslocker_id' => 1
        	],
        	[
	        	'id' => 2,
	        	'game_id' => 3,
	        	'name' => 'Conqueror - Desert Land',
	        	'description' => 'Complete World 2 by defeating the airship boss.',
	        	'neslocker_id' => 2
        	],
        	[
	        	'id' => 3,
	        	'game_id' => 3,
	        	'name' => 'Conqueror - Water Land',
	        	'description' => 'Complete World 3 by defeating the airship boss.',
	        	'neslocker_id' => 3
        	]
        ]);

        DB::table('nes_cheats')->insert([
        	[
        		'id' => 1,
        		'game_id' => 3,
        		'name' => 'Raise power meter standing still',
        		'value' => 'AANZKLLA',
        		'description' => 'You must be Raccoon Mario for this code, which allows you to fly from a standing start'
        	],
        	[
        		'id' => 2,
        		'game_id' => 3,
        		'name' => 'Start on World 2',
        		'value' => 'PEUZUGAA',
        		'description' => NULL
        	]
        ]);

    }
}
