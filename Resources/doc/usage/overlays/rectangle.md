# Rectangle

A Rectangle is similar to a Polygon in that you can define custom colors, weights, and opacities for the edge of the rectangle (the "stroke") and custom colors and opacities for the area within the enclosed region (the "fill").
Unlike a Polygon, you do not define paths for a Rectangle; instead, a rectangle has one additional property which defines its shape : the bound.

## Build your rectangle

### By configuration file

By default, the bundle doesn't need any configuration. Most of the service have a default configuration which allows you to use the given objects like they are.
The ``ivory_google_map.rectangle`` service is. The configuration describes below is this default configuration.

```
# app/config/config.yml

ivory_goole_map:
    rectangle:
        # Prefix used for the generation of the rectangle javascript variable
        prefix_javascript_variable: "rectangle_"

        # Bound of the rectangle
        bound:
            south_west:
                latitude: -1
                longitude: -1
                no_wrap: true
            north_east:
                latitude: 1
                longitude: 1
                no_wrap: true

        # Custom rectangle options
        # By default, there is no options
        options:
            clickable: false
            strokeColor: "#ffffff"
```

``` php
<?php

// Requests the ivory google map rectangle service
$rectangle = $this->get('ivory_google_map.rectangle');
```

### By coding

``` php
<?php

// Requests the ivory google map rectangle service
$rectangle = $this->get('ivory_google_map.rectangle');

// Configure your rectangle options
$rectangle->setPrefixJavascriptVariable('rectangle_');
$rectangle->setBound(-1, -1, 1, 1, true, true);

$rectangle->setOption('clickable', false);
$rectangle->setOption('strokeColor', '#ffffff');
$rectangle->setOptions(array(
    'clickable' => false,
    'strokeColor' => '#ffffff'
));
```

## Add your rectangle to the map

``` php
<?php

// Requests the ivory google map rectangle service
$rectangle = $this->get('ivory_google_map.rectangle');

// Add your rectangle to the map
$map->addRectangle($rectangle);
```
