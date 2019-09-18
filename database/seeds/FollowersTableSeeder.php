<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('followers')->truncate();
        
        $all = User::all();
        // 获取排除id为1的所有用户
        $users = $all->slice(1);
        // 将获取的排除id为1的所有用户的id转为新数组的值
        $users_id = $users->pluck('id')->toArray();

        // 获取id为1的用户
        $my = $all->first();
        // 获取id为1的用户的id
        // $my_id = $my->id;

        // id为1的用户去关注其他所有用户
        $my->follow($users_id);

        // 其它所有用户去关注id为1，2的用户
        foreach ($users as $user) {
            $user->follow([1,2]);
        }
    }
}
