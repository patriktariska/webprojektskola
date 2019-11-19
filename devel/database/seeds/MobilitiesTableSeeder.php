<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Mobility;

class MobilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mobility::create([
            'type' => 'Erasmus+',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer congue vel justo nec faucibus. Mauris auctor sollicitudin nibh vitae imperdiet. Praesent nec ultrices libero. Donec purus augue, lobortis eget bibendum sit amet, placerat sit amet tortor. Sed a dui vitae lacus luctus accumsan. Morbi in vestibulum sapien, nec sagittis lorem. Etiam fermentum blandit dictum. Donec tristique quam sed massa sollicitudin imperdiet. Maecenas condimentum gravida justo non rutrum. In sit amet sem blandit, mattis ipsum quis, pulvinar felis. Sed auctor ligula vel dui convallis, vel suscipit ipsum iaculis. Ut turpis leo, rhoncus vitae leo at, iaculis auctor sapien. Praesent faucibus posuere nisl, nec consectetur mauris. Curabitur vitae purus metus. Ut tristique odio sit amet lobortis feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;'
        ]);
        Mobility::create([
            'type' => 'CEEPUS',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer congue vel justo nec faucibus. Mauris auctor sollicitudin nibh vitae imperdiet. Praesent nec ultrices libero. Donec purus augue, lobortis eget bibendum sit amet, placerat sit amet tortor. Sed a dui vitae lacus luctus accumsan. Morbi in vestibulum sapien, nec sagittis lorem. Etiam fermentum blandit dictum. Donec tristique quam sed massa sollicitudin imperdiet. Maecenas condimentum gravida justo non rutrum. In sit amet sem blandit, mattis ipsum quis, pulvinar felis. Sed auctor ligula vel dui convallis, vel suscipit ipsum iaculis. Ut turpis leo, rhoncus vitae leo at, iaculis auctor sapien. Praesent faucibus posuere nisl, nec consectetur mauris. Curabitur vitae purus metus. Ut tristique odio sit amet lobortis feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;'
        ]);
    }
}
