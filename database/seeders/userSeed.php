<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\models\User;

class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ABSX Suporte',
            'email' => 'absx.suporte@mailinator.com',
            'telefone'=>'71999409774',
            'password' => Hash::make('absx.123'),
            'perfil' => '2'
        ]);
        User::create([
            'name' => 'Felipe',
            'email' => 'felipe.absx@mailinator.com',
            'telefone'=>'71999409774',
            'password' => Hash::make('absx.123'),
        ]);
        User::create([
            'name' => 'Marcos',
            'email' => 'marcos.absx@mailinator.com',
            'telefone'=>'71999409774',
            'password' => Hash::make('absx.123'),
        ]);
        User::create([
            'name' => 'João',
            'email' => 'joao.absx@mailinator.com',
            'telefone'=>'71999409774',
            'password' => Hash::make('absx.123'),
        ]);
    }
}
