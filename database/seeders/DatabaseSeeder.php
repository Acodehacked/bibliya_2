<?php

namespace Database\Seeders;

use App\Enum\PermissionsEnum;
use App\Enum\RolesEnum;
use App\Models\Profile;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //        User::factory()->create([
        //            'name' => 'Test User',
        //            'email' => 'test@example.com',
        //        ]);

        $userRole = Role::create(['name' => RolesEnum::User->value]);
        $managerRole = Role::create(['name' => RolesEnum::Manager->value]);
        $adminRole = Role::create(['name' => RolesEnum::Admin->value]);
        $videoManagerRole = Role::create(['name' => RolesEnum::VideobookManager->value]);

        $editQuestionsPermission = Permission::create([
            'name' => PermissionsEnum::EditQuestions->value
        ]);
        $editVersesPermission = Permission::create([
            'name' => PermissionsEnum::EditVerses->value
        ]);
        $manageQuizPermission = Permission::create([
            'name' => PermissionsEnum::ManageQuiz->value
        ]);
        $manageFeaturesPermission = Permission::create([
            'name' => PermissionsEnum::ManageFeatures->value
        ]);
        $manageAdminsPermission = Permission::create([
            'name' => PermissionsEnum::ManageAdmins->value
        ]);
        $manageOwnVideosPermission = Permission::create([
            'name' => PermissionsEnum::ManageOwnVideos->value
        ]);
        $manageAllVideosPermission = Permission::create([
            'name' => PermissionsEnum::ManageAllVideos->value
        ]);

        $userRole->syncPermissions([]);
        $managerRole->syncPermissions([$editQuestionsPermission, $editVersesPermission]);
        $adminRole->syncPermissions([$editQuestionsPermission, $editVersesPermission, $manageAdminsPermission, $manageFeaturesPermission, $manageQuizPermission, $manageAllVideosPermission]);
        $videoManagerRole->syncPermissions([$manageOwnVideosPermission]);

        $user = User::create([
            'name' => 'Abin',
            'username' => 'admin',
            'user_cc' => '91',
            'phone' => '9048741910',
            'email' => 'manager@bibliya.in',
            'password' => Hash::make('Abinantony@123')
        ])->assignRole(RolesEnum::Admin);

        $profile = Profile::create([
            'user_id' => $user['id'],
            'address' => '123 Church St',
            'country' => 'India',
            'state' => 'Kerala',
            'diocese' => 'Changanacherry',
            'parish' => 'St. Mary’s',
            'phone' => '9876543210',
            'birth_date' => '2000-01-01',
            'gender' => 'male',
            'profile_picture' => 'user1.jpg',
            'bio' => 'Passionate about serving the community.',
        ]);
    }
}
