<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class secNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['sec_name' => 'invite'],
            ['sec_name' => 'progress'],
            ['sec_name' => 'design'],
            ['sec_name' => 'featured_project'],
            ['sec_name' => 'recent_project'],
            ['sec_name' => 'memberOff'],
            ['sec_name' => 'featured_project'],
            ['sec_name' => 'recent_project'],
            ['sec_name' => 'ongoing_project'],
            ['sec_name' => 'completed_project'],
            ['sec_name' => 'wishtojoin'],
            ['sec_name' => 'management'],
            ['sec_name' => 'corevalues'],
            ['sec_name' => 'story'],
            ['sec_name' => 'contact']
        ];
        DB::table('sec_names')->insert(
            $data
        );
    }
}
