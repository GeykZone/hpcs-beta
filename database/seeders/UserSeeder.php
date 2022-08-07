<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // generate city admin
        User::create(['name' => 'City Admin',
        'resident_id' => 1,
        'barangay_id' => null,
        'email' => 'cityadmin@gmail.com', 
        'password' => '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6',
        'is_activated' => 1, 
        'role_id' => 1]);

         // generate brgy admin
         User::create(['name' => 'John Doe',
         'resident_id' => 2,
         'barangay_id' => 1,
         'email' => 'barangayadmin@gmail.com', 
         'password' => '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6',
         'is_activated' => 1, 
         'role_id' => 2]);

         // generate brgy admin
         User::create(['name' => 'Jane Doe',
         'resident_id' => 3,
         'barangay_id' => 2,
         'email' => 'barangayadmin2@gmail.com', 
         'password' => '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6',
         'is_activated' => 1, 
         'role_id' => 2]);

    }
}
