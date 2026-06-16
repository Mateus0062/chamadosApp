<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResponsavelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('responsaveis')->insert([
            ['nome' => 'João Suporte'],
            ['nome' => 'Maria Suporte'],
            ['nome' => 'Carlos Suporte']
        ]);
    }
}
