<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operations = ['add', 'view', 'edit', 'delete'];
        $entities = ['role_permission', 'user', 'site_management', 'general_settings', 'maintenance_settings'];

        $permission_iterations = [];
        foreach ($entities as $entity_key => $entity) {
            foreach ($operations as $operation_key => $operation) {
                $permission_iterations[$entity_key][$operation_key]['name'] = $entity . '_' . $operation;
                $permission_iterations[$entity_key][$operation_key]['guard_name'] = 'web';
                $permission_iterations[$entity_key][$operation_key]['created_at'] = date('Y-m-d');
                $permission_iterations[$entity_key][$operation_key]['updated_at'] = date('Y-m-d');
            }
        }

        foreach ($permission_iterations as $permissions)
            foreach ($permissions as $permission)
                DB::table('permissions')->insert(array($permission));
    }
}
