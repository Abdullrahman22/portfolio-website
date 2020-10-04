<?php

use Illuminate\Database\Seeder;

class MessegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Messege::class , 16 )->create();
    }
}
