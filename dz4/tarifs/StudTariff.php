<?php

require_once 'Tariff.php';
require_once 'Additional.php';

/**
 * Тариф студенческий
 *
 */
class StudTariff extends Tariff {

    use Additional;

    protected $cost_per_km = 4;
    protected $cost_per_minute = 1;
}
