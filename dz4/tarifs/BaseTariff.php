<?php

require_once 'Tariff.php';
require_once 'Additional.php';

/**
 * Тариф Базовый
 *
 */
class BaseTariff extends Tariff {

    protected $cost_per_km = 10;
    protected $cost_per_minute = 3;

}
