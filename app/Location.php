<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Locations;

class Location extends Model
{
    public function publications()
    {
        return $this->belongsToMany('App\Publication')->orderBy('publication_year');
    }

    public function toGeoJson()
    {
        $out = ["type" => "Feature",
                "properties" => [
                    "id" => $this->id,
                    "name" => $this->name
                ],
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [$this->long, $this->lat]
                ]
            ];

        return json_encode($out);
    }

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param  array  $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function newCollection(array $models = [])
    {
        return new Locations($models);
    }
}
