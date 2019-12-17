<?php

Artisan::command('stop:seed', function () {
    $json = json_decode(file_get_contents('https://raw.githubusercontent.com/cheeaun/busrouter-sg/master/data/bus-stops.json'), true);

    collect($json)->map(function ($stop, $index) use (&$data) {
        $data[] = [
            'name' => $stop['name'],
            'latitude' => $lat = explode(',', $stop['coords'])[0],
            'longitude' => $lat = explode(',', $stop['coords'])[1],
            'created_at' => now()
        ];
    });

    \DB::transaction(function () use ($data) {
        \DB::table('stops')->insert($data);
    });
});
