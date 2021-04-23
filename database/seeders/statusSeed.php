<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\ModelStatus_ticket;

class statusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelStatus_ticket::create([
            'id'   => '1',
            'nome' => 'Em aberto',
            'cor'  => 'red'
        ]);
        ModelStatus_ticket::create([
            'id'   => '2',
            'nome' => 'Em andamento',
            'cor'  => 'yellow'
        ]);
        ModelStatus_ticket::create([
            'id'   => '3',
            'nome' => 'Resolvido',  
            'cor'  => 'green'
        ]);
    }
}
