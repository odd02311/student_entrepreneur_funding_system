<?php
session_start();
require_once dirname(__FILE__) .'/config.php';
require_once dirname(__FILE__) .'/common.php';


/* make a connection to database
 * the database information is configured in config.php
 */
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
    $set = '';
    foreach ( $data as $key => $val ) {
        $set .= "{$key}='{$val}',";
    }

    $set = trim ( $set, ',' );
    $where = $where == null ? '' : ' WHERE ' . $where;
    $query = "UPDATE {$table} SET {$set} {$where}";
    echo $query;

    $res = mysqli_query ( $link, $query );
    if ($res) {
        return mysqli_affected_rows ( $link );
    } else {
        return false;
    }
}


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

if (!isset($_REQUEST['act'])){
    die("no operation");
}

$link = connect();
$act=$_REQUEST['act'];
$id = trim($_SESSION['id']);

switch($act){
    case 'like':
            $product_id=$_REQUEST['product_id'];

            $query = "UPDATE productions SET likes = likes +1 WHERE product_id = " .$product_id;
            $res = mysqli_query ( $link, $query );
            if($res){
                echo '1';
            }
            else{
                echo '0';
            }
        break;
    case 'incviews':
            $product_id=$_REQUEST['product_id'];

            $query = "UPDATE productions SET views = views +1 WHERE product_id = " .$product_id;
            $res = mysqli_query ( $link, $query );
            if($res){
                echo '1';
            }
            else{
                echo '0';
            }
        break;
    case 'add':
            $likes = 0;
            $views = 0;
            $dislikes = 0;
            $username = $id;
            $title = $_REQUEST["title"];
            $author = $_REQUEST["author"];
            $category = $_REQUEST["category"];
            $pic_url = $_REQUEST["pic_url"];
            $video_url = $_REQUEST["video_url"];
            $description = $_REQUEST["desc"];

            $data = compact('username','title','author','description','category','pic_url', 'video_url', 'likes', 'dislikes', 'views');
            $res = insert($link, $data, 'productions');
            if($res){
                echo 'Post successfully';
            }
            else{
                echo 'Post failed';
            }
        break;
    case 'update_account':
            $product_id=$_REQUEST['product_id'];

            $product_id=$_REQUEST['product_id'];
            $product_id=$_REQUEST['product_id'];
            $product_id=$_REQUEST['product_id'];
            $product_id=$_REQUEST['product_id'];

            $query = "UPDATE accounts SET views = views +1 WHERE product_id = " .$product_id;
            $res = mysqli_query ( $link, $query );
            if($res){
                echo '1';
            }
            else{
                echo '0';
            }
        break;
    case 'del':
            $res = delete($link, $table,"id = ".$id);
            if($res){
            echo '1';
            }
            else{
            echo '2';
            }
         break;
    case 'change':
            $sex=$_REQUEST['sex'];
            $age=$_REQUEST['age'];
            $id=$_REQUEST['id'];
            $username=$_REQUEST['username'];                                
            $query="SELECT * FROM $table WHERE id='{$id}'";                
            $row=fetchOne($link, $query);
             echo json_encode($row);              
        break;
    case 'list':
            $query = "select * from productions";
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