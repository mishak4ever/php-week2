<?php

require_once 'Service.php';

/**
 * Класс дополнительной услуги GPS
 *
 */
class GpsService extends Service {

    protected $cost_per_km = 0;
    protected $cost_per_minute = (15 / 60);
    protected $cost_once = 0;

    public function getCost($km, $minute) {
        $minute = ($minute % 60 > 0) ? (floor($minute / 60) * 60 + 60) : $minute;
        return parent::getCost($km, $minute);
    }

}
