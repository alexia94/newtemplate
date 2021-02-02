<html>
<head>
</head>
<body>

<!--<form method="POST" action="<?php $PHP_SELF ?>">--> 

    <form method="GET" action="">

    <input name="query" type="text">
    
    
    <button type="submit">Esegui</button>


</form>



</body>
</html>


<?php
        $json = file_get_contents("https://alexia94.github.io/newtemplate/prova.json");
        $json_decoded = json_decode($json);
        $data = $json_decoded -> data;
        $jsonArray = json_decode($json, true);

		function build_row($result) {
			echo '<tr>';
            echo '<td>'.$result['_id'].'</td>';
            echo '<td>'.$result['first_name'].'</td>';
            echo '<td>'.$result['last_name'].'</td>';
            echo '<td>'.$result['address'].'</td>';
            echo '<td>'.$result['phone'].'</td>';
            echo '<td>'.$result['email'].'</td>';
            echo '<td>'.$result['__v'].'</td>';
          	echo '</tr>';
		}

		$query = "";
        $messaggio=0;

        if (isset($_GET["query"])) {

    		if (empty($_GET["query"])) {
    	    		echo '<table>';
    	    		echo '<tr>';
		            echo '<td>'.'Id'.'</td>';
		            echo '<td>'.'First Name'.'</td>';
		            echo '<td>'.'Last Name'.'</td>';
		            echo '<td>'.'Address'.'</td>';
		            echo '<td>'.'Phone'.'</td>';
		            echo '<td>'.'Email'.'</td>';
		            echo '<td>'.'__v'.'</td>';
		          	echo '</tr>'; 
    		        foreach($jsonArray["data"] as $user) {
    		       			echo build_row($user);
    				}
    				echo '</table>';
                    $messaggio=1;
    	  		} else {
    	   		
                $query = $_GET["query"];
        	

        		echo '<table>';
        		echo '<tr>';
	            echo '<td>'.'Id'.'</td>';
	            echo '<td>'.'First Name'.'</td>';
	            echo '<td>'.'Last Name'.'</td>';
	            echo '<td>'.'Address'.'</td>';
	            echo '<td>'.'Phone'.'</td>';
	            echo '<td>'.'Email'.'</td>';
	            echo '<td>'.'__v'.'</td>';
	          	echo '</tr>';
                foreach($jsonArray["data"] as $user) {
            		if($user['first_name'] == $query || $user['last_name'] == $query || $user['email'] == $query) {
               			echo build_row($user);
                        $messaggio=+1;
            		} 
        		}
        		echo '</table>';

                if ($messaggio==0) {
                    echo "Nessun risultato trovato";
                }
            }

    }

		

		/*
		echo '<table>';
        foreach($jsonArray["data"] as $result){
          echo '<tr>';
            echo '<td>'.$result['_id'].'</td>';
            echo '<td>'.$result['first_name'].'</td>';
            echo '<td>'.$result['last_name'].'</td>';
            echo '<td>'.$result['address'].'</td>';
            echo '<td>'.$result['phone'].'</td>';
            echo '<td>'.$result['email'].'</td>';
            echo '<td>'.$result['__v'].'</td>';
          echo '</tr>';
        }
        echo '</table>';
	*/

     /* echo '<table>';
        foreach($data as $result){
          echo '<tr>';
            echo '<td>'.$result->_id.'</td>';
            echo '<td>'.$result->first_name.'</td>';
            echo '<td>'.$result->last_name.'</td>';
            echo '<td>'.$result->address.'</td>';
            echo '<td>'.$result->phone.'</td>';
            echo '<td>'.$result->email.'</td>';
            echo '<td>'.$result->__v.'</td>';
          echo '</tr>';
        }
        echo '</table>'; */
?>
