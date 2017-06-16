<?php

namespace Vesic\DistanceBetween;

class Location {
    
    public $data = [];
    
    public function __construct($input) {
        $this->data = $input;
    }
    
    public function getLatitude() {
        return $this->data['results'][0]['geometry']['location']['lat'];
    }
    
    public function getLongitude() {
        return $this->data['results'][0]['geometry']['location']['lng'];
    }
    
    public function getLongName() {
        return $this->data['results'][0]['address_components'][0]['long_name'];
    }
    
}