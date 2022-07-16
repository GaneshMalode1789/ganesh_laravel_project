<?php

use App\Models\Skill;
use Illuminate\Database\Seeder;

class CreateSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            'Makeup Artist',
            'Hair Stylist',
            'Barber',
            'Makeup Designer'
         ];

         foreach ($skills as $skill) {
              Skill::create(['title' => $skill]);
         }
    }
}
