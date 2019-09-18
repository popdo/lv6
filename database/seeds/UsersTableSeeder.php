<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        factory(User::class,20)->create();

        // 这种方法效率高
        // $users = factory(User::class)->times(20)->make();
        // User::insert($users->toArray());

        User::find(1)->update([
            'name' => 'jim',
            'email' => 'bme@qq.com',
            'password' => bcrypt('111111'),
            'is_admin' => true
        ]);
        User::find(2)->update([
            'name' => 'xixi',
            'email' => 'dian8@foxmail.com',
            'password' => bcrypt('111111')
        ]);
    }
}
