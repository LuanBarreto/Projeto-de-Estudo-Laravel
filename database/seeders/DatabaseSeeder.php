<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Ferramentas Eletricas',
                'brand' => 'Makita',
                'status' => true,
            ],
            [
                'name' => 'Ferramentas Manuais',
                'brand' => 'Tramontina',
                'status' => true,
            ],
            [
                'name' => 'Ferramentas de Jardim',
                'brand' => 'Stihl',
                'status' => false,
            ],
        ]);

        $this->call([DatabaseSeeder::class]);
    }
}
