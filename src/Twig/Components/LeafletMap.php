<?php

// src/Twig/Components/Alert.php
namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use App\Service\LeafletMapService;
use Symfony\UX\Map\Map;

#[AsTwigComponent]
class LeafletMap
{
    public  function __construct(private LeafletMapService $leafletMapService ){

    }

    public function GetMapLeaflet() : Map { 
        return $this->leafletMapService->createMap();
    }
}