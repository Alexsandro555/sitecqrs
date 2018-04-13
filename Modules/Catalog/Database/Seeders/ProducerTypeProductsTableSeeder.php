<?php

namespace Modules\Catalog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProducerTypeProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('producer_type_product')->insert([
          [
            'name_line' => 'Глубинные вибраторы',
            'sort' => 1,
            'type_product_id' => 1,
            'producer_id' => 1
          ],
        ]);
        // $this->call("OthersTableSeeder");
    }
}
