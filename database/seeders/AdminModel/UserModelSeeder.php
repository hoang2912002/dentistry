<?php

namespace Database\Seeders\AdminModel;

use App\Models\AdminModel\GroupModel;
use App\Models\AdminModel\GroupUserModel;
use App\Models\AdminModel\LoginModel;
use App\Models\AdminModel\PermissionModel;
use App\Models\AdminModel\RoleModel;
use App\Models\AdminModel\UserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UserModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $login = LoginModel::factory()->count(1)->create();
        
        $user = UserModel::factory()->state(function($user) use($login){
            return [
                'uuid' => (string)Str::uuid(),
                'name' => 'admin',
                'gender' => 1,
                'birthdate' => '2002-01-29',
                'login_id' => $login[0]->id,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ];
        })->create();
        
        $number_of_permission = array_key_last(permission()) + 1;
        //dd($number_of_permission,permission());
        $permission = PermissionModel::factory()->count($number_of_permission)->create();
        
        $group = GroupModel::factory()->count(1)->create();
        $group_user = GroupUserModel::factory()->state(function($group_user) use($group,$user){
            return [
                'user_uuid' => $user['uuid'],
                'group_id' => $group[0]['id']
            ];
        })->create();
        foreach($permission as $permiss){
            $role = RoleModel::factory()->state(function() use($group,$permiss){
                return [
                    'group_id' => $group[0]['id'],
                    'permission_id' => $permiss['id']
                ];
            })->create();
        }
    }
}
