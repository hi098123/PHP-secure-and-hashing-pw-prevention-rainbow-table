<?php
if(!isset($_SESSION))
	session_start();
if(!isset($_REQUEST['logout'])){
	if(!isset($_SESSION['id'])){//login
	    if ( isset($_REQUEST['id']) and isset($_REQUEST['pw']) ){
	    	$id=$_REQUEST['id'];
	    	$date=date('YmdHis');
	    	$_SESSION['ldate']=$date;
	    	$ip=$_SERVER['REMOTE_ADDR'];
		    
		    $host='localhost';
		    $dbid='db id';
		    $dbpw='db password';
		    $dbname='db name';

			$conn=mysqli_connect($host,$dbid,$dbpw,$dbname);
			mysqli_query($conn,'set session character_set_connection=utf8;');
			mysqli_query($conn,'set session character_set_results=utf8;');
			mysqli_query($conn,'set session character_set_client=utf8;');
			
	        if($conn){
	        	$login = mysqli_query($conn, 'SELECT id,pw FROM member WHERE id=\''.$id.'\'');
	        	$login = mysqli_fetch_array($login);

		        if($login){
		            $id = $login['id'];
					$pw=$_REQUEST['pw'];
		            if($pw === $login['pw']) {
		                $_SESSION['id']=$id;
		                //logging login sucess
		                unset($_SESSION['tokn']);

		                mysqli_close($conn);
		                header('location: ./');
		            }else{
		            	//logging login fail- id or pw err
		            	mysqli_close($conn);
		                header('location: ./');
		            }
		        }else{
		        	//logging login fail id fail or db err
		        	mysqli_close($conn);
		        	header('location: ./');
		        }
		    }else{
		    	die('DB ERR');
		    }
		}
	}
}else{
    $_SESSION = Array();
    header('location: ./');
}
?>