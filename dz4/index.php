<?php

require_once 'tarifs/StudTariff.php';
require_once 'tarifs/BaseTariff.php';
require_once 'tarifs/HourTariff.php';
require_once 'services/GpsService.php';
require_once 'services/DriverService.php';

$car1 = new BaseTariff(15, 145);

$car1->addDop(new GpsService());
$car1->addDop(new DriverService());
$car1->calcSumm();
echo "Стоимость поездки: " . $car1->getCost() . " руб.";
