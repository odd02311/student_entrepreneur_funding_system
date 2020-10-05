<?php
session_start();

require_once dirname(__FILE__) .'/common.php';


//determines whether user logged in
if (!isLoggedIn()){
    die("you need login firstly");
}

if (!isset($_REQUEST['act'])){
    die("no operation");
}

$link = connect();
$act=$_REQUEST['act'];
$id = $_SESSION['id'];
$username = trim($_SESSION['username']);

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
    case 'add':
            $likes = 0;
            $views = 0;
            $dislikes = 0;
            $username = $username;
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

            $phone = $_REQUEST['phone'];
            $email = $_REQUEST['email'];
            $desc = $_REQUEST['desc'];
            $school = $_REQUEST['school'];

            $query = "UPDATE accounts SET ";
            if(!empty($phone)){
                $query .= "phone= '$phone',";
            }
            if(!empty($email)){
                $query .= "email= '$email',";
            }
            if(!empty($desc)){
                $query .= "description= '$desc',";
            }
            if(!empty($school)){
                $query .= "school= '$school',";
            }
            if(!empty($_REQUEST['password'])){
                $encrypted_pwd = md5($_REQUEST['password']);
                $query .= "password='$encrypted_pwd',";
            }
            $query = trim ( $query, ',');

            $query .= " WHERE id = $id;";

            
            $res = mysqli_query ( $link, $query );
            if($res){

                if(!empty($phone)){
                    $_SESSION['phone'] = $phone;
                }
                if(!empty($email)){
                    $_SESSION['email'] = $email;
                }
                if(!empty($desc)){
                    $_SESSION['desc'] = $desc;
                }
                if(!empty($school)){
                    $_SESSION['school'] = $school;
                }

                echo 'Update successfully';
            }
            else{
                echo 'Update failed';
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
            $query = "select * from productions where username = " .$username;
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