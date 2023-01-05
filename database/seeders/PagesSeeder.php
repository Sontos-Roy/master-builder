<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['page_name' => 'about'],
            ['page_name' => 'media'],
            ['page_name' => 'properties'],
            ['page_name' => 'contact']
        ];
        DB::table('pages')->insert(
            $data
        );
    }
}
