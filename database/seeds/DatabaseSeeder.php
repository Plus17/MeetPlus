<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->insert([
            'name' => 'Plus',
            'email' => 'admin@email.com',
            'role' => 'admin',
            'password' => bcrypt('secret')
        ]);
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(EventTableSeeder::class);

        Model::reguard();
    }
}
