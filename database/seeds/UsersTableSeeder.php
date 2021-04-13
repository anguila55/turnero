<?php

use App\Constants\TypeUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@onlife.com.ar',
            'password' => Hash::make('onlife2020'),
            'name' => 'Onlife',
            'type' => TypeUser::ADMIN]);
    }
}
