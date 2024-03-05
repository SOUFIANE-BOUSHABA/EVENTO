<?php
namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Permissions for events
        $createEvent = Permission::create(['name' => 'create-event']);
        $deleteEvent = Permission::create(['name' => 'delete-event']);
        $updateEvent = Permission::create(['name' => 'update-event']);
        $showEvent = Permission::create(['name' => 'show-event']);
        $reserveEvent = Permission::create(['name' => 'reserve-event']);

        // Permissions for users
        $showUser = Permission::create(['name' => 'show-user']);
        $deleteUser = Permission::create(['name' => 'delete-user']);
        $updateUser = Permission::create(['name' => 'update-user']);

        // Roles
        $admin = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        $organisateur = Role::create(['name' => 'organisateur']);

        // Assign permissions to roles
        $admin->permissions()->attach([$createEvent->id, $deleteEvent->id, $updateEvent->id, $showEvent->id, $reserveEvent->id, $showUser->id, $deleteUser->id, $updateUser->id]);
        $userRole->permissions()->attach([$showEvent->id, $reserveEvent->id, $showUser->id]);
        $organisateur->permissions()->attach([$createEvent->id, $deleteEvent->id, $updateEvent->id, $showEvent->id, $reserveEvent->id]);

        // Create admin user
        $adminUser = new User();
        $adminUser->firstname= 'Admin';
        $adminUser->lastname= 'Admin';
        $adminUser->email = 'admin@gmail.com';
        $adminUser->password = bcrypt('admin');
        $adminUser->save();
        $adminUser->roles()->attach($admin);

        // Create user
        $regularUser = new User();
        $regularUser->firstname= 'User';
        $regularUser->lastname= 'User';
        $regularUser->email = 'user@gmail.com';
        $regularUser->password = bcrypt('user');
        $regularUser->save();
        $regularUser->roles()->attach($userRole);

        // Create organisateur user
        $organisateurUser = new User();
        $organisateurUser->firstname= 'Organisateur';
        $organisateurUser->lastname= 'Organisateur';
        $organisateurUser->email = 'organisateur@gmail.com';
        $organisateurUser->password = bcrypt('organisateur');
        $organisateurUser->save();
        $organisateurUser->roles()->attach($organisateur);
    }
}
