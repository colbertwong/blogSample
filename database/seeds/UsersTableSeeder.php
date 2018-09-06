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
        $users = factory(User::class)->times(51)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'colbertwong';
        $user->email = 'colbertwong@foxmail.com';
        $user->password = bcrypt('password');
        $user->is_admin = true;
        $user->save();
    }
}
