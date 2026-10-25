<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode_buku' => fake()->unique()->bothify('BK-####'),
            'judul' => fake()->sentence(3),
            'kategori' => fake()->randomElement([
                'Novel',
                'Pendidikan',
                'Sejarah',
                'Teknologi',
            ]),
            'penulis' => fake()->name(),
            'tahun_terbit' => fake()->numberBetween(2000, 2026),
            'jumlah' => fake()->numberBetween(1, 50),
            'keterangan' => fake()->optional()->sentence(),
        ];
    }
}
