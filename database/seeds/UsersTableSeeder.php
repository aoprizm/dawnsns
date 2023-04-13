<?php

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
        DB::table('users')->insert([
            [
                'id' => '2',
                'username' => 'bbb',
                'mail' => 'bbb@b.b',
                'password' => Hash::make('123456'), //パスワードをハッシュ化、もとの文字列から変換する
                'created_at' => '2023-03-20 7:23:19',
                'updated_at' => '2023-03-20 7:23:19',
            ],
            [
                'id' => '3',
                'username' => 'ccc',
                'mail' => 'ccc@c.c',
                'password' => Hash::make('123456'),
                'created_at' => '2023-03-20 7:23:19',
                'updated_at' => '2023-03-20 7:23:19',
            ],
            [
                'id' => '4',
                'username' => 'ddd',
                'mail' => 'ddd@d.d',
                'password' => Hash::make('123456'),
                'created_at' => '2023-03-20 7:23:19',
                'updated_at' => '2023-03-20 7:23:19',
            ],
            [
                'id' => '5',
                'username' => 'eee',
                'mail' => 'eee@e.e',
                'password' => Hash::make('123456'),
                'created_at' => '2023-03-20 7:23:19',
                'updated_at' => '2023-03-20 7:23:19',
            ],
        ]);
}
}
