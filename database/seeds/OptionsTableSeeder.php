<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->truncate();
        // $faker = Faker::create();

        $arr = [
            'site_name'     => '云歌',
            'site_keywords' => '设计、前端、php',
            'site_info'     => '简洁是智慧的灵魂，繁冗是肤浅的躁饰',
            'site_copy'     => '&copy 2019 云歌'
        ];
        $data = [];
        foreach ($arr as $key => $value) {
            $data[]=[
                'key' => $key,
                'value' => $value
            ];
        }
        DB::table('options')->insert($data);
    }
}
