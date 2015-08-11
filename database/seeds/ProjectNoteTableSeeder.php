<?php

use Illuminate\Database\Seeder;

class ProjectNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\CursoLaravel\Entities\Project::truncate();
        factory(\CursoLaravel\Entities\ProjectNote::class, 50)->create();
    }
}
