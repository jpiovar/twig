<?php


  
    
class Db{ 

	function connect($host,$user,$password,$database){
  
		$con = new mysqli($host,$user,$password,$database);
		
		if ($con->connect_errno){

			echo "Zlyhalo pripojenie do MySQL databazy: (" . $con->connect_errno . ") " . $con->connect_error;

		} else {
			echo $con->host_info . "\n <br/>";
			echo "Pripojenie db<br/>";		
		}	
		
		return $con;
  
	}  
  
  
  
  
	function showAll($con,$name){	

	
		if ($stmt = $con->prepare("SELECT COUNT(*) FROM users WHERE name LIKE ?")){		
			
			$stmt->bind_param("s",$name);
			$stmt -> execute();
			
			$stmt->bind_result($countItems);
			$stmt -> fetch();	
			
			$skp[0]['countItems']=$countItems;
				   
			$stmt -> free_result();
			$stmt->close();

		}  
	  
	  
		if($stmt = $con->prepare("SELECT id, name, surname, info FROM users WHERE name LIKE ?")){		
		
			$stmt->bind_param("s",$name);
			$stmt -> execute();
			
			$stmt->bind_result($id,$name,$surname,$info);
			//$stmt->fetch();
			
			$i=0;
			
			while ($stmt->fetch()){
		
				$i = $i + 1;
							
				$skp[$i]['id']=$id;
				$skp[$i]['name']=$name;
				$skp[$i]['surname']=$surname;
				$skp[$i]['info']=$info;
				
			}
			
			$skp[0]['itemRows']=$i;				
					
			$stmt->free_result();
			$stmt->close();
		}
		
		
		return $skp;
		
	}		


  
  
  



}
  
?>