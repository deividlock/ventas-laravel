<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->delete();
        DB::statement("ALTER TABLE product_images AUTO_INCREMENT = 1;");

        DB::table('product_images')->insert([
            'id_product' => 1,
            'name' => 'drill1.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('product_images')->insert([
            'id_product' => 2,
            'name' => 'hammer1.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('product_images')->insert([
            'id_product' => 3,
            'name' => 'hidro1.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('product_images')->insert([
            'id_product' => 4,
            'name' => 'screwdriver1.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
