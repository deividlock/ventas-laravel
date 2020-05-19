<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        DB::statement("ALTER TABLE products AUTO_INCREMENT = 1;");

        DB::table('products')->insert([
            'name' => 'Drill Blanck+Decker',
            'sku' => 7,
            'price' => 44.00,
            'description' => 'BLACK+DECKER 20V MAX Cordless Drill / Driver, 3/8-Inch (LDX120C)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Hammer Stanley',
            'sku' => 7,
            'price' => 27.43,
            'description' => '51-163 16-Ounce FatMax Xtreme AntiVibe Rip Claw Nailing Hammer',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Hidrojet Karcher',
            'sku' => 7,
            'price' => 186.69,
            'description' => 'K5 120V Electric Power Pressure Washer X-Series',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Screwdriver stanley',
            'sku' => 7,
            'price' => 26.82,
            'description' => '60-060 Standard Fluted Screwdriver Set, 6-Piece',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
