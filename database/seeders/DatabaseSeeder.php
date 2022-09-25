<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        for ($i = 0; $i < 10; $i++){
            \App\Models\Category::factory()->create([
                'name' => 'Category ' . $i,

            ]);
        }

        for ($j = 0; $j < 10; $j++){
            \App\Models\Project::factory()->create(function (){
                return [
                    'name' => 'Project ' . rand(1, 10),
                    'image' => fake()->imageUrl(),
                    'content' => fake()->text(),
                    'category_id' => rand(1, 10),
                ];
            });
        }

        for ($i = 0; $i < 8; $i++){
            \App\Models\Team::factory()->create(function (){
                $input = array("Développeur Front", "Graphiste", "Développeur Back", "Intégrateur");
                return [
                    
                    'firstname' => fake()->firstname(),
                    'lastname' => fake()->lastName(),
                    'image' => '/assets/images/team/team-01/image-0' . rand(1, 4). '.jpg',
                    'role' => $input[array_rand($input)],
                ];
            });
        }
    }
}
