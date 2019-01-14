<?php

use Illuminate\Database\Seeder;

class PermisologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('permisology')->insert(array(
            'id' => 2,
            'permisology' => 'user'));
    }
}
