<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $users = User::get();

        if($users->count() == 0) {
            users::create(array(
                'name' => 'Tiago Doria',
                'password' => Hash::make('adminadmin'),
                'email'  => 'tiagodoriap@gmail.com',
                'role'  => 'admin'
            ));
        }
    }

}
