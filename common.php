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
		return trim($_SESSION['username']);
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
?>