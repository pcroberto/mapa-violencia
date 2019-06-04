<?php

use Illuminate\Database\Seeder;
use App\Model\Crime;

class CrimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crime::create(['descricao' => 'Assalto']);
        Crime::create(['descricao' => 'Tentativa de assaulto']);
        Crime::create(['descricao' => 'Furto']);
        Crime::create(['descricao' => 'Tentativa de furto']);
        Crime::create(['descricao' => 'Homicídio']);
        Crime::create(['descricao' => 'Tentativa de homicídio']);
        Crime::create(['descricao' => 'Estupro']);
        Crime::create(['descricao' => 'Tentativa de Estupro']);
        Crime::create(['descricao' => 'Agressão física']);
    }
}
