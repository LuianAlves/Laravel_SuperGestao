<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::Create(['motivo_contato' => 'Dúvida']);
        MotivoContato::Create(['motivo_contato' => 'Elogio']);
        MotivoContato::Create(['motivo_contato' => 'Reclamação']);
    }
}
