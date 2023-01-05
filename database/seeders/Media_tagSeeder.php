<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Media_tagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'INTERIOR', 'tag' => 'interior'],
            ['name' => 'BUILDING', 'tag' => 'building'],
            ['name' => 'SPACES', 'tag' => 'space']
        ];
        DB::table('media__tags')->insert(
            $data
        );
    }
}
