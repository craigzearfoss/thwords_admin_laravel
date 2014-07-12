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
            'username'   => 'czearfoss',
            'email'      => 'craigzearfoss@yahoo.com.com',
            'password'   => Hash::make('rocket88'),
            'first_name' => 'Craig',
            'last_name'  => 'Zearfoss',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}