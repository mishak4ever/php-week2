<?php

require_once 'db.php';

$orderdata = $_REQUEST;
$user_id = DB::addUser($orderdata);
$order_id = DB::addOrder($user_id, $orderdata);
$orders_cnt = DB::getUserOrders($user_id);
echo "Спасибо, ваш заказ будет доставлен по адресу: Улица {$orderdata['street']}"
 . ", дом {$orderdata['home']}, корпус {$orderdata['part']}"
 . ", этаж {$orderdata['floor']}, квартира {$orderdata['appt']}
Номер вашего заказа: #{$order_id}
Это ваш {$orders_cnt}-й заказ!";
