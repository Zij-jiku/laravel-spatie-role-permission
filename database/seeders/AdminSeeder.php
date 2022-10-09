<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::where('email', 'admin@gmail.com')->first();
        if (is_null($user)) {
            $user = new Admin();
            $user->name = "Admin";
            $user->email = "admin@gmail.com";
            $user->username = "admin";
            $user->email_verified_at = now();
            $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
            $user->status = 1;
            $user->remember_token = Str::random(10);
            $user->save();
        }
    }
}
