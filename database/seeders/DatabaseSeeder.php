<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = 'Default';
        $user->email = 'admin@desafio.com';
        $user->password = Hash::make('123');

        $user->save();


        $statuses = [
            'Recebido',
            'Processado',
            'Rejeitado',
            'Processando'
        ];

        foreach ($statuses as $status) {
            $s = new Status();

            $s->name = $status;

            $s->save();
        }
    }
}
