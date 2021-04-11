<?php
include __DIR__."/../../Db/Connection.php";
class ProductModel extends Model {

    static function getProducts($category=''){
        return self::getProductsFromDb($category);
    }

    static function getProduct($nameUrl=''){
        return self::getProductFromDb($nameUrl);
    }

    static function getProductsFromDb($category)
    {
        try {
            $dbh = Connection::getInstance()->getConnection();

            $sql = " CALL `sp_GetProducts`(:prmCategory);";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':prmCategory', $category, PDO::PARAM_STR, 32);
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
                        "imagePath" => $row['imagePath'],
                        "nameUrl" => $row['nameUrl'],
                        "description" => $row['description']
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

    static function getProductFromDb($nameUrl){
        try {
            $dbh = Connection::getInstance()->getConnection();

            $sql = " CALL `sp_GetProduct`(:prmNameUrl);";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':prmNameUrl', $nameUrl, PDO::PARAM_STR, 32);
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
                        "imagePath" => $row['imagePath'],
                        "nameUrl" => $row['nameUrl'],
                        "description" => $row['description']
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