<?php 

function getDataFromJsonFile($jsonFileName){
    $filename = 'assets'.DIRECTORY_SEPARATOR.'db'.DIRECTORY_SEPARATOR.$jsonFileName;
    $result = array('sonuc'=>-1);
    
    if(file_exists($filename)){
        $result = file_get_contents($filename);
        return json_decode($result,false);
    }
    return $result;
}

function setJsonFile($jsonFileName,$data){
    $filename = 'assets'.DIRECTORY_SEPARATOR.'db'.DIRECTORY_SEPARATOR.$jsonFileName;
    if(file_exists($filename)){
        file_put_contents($filename, json_encode($data));
        return true;
    }else{
        return false;
    }
}



?>