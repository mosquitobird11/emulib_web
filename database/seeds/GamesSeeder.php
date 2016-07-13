<?php

use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{

    //Get NES games titles to create stubs
    public function getNesGames(){
        $list = [];
        $handle = fopen(public_path('lists/nes.txt'), "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $list[] = $line;   
            }
            fclose($handle);
        }
        return $list;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //get stubs
        $nes_games = $this->getNesGames();

        //NES STUB INSERTS
        foreach ($nes_games as $g){
            DB::table('games')->insert(['id' => null, 'name' => $g, 'type_id' => 1]);
        }


        //NES INSERTS (SMB3 As Data Test)
        $smb3 = DB::table('games')->insertGetId(
        	[
	            'name' => 'Super Mario Bros. 3',
	            'type_id' => 1
        	]
        );

        //NES INSERTS (SMB3 As Data Test)
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

        //NES INSERTS (SMB3 As Data Test)
        DB::table('nes_basics')->insert([
        	[
        		'id' => 1,
        		'game_id' => $smb3,
                'short' =>  "The third installment of the Super Mario Bros. Series brings new powerups, dangerous enemies, and exciting new worlds to explore!"
        	]
        ]);

        //NES INSERTS (SMB3 As Data Test)
        DB::table('nes_achievements')->insert([
        	[
	        	'id' => 1,
	        	'game_id' => $smb3,
	        	'name' => 'Conqueror - Grass Land',
	        	'description' => 'Complete World 1 by defeating the airship boss.',
	        	'neslocker_id' => 1
        	],
        	[
	        	'id' => 2,
	        	'game_id' => $smb3,
	        	'name' => 'Conqueror - Desert Land',
	        	'description' => 'Complete World 2 by defeating the airship boss.',
	        	'neslocker_id' => 2
        	],
        	[
	        	'id' => 3,
	        	'game_id' => $smb3,
	        	'name' => 'Conqueror - Water Land',
	        	'description' => 'Complete World 3 by defeating the airship boss.',
	        	'neslocker_id' => 3
        	]
        ]);

        //NES INSERTS (SMB3 As Data Test)
        DB::table('nes_cheats')->insert([
        	[
        		'id' => 1,
        		'game_id' => $smb3,
        		'name' => 'Raise power meter standing still',
        		'value' => 'AANZKLLA',
        		'description' => 'You must be Raccoon Mario for this code, which allows you to fly from a standing start'
        	],
        	[
        		'id' => 2,
        		'game_id' => $smb3,
        		'name' => 'Start on World 2',
        		'value' => 'PEUZUGAA',
        		'description' => NULL
        	]
        ]);

        //NES INSERTS (SMB3 As Data Test)
        DB::table('nes_hashes')->insert([
            [
                'game_id' => $smb3,
                'hash_type' => 'sha1',
                'hash' => 'a03e7e526e79df222e048ae22214bca2bc49c449',
                'variation_name' => '(USA)',
                'description' => 'The original North american release of smb3'
            ],
            [
                'game_id' => $smb3,
                'hash_type' => 'sha1',
                'hash' => '6bd518e85eb46a4252af07910f61036e84b020d1',
                'variation_name' => '(USA) Revision A',
                'description' => 'The revised North american release of smb3'
            ]
        ]);

        //NES INSERTS (SMB3 As Data Test)
        DB::table('nes_specs')->insert([
            [
                'game_id' => $smb3,
                'mapper_number' => 4,
                'mapper_name' => 'Nintendo MMC3',
                'prg' => '16 x 16kB',
                'chr' => '16 x 8kB',
                'mirroring' => 1
            ]
        ]);

        //NES INSERTS (SMB3 As Data Test)
        DB::table('nes_releases')->insert([
            [
                'game_id' => $smb3,
                'year' => 1988,
                'month' => 10,
                'day' => 23,
                'region' => 'Japan'
            ],
            [
                'game_id' => $smb3,
                'year' => 1990,
                'month' => 2,
                'day' => 9,
                'region' => 'North America'
            ],
            [
                'game_id' => $smb3,
                'year' => 1991,
                'month' => 8,
                'day' => 29,
                'region' => 'PAL'
            ],
        ]);
    }
}
