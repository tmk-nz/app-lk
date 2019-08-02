<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;

class Locations extends Collection
{
    public function toGeoJson()
    {
        $out = [
            "type" => "FeatureCollection",
            "features" => $this->map(function ($item, $key) {
                return json_decode($item->toGeoJson());
            })
        ];

        return json_encode($out);
    }
}
