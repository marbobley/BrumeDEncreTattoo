<?php

namespace App\Service;

use Symfony\UX\Map\Bridge\Leaflet\LeafletOptions;
use Symfony\UX\Map\Bridge\Leaflet\Option\AttributionControlOptions;
use Symfony\UX\Map\Bridge\Leaflet\Option\ControlPosition;
use Symfony\UX\Map\Bridge\Leaflet\Option\TileLayer;
use Symfony\UX\Map\Bridge\Leaflet\Option\ZoomControlOptions;
use Symfony\UX\Map\InfoWindow;
use Symfony\UX\Map\Point;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Marker;

class LeafletMapService
{
    public function createMap(): Map
    {
        $map = (new Map())
            ->center(new Point(43.685456548373686, 3.585066726137538))
            // With an info window associated to the marker:
            ->addMarker(new Marker(
                position: new Point(43.685456548373686, 3.585066726137538),
                title: 'Aniane',
                infoWindow: new InfoWindow(
                    headerContent: '<b>Aniane</b>',
                    content: 'Situé proche du pont du diable, le studio t\' ouvres les portes !'
                ),
            ))
            ->zoom(10);


        $leafletOptions = (new LeafletOptions())
            ->tileLayer(new TileLayer(
                url: 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                options: [
                    'minZoom' => 5,
                    'maxZoom' => 10,
                ]
            ))
            ->attributionControl(false)
            ->attributionControlOptions(new AttributionControlOptions(ControlPosition::BOTTOM_LEFT))
            ->zoomControl(false)
            ->zoomControlOptions(new ZoomControlOptions(ControlPosition::TOP_LEFT));

        // Add the custom options to the map
        $map->options($leafletOptions);

        return $map;
    }
}
