<?php

require_once 'Tariff.php';
require_once 'Additional.php';

/**
 * Тариф Почасовой
 *
 */
class HourTariff extends Tariff {

    use Additional;

    protected $cost_per_km = 0;
    protected $cost_per_minute = 200 / 60;

    public function calcSumm() {
        $this->minute = ($this->minute % 60 > 0) ? (floor($this->minute / 60) * 60 + 60) : $this->minute;
        parent::calcSumm();
    }

}
