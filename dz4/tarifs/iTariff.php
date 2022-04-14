<?php

require_once 'services/iService.php';

interface iTariff {

    public function calcSumm();

    public function addDop(iService $service);

    public function getCost();
}
