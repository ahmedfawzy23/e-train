<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trainer::create([
            'name' => 'mohammed',
            'spec' => 'programming',
            'image' => '2.jpg'
        ]);

        Trainer::create([
            'name' => 'ali',
            'spec' => 'english',
            'image' => '3.jpg'
        ]);Trainer::create([
        'name' => 'mohammed',
        'spec' => 'programming',
        'image' => '3.jpg'
    ]);Trainer::create([
        'name' => 'mahmoud',
        'spec' => 'english',
        'image' => '4.jpg'
    ]);Trainer::create([
        'name' => 'aya',
        'spec' => 'medical',
        'image' => '5.jpg'
    ]);
    }
}
