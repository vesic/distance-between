<?php

namespace Vesic\DistanceBetween;

use Vesic\DistanceBetween\Geocoding;

class Distance {
    public $locations = [];
    public $geo;
    
    public function __construct(Geocoding $geo) {
        $this->geo = $geo;
    }
    
    public function addPlace($location) {
        $loc = $this->geo->lookup($location);
        // var_dump($loc); die('->>');
        $this->locations[] = $loc;
    }
    
    public function getDifference() {
        return $this->geo->getDifference($this->locations);
    }
    
    public function getLocations() {
        return $this->locations;
    }
    
    public function inspect() {
        var_dump($this->locations);
    }
}