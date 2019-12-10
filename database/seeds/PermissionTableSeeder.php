<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
        'patient-list',
        'patient-create',
        'patient-edit',
        'patient-delete',
        'rdv-list',
           'rdv-create',
           'rdv-edit',
           'rdv-delete',
           'analyse-list',
           'analyse-create',
           'analyse-edit',
           'analyse-delete',
           'ordonnance-list',
           'ordonnance-create',
           'ordonnance-edit',
           'ordonnance-delete',
           'role-create',
           'role-edit',
           'role-delete',
           'role-list',
           'consultation-list',
           'consultation-edit',
           'consultation-create',
           'consultation-delete',
           'user-edit',
           'user-delete',
           'user-create',
           'user-list',
           'bonanalyse-edit',
           'bonanalyse-delete',
           'bonanalyse-create',
           'bonanalyse-list'
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}