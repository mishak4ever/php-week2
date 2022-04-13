<?php

require_once ('dbconnection.php');

class DB {

    public static function addUser($userdata) {

        try {
            $db = DBConnection::getInstance();

            $qry = 'SELECT * FROM users WHERE email = :email';
            $stm = $db->prepare($qry);
            $stm->bindParam(':email', $userdata['email'], PDO::PARAM_STR);
            $stm->execute();

            if ($user = $stm->fetch(PDO::FETCH_ASSOC))
                return $user['id'];

            $qry = 'INSERT INTO users '
                    . '(name,phone,email)'
                    . ' VALUES (:name,:phone,:email) ';

            $result = $db->prepare($qry);
            $result->bindParam(':name', $userdata['name'], PDO::PARAM_STR);
            $result->bindParam(':phone', $userdata['phone'], PDO::PARAM_STR);
            $result->bindParam(':email', $userdata['email'], PDO::PARAM_STR);
            $result->execute();
            return $db->lastInsertId();
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public static function addOrder($user_id, $orderdata) {
        try {
            $db = DBConnection::getInstance();
            $qry = 'INSERT INTO orders '
                    . '(user_id,street,house,corpus,apart,floor,comment)'
                    . ' VALUES (:user_id,:street,:house,:corpus,:apart,:floor,:comment) ';

            $result = $db->prepare($qry);
            $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $result->bindParam(':street', $orderdata['street'], PDO::PARAM_STR);
            $result->bindParam(':house', $orderdata['home'], PDO::PARAM_STR);
            $result->bindParam(':corpus', $orderdata['part'], PDO::PARAM_INT);
            $result->bindParam(':apart', $orderdata['appt'], PDO::PARAM_STR);
            $result->bindParam(':floor', $orderdata['floor'], PDO::PARAM_STR);
            $result->bindParam(':comment', $orderdata['comment'], PDO::PARAM_STR);
            $result->execute();
            return $db->lastInsertId();
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public static function getUserOrders($user_id) {
        try {
            $db = DBConnection::getInstance();
            $qry = 'SELECT * FROM orders WHERE user_id = :user_id';
            $stm = $db->prepare($qry);
            $stm->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stm->execute();

            if ($orders = $stm->fetchAll(PDO::FETCH_ASSOC))
                return count($orders);
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

}
