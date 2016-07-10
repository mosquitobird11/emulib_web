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

        DB::table('nes_hashes')->insert([
            [
                'game_id' => 3,
                'hash_type' => 'sha1',
                'hash' => 'a03e7e526e79df222e048ae22214bca2bc49c449',
                'variation_name' => '(USA)',
                'description' => 'The original North american release of smb3'
            ],
            [
                'game_id' => 3,
                'hash_type' => 'sha1',
                'hash' => '6bd518e85eb46a4252af07910f61036e84b020d1',
                'variation_name' => '(USA) Revision A',
                'description' => 'The revised North american release of smb3'
            ]
        ]);

        DB::table('nes_specs')->insert([
            [
                'game_id' => 3,
                'mapper_number' => 4,
                'mapper_name' => 'Nintendo MMC3',
                'prg' => '16 x 16kB',
                'chr' => '16 x 8kB',
                'mirroring' => 1
            ]
        ]);

        DB::table('arts')->insert([
            [
                'game_id' => 3,
                'theme_id' => 1,
                'type' => 'Main',
                'filename' => 'nes_supermariobros3.jpg'
            ]
        ]);

        DB::table('nes_releases')->insert([
            [
                'game_id' => 3,
                'year' => 1988,
                'month' => 10,
                'day' => 23,
                'region' => 'Japan'
            ],
            [
                'game_id' => 3,
                'year' => 1990,
                'month' => 2,
                'day' => 9,
                'region' => 'North America'
            ],
            [
                'game_id' => 3,
                'year' => 1991,
                'month' => 8,
                'day' => 29,
                'region' => 'PAL'
            ],
        ]);
    }
}
