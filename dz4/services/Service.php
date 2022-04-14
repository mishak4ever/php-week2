<?php

require_once 'iService.php';

/**
 * Базовый Класс дополнительных сервисов
 *
 * @author КолясниковМА
 */
abstract class Service implements iService {

    protected $cost_per_km;
    protected $cost_per_minute;
    protected $cost_once;

    public function getCost($km, $minute) {
        return $this->cost_once + $minute * $this->cost_per_minute + $km * $this->cost_per_km;
    }

}
