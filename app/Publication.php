<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $with = ['thesisType', 'publicationType', 'institution', 'habitatTypes', 'dataTypes', 'locations', 'people', 'species'];


    public function publicationType()
    {
        return $this->belongsTo('App\PublicationType');
    }

    public function thesisType()
    {
        return $this->belongsTo('App\ThesisType');
    }

    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function habitatTypes()
    {
        return $this->belongsToMany('App\HabitatType');
    }

    public function dataTypes()
    {
        return $this->belongsToMany('App\DataType');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Location');
    }

    public function people()
    {
        return $this->belongsToMany('App\Person')->withPivot('person_order', 'person_supervisor');
    }

    public function species()
    {
        return $this->belongsToMany('App\Species');
    }
}
