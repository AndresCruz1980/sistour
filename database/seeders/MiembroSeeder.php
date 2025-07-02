<?php

namespace Database\Seeders;

use App\Models\Miembro;
use App\Models\User;
use Illuminate\Database\Seeder;

class MiembroSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if ($user) {
            Miembro::create([
                'user_id' => $user->id,
                'licencia' => 'ABC123',
                'numero' => '001',
            ]);
        }
    }
}
