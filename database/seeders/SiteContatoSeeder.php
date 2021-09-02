<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SiteContato::create([
        //     'nome' => 'Sistema SG',
        //     'telefone' => '(11) 957234497',
        //     'email' => 'sistemasg@hotmail.com',
        //     'motivo_contato' => 1,
        //     'mensagem' => 'Olá, seja bem vindo ao nosso sistema!',
        // ]);

        \App\Models\SiteContato::factory(100)->create();
    }
}
