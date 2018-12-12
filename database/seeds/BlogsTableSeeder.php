<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 10;
        for ($i=0; $i <= $count ; $i++) { 
            DB::table('blog')->insert(array(
                'title' => 'teste' . $i,
                'content' => 'Teste number' . $i,
                'user_id' => 1,
                'state_id' => 1));    
        }
        
    }
}
