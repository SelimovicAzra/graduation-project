<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'azra',
            'birth_date' => '1997-10-30 07:52:09',
            'email' => 'azra@email.com',
            'password' => 12345678,
            'gender' =>'female',
            'admin' => true,
    ]);
        $user = User::create([
            'name' => 'secret',
            'birth_date' => '1997-10-30 07:52:09',
            'email' => 'secret@email.com',
            'password' => 12345678,
            'gender' =>'female',
        ]);
        $user = factory(User::class, 10)->create();
    }
}
