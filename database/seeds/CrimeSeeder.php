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
        Crime::create(['descricao' => 'Homicídio']);
        Crime::create(['descricao' => 'Tentativa de homicídio']);
        Crime::create(['descricao' => 'Estupro']);
        Crime::create(['descricao' => 'Assalto']);
        Crime::create(['descricao' => 'Tentativa de assaulto']);
    }
}
