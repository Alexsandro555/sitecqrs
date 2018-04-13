<?php

namespace Modules\Catalog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TypeProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('type_products')->insert([
          [
            'title' => 'Вибраторы',
            'tnved_id' => 1,
            'sort' => 1
          ],
        ]);
        // $this->call("OthersTableSeeder");
    }
}
