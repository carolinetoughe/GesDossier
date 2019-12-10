<?php
  
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Etoughe', 
            'prenom' => 'christelle',
            'adresse' => 'fann',
            'numerotelephone' => '45',
            'image' =>'utiilisateurs/Fj8Iuqq4fQ5P0p4aghrdeyM3HOACG7fQ3RoOCdvT.jpeg',
        	'email' => 'etoughe@gmail.com',
            'password' => bcrypt('etoughemdp')
        ]);
  
        $role = Role::create(['name' => 'Secretaire']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);
    }
}