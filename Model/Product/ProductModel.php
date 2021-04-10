<?php
include __DIR__."/../../Db/Connection.php";
class ProductModel extends Model {

    static function getProducts(){
        return self::getProductsFromDb();
    }

    static function getProductsFromDb()
    {
        try {
            $dbh = Connection::getInstance()->getConnection();

            $sql = " CALL `sp_GetProducts`();";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $arr = array();
            $arrDb = $stmt->fetchAll();


            if($arrDb != '') {
                foreach ($arrDb as $row) {
                    array_push($arr, array(
                        "id" => $row['id'],
                        "productName" => $row['productName'],
                        "price" => $row['price'],
                        "discounted" => $row['discounted'],
                        "categoryName" => $row['categoryName'],
                        "imagePath" => $row['imagePath']
                    ));
                }
            }else{
                return false;
            }
            return $arr;

        } catch (PDOException $e) {
            print_r($e->getMessage());
            die("Error occurred:" . $e->getMessage());
        }
        return false;
    }



}