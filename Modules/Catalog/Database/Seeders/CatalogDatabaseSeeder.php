<?php

namespace Modules\Catalog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CatalogDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //$this->call(TnvedsTableSeeder::class);
        $this->call(TypeProductsTableSeeder::class);
        $this->call(ProducersTableSeeder::class);
        $this->call(ProducerTypeProductsTableSeeder::class);

        // $this->call("OthersTableSeeder");
    }
}
