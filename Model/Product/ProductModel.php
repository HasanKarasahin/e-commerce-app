<?php
include __DIR__."/../../Db/Connection.php";
class ProductModel extends Model {


    static function getProducts(){
        self::getProductsFromDb();
        return self::getDataFromDb('products');
    }


    static function getProductsFromDb()
    {
        try {
            $dbh = Connection::getInstance()->getConnection();

            $sql = "CALL `sp_GetTodos`();";
            $arr = array();

//            foreach ($dbh->query($sql) as $row) {
//
//                array_push($arr, array(
//                    "id" => $row['id'],
//                    "todo" => $row['todo'],
//                    "createdDate" => $row['createdDate'],
//                    "done" => $row['done'],
//                    "endDate" => $row['endDate']
//                ));
//
//            }
            return $arr;

        } catch (PDOException $e) {
            print_r($e->getMessage());
            die("Error occurred:" . $e->getMessage());
        }
        return null;
    }



}