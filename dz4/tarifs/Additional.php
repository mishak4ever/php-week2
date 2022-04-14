<?php

require_once 'Tariff.php';
require_once 'services/iService.php';

/**
 * Добавление доп услуги для тарифа
 *
 */
trait Additional {

    public function appendService(Tariff $tariff, iService $service) {
        $tariff->addDop($service->getCost($tariff->km, $tariff->minute));
    }

}
