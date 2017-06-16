# distance-between

# Installation

```
composer require vesic/distance-between
```

# Usage

```
require __DIR__ . '/vendor/autoload.php';

use Vesic\DistanceBetween\Distance;
use Vesic\DistanceBetween\Geocoding;

$distance = new Distance(new Geocoding);

$distance->addPlace('place|address');
$distance->addPlace('place|address');

var_dump($distance->getDifference()); // output in KM
```