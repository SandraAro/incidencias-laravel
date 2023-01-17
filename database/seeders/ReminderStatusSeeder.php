<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReminderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reminder_statuses')->insert([
            [
                'name' => 'Pendiente'
            ],
            [
                'name' => 'En curso'
            ],
            [
                'name' => 'Completado'
            ],
            [
                'name' => 'Atrasado'
            ],
            [
                'name' => 'Por definir'
            ]
        ]);
    }
}
