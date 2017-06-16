<?php

namespace Vesic\DistanceBetween;

use Vesic\DistanceBetween\Location;

class Geocoding extends AbstractGeocoding {
    
    public $url = 'https://maps.googleapis.com/maps/api/geocode/json?';
    
    public function lookup($location = null) {
        if ($location == null) {
            die('Location must be provided.');
        }
        $response = file_get_contents($this->url . http_build_query(['address' => urlencode($location)]));
        return new Location(json_decode($response, true));
    }
    
    public function getDifference($locations = []) {
        $count = count($locations);
        if ($count == 2) {
            $from = $locations[0];
            $to = $locations[1];
            $distance = $this->sphereDistance
                ($from->getLatitude(), $from->getLongitude()
                , $to->getLatitude(), $to->getLongitude());
            return json_encode([
                'from' => $from->getLongName(),
                'to' => $to->getLongName(),
                'distance' => $distance,
            ]);
        }
        
        // keep here compared results
        $result = [];
        if ($count > 2) {
            // take one to compare to
            $from = array_shift($locations);
            // compare to rest
            foreach ($locations as $location) {
                $distance = $this->sphereDistance
                    ($from->getLatitude(), $from->getLongitude()
                    , $location->getLatitude(), $location->getLongitude());
                // push to result
                $result[] = json_encode([
                    'from' => $from->getLongName(),
                    'to' => $location->getLongName(),
                    'distance' => $distance,
                ]);
            }
        }
        return $result;
    }
    
}