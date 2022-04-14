<?php

require_once 'iTariff.php';
require_once 'services/iService.php';
require_once 'Additional.php';

/**
 * Базовый класс тарифа
 *
 */
abstract class Tariff implements iTariff {

    protected $km;
    protected $minute;
    protected $cost_per_km;
    protected $cost_per_minute;
    protected $cost = 0;

    use Additional;

    public function __construct($km, $minute) {
        $this->km = $km;
        $this->minute = $minute;
    }

    public function getCost() {
        return $this->cost;
    }

    public function addDop(iService $service) {
        $this->cost += $this->appendService($this, $service);
    }

    public function calcSumm() {
        $this->cost += $this->km * $this->cost_per_km + $this->minute * $this->cost_per_minute;
    }

}
