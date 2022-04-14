<?php

require_once 'iTariff.php';

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

    public function __construct($km, $minute) {
        $this->km = $km;
        $this->minute = $minute;
    }

    public function getCost() {
        return $this->cost;
    }

    public function addDop($cost) {
        $this->cost += $cost;
    }

    public function calcSumm() {
        $this->cost += $this->km * $this->cost_per_km + $this->minute * $this->cost_per_minute;
    }

}
