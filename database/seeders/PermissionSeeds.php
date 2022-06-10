<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = config('Admin.Permission.KeyCode');
        $arr = [];
        foreach ($data as $key => $value) {
            # code...
            $arr[] = [
                'name'=>$key,
                'key_code'=>$key
            ];
            foreach($data[$key] as $val){
                $arr[] = [
                    'name'=>$val,
                    'key_code'=>$val,
                ];
            }
        }
        DB::table('permissions')->insert($arr);
    }
}
