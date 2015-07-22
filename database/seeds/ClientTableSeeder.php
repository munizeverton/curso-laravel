<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \CursoLaravel\Models\Client::truncate();
        factory(\CursoLaravel\Models\Client::class, 10)->create();
    }
}
