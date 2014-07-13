<?php
/**
 * Created by PhpStorm.
 * User: craig
 * Date: 7/10/14
 * Time: 8:37 PM
 */

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
            'email'      => 'craigzearfoss@yahoo.com',
            'password'   => Hash::make('rocket88'),
            'first_name' => 'Craig',
            'last_name'  => 'Zearfoss',
            'activate'  => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}