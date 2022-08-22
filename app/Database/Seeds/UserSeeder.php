<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        $user = new User();

        $find = $user->first();

        if ($find) return;

        for ($i = 0; $i < 10; $i++) {
            $user->save([
                'name' => 'Merchant ' . ($i + 1),
                'email' => 'merchant' . ($i + 1) . '@gmail.com',
                'password' => password_hash('merchant' . ($i + 1), PASSWORD_BCRYPT),
                'role' => 'merchant',
            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            $user->save([
                'name' => 'Customer ' . ($i + 1),
                'email' => 'customer' . ($i + 1) . '@gmail.com',
                'password' => password_hash('customer' . ($i + 1), PASSWORD_BCRYPT),
                'role' => 'customer',
            ]);
        }
    }
}
