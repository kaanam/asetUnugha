<?php

namespace Database\Seeders;

use App\Commodity;
use App\CommodityLocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon();

        $commodity_locations = CommodityLocation::all();

        $commodities = [
            'Meja',
            'Air Conditioner(AC)',
            'Air Conditioner(AC)',
            'Air Conditioner(AC)',
            'Kursi Lipat',
            'Lemari',
            'Papan Tulis Putih',
            'Penghapus Papan Tulis Putih',
            'Meja Dosen',
            'Kursi Dosen',
            'Rak Peralatan Fakultas',
            'Kipas Dinding',
            'Air Conditioner(AC)',
            'Proyektor',
            'Air Conditioner(AC)',
            'Kipas Dinding',
        ];

        $brands = [
            'IKEA',
            'Livien',
            'iFurnholic',
            'Red Sun',
            'JYSXK',
            'Olympic',
            'Informa',
            "Dove's",
            'Funika',
            'Atria',
            'LG',
        ];

        $materials = [
            'Kayu Solid',
            'Kayu Lapis (Plywood/Multipleks)',
            'Blockboard',
            'MDF (Medium Density Fibreboard)',
            'Melaminto',
            'Partikel',
            'Rotan',
        ];

        for ($i = 1; $i <= count($commodities); $i++) {
            DB::table('commodities')->insert([
                'school_operational_assistance_id' => mt_rand(1, 2),
                'commodity_location_id' => mt_rand(1, count($commodity_locations)),
                'item_code' => 'BRG-' . mt_rand(1000, 9000) . mt_rand(100, 900),
                'name' => $commodities[array_rand($commodities)],
                'brand' => $brands[array_rand($brands)],
                'material' => $materials[array_rand($materials)],
                'year_of_purchase' => mt_rand(2010, date('Y')),
                'condition' => mt_rand(1, 3),
                'quantity' => mt_rand(50, 200),
                'price' => mt_rand(5000, 500000),
                'price_per_item' => mt_rand(2500, 150000),
                'note' => 'Keterangan barang',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
