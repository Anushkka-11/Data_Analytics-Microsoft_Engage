<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
function connection(){
    $mysqli = new mysqli("localhost","root","code@123","excel_reader");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    return $mysqli;
}
function saveData($arrData,$arrColumn,$table){
    $connection = connection();
    $connection->query("INSERT INTO $table ($arrColumn) VALUES ($arrData)");
    return $connection->insert_id;
}
function exportExcel(){
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load("COLPROJ.xlsx");
    $arrData=$spreadsheet->getSheet(1)->toArray();
    $i=0;
    $columns = "company,model,ex_showroom_price,variant,cylinders,fuel_Type,height,length,width,body_type,city_mileage,ground_clearance,power_windows,power,torqe,seating_capacity
    ,type,wheelbase,Audiosystem,basic_warranty,extended_warranty,price";
    foreach($arrData as $data){
        if($i!==0){
            $price = (int)filter_var($data[4], FILTER_SANITIZE_NUMBER_INT);
            $value ="'".$data[1]."',"."'".$data[2]."',"."'".$data[4]."',"."'".$data[3]."',"."'".$data[6]."',"."'".$data[14]."',"."'".$data[15]."',"."'".$data[16]."',"."'".$data[17]."',"."'".$data[18]."',"."'".$data[20]."',"."'".$data[26]."',"."'".$data[36]."',"."'".$data[39]."',"."'".$data[40]."',"."'".$data[45]."',".
                "'".$data[47]."',"."'".$data[48]."',"."'".$data[52]."',"."'".$data[55]."',"."'".$data[67]."',"."'".$price."'";
            // );
            saveData($value,$columns,'tbl_cars');
        }
        $i++;
    }
}
function getDataFromTable($request=''){
    $connection = connection();
    $sql = "select * from tbl_cars";
    $where='';
    if(!empty($request)){
        $where = " where ";
        $and = '';
        if(!empty($request['company'])){
            $and = ($where == " where ")?"":" And ";
            $where.=$and." company='".$request['company']."'";
        }
        if(!empty($request['min'])){
            $and = ($where == " where ")?"":" And ";
            $where.=$and." price>=".$request['min']."";
        }
        if(!empty($request['max'])){
            $and = ($where == " where ")?"":" And ";
            $where.=$and." price<=".$request['max']."";
        }
        if(!empty($request['fuel_type'])){
            $and = ($where == " where ")?"":" And ";
            $where.=$and." fuel_type='".$request['fuel_type']."'";
        }
        if(!empty($request['milage'])){
            $and = ($where == " where ")?"":" And ";
            $where.=$and." city_mileage LIKE '%".$request['milage']."%'";
        }
        if(!empty($request['body_type'])){
            $and = ($where == " where ")?"":" And ";
            $where.=$and." body_type = '".$request['body_type']."'";
        }
        if(!empty($request['type'])){
            $and = ($where == " where ")?"":" And ";
            $where.=$and." type = '".$request['type']."'";
        }
    }
    $sql = $sql.$where;
    $result = $connection->query($sql);
    return $result;
}
?>