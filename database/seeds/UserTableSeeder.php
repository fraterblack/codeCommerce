<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create([
            'name' => 'Edvaldo da Rosa',
            'email' => 'contato@bck.com.br',
            'password' => Hash::make('123456'),
            'is_admin' => 1
        ]);

        factory('CodeCommerce\User', 10)->create();
    }
}
