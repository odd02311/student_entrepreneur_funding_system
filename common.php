<?php
	require_once dirname(__FILE__) .'/config.php';


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

	function isLoggedIn()
	{
		return (isset($_SESSION['id']) &&
		       	(trim($_SESSION['id']) != ''));
	}

	function isAdmin()
	{
		return (isset($_SESSION['admin']) &&
		       	(trim($_SESSION['admin']) == 1));
	}

	function getUserName()
	{	
		if (isset($_SESSION['username'])){
			return trim($_SESSION['username']);
		}else{
			return '';
		}
	}

	function getAllUsers()
	{
		$link = connect();
		$sql="SELECT * FROM accounts  ORDER BY create_date DESC limit 0,100";
		return fetchAll($link, $sql);
	}

	function getAllPosts()
	{
		$link = connect();
		$sql="SELECT * FROM productions ORDER BY create_date DESC limit 0,100";
		return fetchAll($link, $sql);
	}

	function getLatestPosts()
	{
		$link = connect();
		$sql="SELECT * FROM productions ORDER BY create_date DESC limit 0,6";
		return fetchAll($link, $sql);
	}

	function getPopularPosts()
	{
		$link = connect();
		$sql="SELECT * FROM productions ORDER BY create_date ASC limit 0,8";
		return fetchAll($link, $sql);
	}

	function getTopRatedPosts()
	{
		$link = connect();
		$sql="SELECT * FROM productions ORDER BY likes DESC limit 0,6";
		return fetchAll($link, $sql);
	}

	function getMyPosts($username)
	{
		$link = connect();
		$sql="SELECT * FROM productions WHERE username='$username' ORDER BY create_date DESC limit 0,2";
		return fetchAll($link, $sql);
	}

	function getProductionById($product_id)
	{
		$link = connect();
		$sql="SELECT * FROM productions WHERE product_id=$product_id";
		return fetchOne($link, $sql);
	}

	function getComments($product_id)
	{

		$link = connect();
        $sql="SELECT * FROM accounts INNER JOIN comments ON accounts.username = comments.username WHERE comments.product_id=$product_id";
        return fetchAll($link, $sql);
	}

	function inc_view($product_id)
	{
		$link = connect();
        $query = "UPDATE productions SET views = views +1 WHERE product_id = $product_id";
        $res = mysqli_query ( $link, $query );
        return $res;
	}

	function search($keyword)
	{

		$link = connect();
        $query = "SELECT  * FROM accounts INNER JOIN productions ON accounts.username = productions.username WHERE  productions.description LIKE '%$keyword%' or productions.title LIKE '%$keyword%' or productions.author LIKE '%$keyword%' or productions.username  LIKE '%$keyword%'";
        $res = mysqli_query ( $link, $query );
        return $res;
	}


?>