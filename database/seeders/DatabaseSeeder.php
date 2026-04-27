<?php

namespace Database\Seeders;

use App\Models\SubTask;
use App\Models\task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = '123';
        User::factory()->create(["email"=>"flexa@gmail.com","password" => Hash::make($password)]);

        $user = User::where('email','flexa@gmail.com')->first();

        if($user){

            Task::factory()
            ->count(10)
            ->has(SubTask::factory()->count(4))
            ->create([
                'user_id' =>$user->id,
            ]);
        }



        /***
         * User::factory()->create([
            'name' => 'teste',
            'email' => 'test@example.com',
        ]);
        */

    }
}
