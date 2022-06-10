<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = range(1,40);
        $data = [];
        $i = 0;
        foreach($arr as $key=> $value){
                if($key === 0){
                   unset($arr[$key]);
                $i+=5;
                        
                }else{
                unset($arr[$i]);
                $i+=5;
                }
            
        }
        
        foreach($arr as $val){
            $data[] = [
                'permission_id'=>$val,
                'role_id'=>1
            ];
        }
        DB::table('permission_role')->insert($data);
    }
}
