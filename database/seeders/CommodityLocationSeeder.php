<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommodityLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'Ruang Dosen',
            'Ruang Rektor',
            'Ruang Wakil Rektor I',
            'Ruang Fakultas MIKOM',
            'Ruang Rapat UNUGHA',
            'Perpustakaan Bawah',
            'Perpustakaan Atas',
            'Ruang Laboratorium Komputer',
            'Ruang Laboratorium IoT',
            'Ruang Laboratorium Bahasa',
            'Ruang Laboratorium Jaringan',
            'Ruang Micro Teaching',
            'Ruang Satpam/Pos Satpam',
            'Ruang Masjid Aseggaf',
            'Ruang Aula UNUGHA',
            'Ruang Koperasi UNUGHA'
        ];

        for ($i = 1; $i < count($locations); $i++) {
            DB::table('commodity_locations')->insert([
                'name' => $locations[$i],
                'description' => 'Ruangan ' . $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for ($i = 1; $i < 6; $i++) {
            DB::table('commodity_locations')->insert([
                'name' => 'Kelas ' . $i,
                'description' => 'Ruangan Kelas ' . $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
