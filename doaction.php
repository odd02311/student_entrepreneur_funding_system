<?php
session_start();
require_once dirname(__FILE__) .'/config.php';
require_once dirname(__FILE__) .'/common.php';


function connect(){
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die ( 'Failed to connect to the database<br/>ERROR ' . mysqli_connect_errno () . ':' . mysqli_connect_error () );
    return $link;
}


/**
 * inser data
 * @param object $link
 * @param array $data
 * @param string $table
 * @return boolean
 */
function insert($link,$data,$table){
    $keys = join ( ',', array_keys ( $data ) );
    $vals = "'" . join ( "','", array_values ( $data ) ) . "'";
    $query = "INSERT {$table}({$keys}) VALUES({$vals})";

    $res = mysqli_query ( $link, $query );
    if ($res) {
        return mysqli_insert_id ( $link );
    } else {
        return false;
    }
}


/**
 * update data
 * @param object $link
 * @param array $data
 * @param string $table
 * @param string $where
 * @return boolean
 */
function update($link, $data, $table, $where = null) {
    foreach ( $data as $key => $val ) {
        $set .= "{$key}='{$val}',";
    }
        

    $set = trim ( $set, ',' );
    $where = $where == null ? '' : ' WHERE ' . $where;
    $query = "UPDATE {$table} SET {$set} {$where}";
    
    $res = mysqli_query ( $link, $query );
    if ($res) {
        return mysqli_affected_rows ( $link );
    } else {
        return false;
    }
}

//DELETE FROM user WHERE id=
/**
 * delete operation
 * @param object $link
 * @param string $table
 * @param string $where
 * @return boolean
 */
function delete($link, $table, $where = null) {
    $where = $where ? ' WHERE ' . $where : '';
    $query = "DELETE FROM {$table} {$where}";
    $res = mysqli_query ( $link, $query );
    if ($res) {
        return mysqli_affected_rows ( $link );
    } else {
        return false;
    }
}

/**
 * query specific record
 * @param object $link
 * @param string $query
 * @param string $result_type
 * @return array|boolean
 */

function fetchOne($link, $query, $result_type = MYSQLI_ASSOC) {
    $result = mysqli_query ( $link, $query );

    if ($result  && mysqli_num_rows ( $result ) > 0) {
        $row = mysqli_fetch_array ( $result, $result_type );
        return $row;
    }
     else {
        return false;
    }
}


/**
 * query all records
 * @param object $link
 * @param string $query
 * @param string $result_type
 * @return array|boolean
 */
function fetchAll($link, $query, $result_type = MYSQLI_ASSOC) {
    $result = mysqli_query ( $link, $query );
    if ($result && mysqli_num_rows ( $result ) > 0) {
        while ( $row = mysqli_fetch_array ( $result, $result_type ) ) {
            $rows [] = $row;
        }
        return $rows;
    } else {
        return false;
    }
}

/**
 * get the number of all rows
 * @param object $link
 * @param string $table
 * @return number|boolean
 */
function getTotalRows($link, $table) {
    $query = "SELECT COUNT(*) AS totalRows FROM {$table}";
    $result = mysqli_query ( $link, $query );
    if ($result && mysqli_num_rows ( $result ) == 1) {
        $row = mysqli_fetch_assoc ( $result );
        return $row ['totalRows'];
    } else {
        return false;
    }
}

/**
 * get the number of Result rows
 * @param object $link
 * @param string $query
 * @return boolean
 */
function getResultRows($link, $query) {
    $result = mysqli_query ( $link, $query );
    if ($result) {
        return mysqli_num_rows ( $result );
    } else {
        return false;
    }
}

//determines whether user logged in
if (!isLoggedIn()){
    die("you need login firstly");
}

$link = connect();
$act=$_REQUEST['act'];
$id = trim($_SESSION['id']);

switch($act){
    case 'add':
            $username = $id;
            $title = $_REQUEST["title"];
            $category = $_REQUEST["category"];
            $url = $_REQUEST["url"];
            $description = $_REQUEST["description"];

            $data = compact('username','title','description','category','url');
            $res = insert($link, $data, 'productions');
            if($res){
                return '1';
            }
            else{
                return '0';
            }
        break;
    case 'like':
            $product_id=$_REQUEST['product_id'];
            $data=array('likes'=>"$likes"); 
            $res=update($link,$data,$table,"product_id = '{$product_id}'");
            if($res){
                echo '1';
            }
            else{
                echo '0';
            }
        break;
    case 'list':
            $query = "select * from productions"
            $rows = fetchAll($link, $query);
            if($rows){
                return json_encode($rows);
            }
            else{
                return '0';
            }
        break;
    case 'mylist':
            $query = "select * from productions where username = " .$id;
            $rows = fetchAll($link, $query);
            if($rows){
                return json_encode($rows);
            }
            else{
                return '0';
            }
        break;
}

?>