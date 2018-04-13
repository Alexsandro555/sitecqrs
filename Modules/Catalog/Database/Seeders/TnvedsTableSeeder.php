<?php

namespace Modules\Catalog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TnvedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('tnveds')->insert([
          [
            'id' => 1,
            'title' => 'Прочие инструменты',
            'service' => 1,
            'active' => 1
          ],
        ]);
        // $this->call("OthersTableSeeder");
    }
}
