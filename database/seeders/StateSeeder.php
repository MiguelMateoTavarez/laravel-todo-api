<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            'pending',
            'doing',
            'done'
        ];

        foreach ($states as $state) {
            State::create(['name' => $state]);
        }
    }
}
