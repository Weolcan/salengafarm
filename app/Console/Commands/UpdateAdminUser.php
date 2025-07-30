<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateAdminUser extends Command
{
    protected $signature = 'user:update-admin';
    protected $description = 'Update admin user credentials safely';

    public function handle()
    {
        $this->info('Attempting to update admin user credentials...');
        
        // Try to find existing admin user
        $admin = User::where('email', 'admin')->first();
        
        if ($admin) {
            // Update existing admin
            $admin->email = 'admin@salengafarm.com';
            $admin->password = Hash::make('admin@salengafarm.com');
            $admin->save();
            
            $this->info('Successfully updated existing admin user credentials.');
        } else {
            // Try to find by email if the admin user might have been updated already
            $admin = User::where('email', 'admin@salengafarm.com')->first();
            
            if ($admin) {
                // Just update password in case email was already changed
                $admin->password = Hash::make('admin@salengafarm.com');
                $admin->save();
                
                $this->info('Admin user with updated email found. Password has been updated.');
            } else {
                // Admin user not found, check if any admin role exists
                $adminByRole = User::where('role', 'admin')->first();
                
                if ($adminByRole) {
                    // Update the first admin role user found
                    $adminByRole->email = 'admin@salengafarm.com';
                    $adminByRole->password = Hash::make('admin@salengafarm.com');
                    $adminByRole->save();
                    
                    $this->info('Updated credentials for admin user with ID: ' . $adminByRole->id);
                } else {
                    // No admin found, create new one without affecting other data
                    User::create([
                        'name' => 'Admin',
                        'email' => 'admin@salengafarm.com',
                        'password' => Hash::make('admin@salengafarm.com'),
                        'role' => 'admin',
                    ]);
                    
                    $this->info('No admin user found. Created a new admin user.');
                }
            }
        }
        
        $this->info('Admin credentials updated to:');
        $this->info('Username: admin@salengafarm.com');
        $this->info('Password: admin@salengafarm.com');
    }
}
