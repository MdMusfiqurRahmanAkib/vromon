<?php 
	include "inc/db.php";

	class database_query{

	  	private $sql;

	    public function __construct($sql){
	        $this->sql = $sql;
	    }

	    public function query(){
	        return $this->get_result($this->sql);
	    }

	    public function get_result($sql){
	    	global $con;
	        $results = mysqli_query($con,$sql);
	        $final_result = [];

	        while($result = mysqli_fetch_assoc($results)){ 
	        	array_push($final_result, $result);
	        }

	        return $final_result;
	    }
	}
?>