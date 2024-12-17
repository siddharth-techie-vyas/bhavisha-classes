<?php																																										




class DBController {



    private $host = "localhost";



  private $user = "u610044665_bha_user";



    private $password = "Bha@#0291";



    private $database = "u610044665_bhavishaclasse";



    private $conn;


   function __construct() {



        $this->conn = $this->connectDB();

        date_default_timezone_set('Asia/Calcutta');

   // error_reporting(0);



    }   



    



    function default_timezone()
    {
                  date_default_timezone_set('Asia/Calcutta');
                  $current_date = date("Y-m-d h:i:sa");
                  return $current_date;
                   //daily_backup();

    }







    function connectDB() {



        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);



        return $conn;



    }



    



    function runBaseQuery($query) {

		$result = $this->conn->query($query);   
        //if($result->num_rows > 0) {

		if (! empty($result)) {



            while($row = $result->fetch_assoc()) {



                $resultset[] = $row;



            }



        }



		else {$resultset=0;}



        return $resultset;



    }



    



    



    function runSingleQuery($query) {



        $result = $this->conn->query($query);   
        $user = mysqli_fetch_array($result);
		return $user[0];
		
		//$user = mysqli_fetch_row($result);
		//return $user;



    }



	



    function runQuery($query, $param_type, $param_value_array) {



        $sql = $this->conn->prepare($query);



        $this->bindQueryParams($sql, $param_type, $param_value_array);



        $sql->execute();



        $result = $sql->get_result();



        



        if ($result->num_rows > 0) {



            while($row = $result->fetch_assoc()) {



                $resultset[] = $row;



            }



        }



        



        if(!empty($resultset)) {



            return $resultset;



        }



    }



    



    function bindQueryParams($sql, $param_type, $param_value_array) {



        $param_value_reference[] = & $param_type;



        for($i=0; $i<count($param_value_array); $i++) {



            $param_value_reference[] = & $param_value_array[$i];



        }



        call_user_func_array(array(



            $sql,



            'bind_param'



        ), $param_value_reference);



    }



    



    function insert($query, $param_type, $param_value_array) {



        $sql = $this->conn->prepare($query);



        $this->bindQueryParams($sql, $param_type, $param_value_array);



        $sql->execute();



        $insertId = $sql->insert_id;



        return $insertId;



    }



    



    function update($query, $param_type, $param_value_array) {



        $sql = $this->conn->prepare($query);



        $this->bindQueryParams($sql, $param_type, $param_value_array);



        $sql->execute();



    }



	



    /*function daily_backup($time)



    {







    }*/	



	



}



?>







