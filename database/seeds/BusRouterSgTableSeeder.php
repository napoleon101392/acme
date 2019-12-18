<?php

use Illuminate\Database\Seeder;

class BusRouterSgTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('https://raw.githubusercontent.com/cheeaun/busrouter-sg/master/data/bus-stops.json');
        $arr = json_decode($json, true);

        foreach ($arr as $busNumber => $info) {
            $ex = explode(',', $info['coords']);

            app('model.stop')->create([
                'name' => $info['name'],
                'latitude' => $ex[0],
                'longitude' => $ex[1],
            ]);
        }
    }
}
