<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'=>1,
            'login'=>'admin',
            'email'=>'ff@ff.rr',
            'password'=>'$2y$10$uv0MIIMFe5C5Kaz.AWCu6.jTJHEXSwlyTXyeR1fTWucMGuRSyNRSG',
            'role'=>2,
            'remember_token'=>NULL,
            'created_at'=>'2017-09-28 22:39:49',
            'updated_at'=>'2017-09-28 22:39:49',
        ]);
    }
}
