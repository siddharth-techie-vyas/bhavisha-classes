<?php																																										
 
require_once ("DBController.php");

class Accounts {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

    function get_fee_details_student($stu_id)
    {
        $query="select * from accounts where stu_id = '$stu_id' ORDER BY id ASC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;    
    }

    function get_total_paid_stu($stu_id)
    {
        $query="select SUM(amt) as sum_amt from accounts where stu_id = '$stu_id'";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_receipt_stu($stu_id,$id)
    {
        $query="select * from accounts where stu_id = '$stu_id' AND id='$id'";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_all_transaction_type_main()
    {
        $query="select * from acc_master_transaction_type where tid='0' Order By id";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
    
     function get_all_transaction_type_subcat($tid)
    {
        $query="select * from acc_master_transaction_type where tid='$tid' Order By id";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
    
    function get_all_transaction_type_loop($tid)
    {
        
        $subcat=$this->get_all_transaction_type_subcat($tid);
                if($subcat)
                {
                    foreach($subcat as $k => $value)
                    {
                        echo "<option value='".$subcat[$k]['id']."'> - <em>".$subcat[$k]['type_name']."</em></option>";
				$subcat2=$this->get_all_transaction_type_loop($subcat[$k]['id']);
                        if(!$subcat2)
                        {}
				
                    }
                } 
    }
    
    function get_transaction_type_one($id)
    {
        $query="select * from acc_master_transaction_type where id='$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function add_transaction_type($tid,$type_name,$transaction_type)
    {
        $query = "insert into acc_master_transaction_type(tid,type_name,type_transaction)VALUES(?,?,?)";
            $paramType = "iss";
            $paramValue = array($tid,$type_name,$transaction_type);
            $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
            if($insertId)
                {
                    echo "<div class='alert alert-success'>Transaction Type Added Successfully !!!</div>";
                }
            else
                {echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}
    }
    
     function edit_transaction_type($tid,$type_name,$transaction_type,$id)
    {
            $query = "update acc_master_transaction_type SET tid='$tid',type_name='$type_name',type_transaction='$type_transaction' where id='$id' ";
            $insertId = $this->db_handle->runSingleQuery($query);
            if(!$insertId)
                {
                    echo "<div class='alert alert-success'>Transaction Type Edit Successfully !!!</div>";
                }
            else
                {echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}
    }
    
    function add_fee_cash($stu_id,$amt,$syear,$branch,$transaction_type,$debit_credit,$account_type,$status)
	{
	    
	    $date_time = date('Y-m-d H:i:s');
	    $query = "insert into accounts(stu_id,amt,syear,branchid,transaction_type,debit_credit,account_type,status,date_time) Values ('$stu_id','$amt','$syear','$branch','$transaction_type','$debit_credit','$account_type','$status','$date_time')";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
	}
	

	function add_fee_chaque($debit_credit,$transaction_type,$branchid,$syear,$stu_id,$amt,$account_type,$chaque_nu,$sign_auth,$chaque_date,$status)
	{
	    
	    $date_time = date('Y-m-d H:i:s');
	    $query = "insert into accounts(debit_credit,transaction_type,branchid,syear,stu_id,amt,account_type,chaque_nu,sign_auth,chaque_date,status,date_time) Values ('$debit_credit','$transaction_type','$branchid','$syear','$stu_id','$amt','$account_type','$chaque_nu','$sign_auth','$chaque_date','$status','$date_time')";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
	}
	
	function add_fee_upi($debit_credit,$transaction_type,$branchid,$syear,$stu_id,$amt,$account_type,$tra_id,$status)
	{
	    
	    $date_time = date('Y-m-d H:i:s');
	    $query = "insert into accounts(debit_credit,transaction_type,branchid,syear,stu_id,amt,account_type,tra_id,status,date_time,upi) Values ('$debit_credit','$transaction_type','$branchid','$syear','$stu_id','$amt','$account_type','$tra_id','$status','$date_time','1')";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
	}
	
	function get_bank_acc()
	{
	    $query = "select * from acc_master_bank_ac where ifsc != '' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function get_bank_upi()
	{
	    $query = "select * from acc_master_bank_ac where upi != '' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function add_bank($acc_nu,$acc_name,$bank_name,$ifsc,$acc_type,$upi,$opening_balance)
	{
	    
	    $query = "insert into acc_master_bank_ac(acc_nu,acc_name,bank_name,ifsc,acc_type,upi,opening_balance) Values ('$acc_nu','$acc_name','$bank_name','$ifsc','$acc_type','$upi','$opening_balance')";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
	}
	
	function get_all_account()
	{
	    $query = "select * from acc_master_bank_ac ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function get_one_account($id)
	{
	    $query = "select * from acc_master_bank_ac where id = '$id' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function update_bank($acc_nu,$acc_name,$bank_name,$ifsc,$acc_type,$upi,$opening_balance,$id,$status)
	{
	    
	    $query = "Update acc_master_bank_ac SET acc_nu='$acc_nu',acc_name='$acc_name',bank_name='$bank_name',ifsc='$ifsc',acc_type='$acc_type',upi='$upi',opening_balance='$opening_balance',status='$status' where id='$id' ";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
	}
	
    function get_transaction_details($date)
    {
        $query = "select * from accounts where date_time LIKE '$date%' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }
    
    function get_transaction_details_50()
    {
        $query = "select * from accounts Order by date_time DESC LIMIT 50 ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }
    
    function get_transaction_details_custom_date($from, $to)
    {
        $query = "select * from accounts where date_time > '$from%' AND date_time < '$to%'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }
    
    function approved_transaction($tra_id,$submit,$amt,$acc_id,$debit_credit)
    {
        $query = "update accounts SET approval='$submit' where id='$tra_id' ";
        $result = $this->db_handle->runSingleQuery($query);
        //return $result; 

        if($submit=='1')
        {    
        //-- add transaction in db and change balance
        $this->add_balance_transaction($tra_id,$amt,$acc_id,$debit_credit);
        }
    }

    function get_acc_balance($acc_id,$session)
    {
        $query = "select balance from accounts_transaction where acc_id = '$acc_id' AND session='$session' Order by id DESC";
        $result = $this->db_handle->runBaseQuery($query);
        $amt = $result[0]['balance'];
        if(!empty($amt)){return $amt;}
        else
        {
            $query = "select opening_balance from acc_master_bank_ac where id = '$acc_id' ";
            $result = $this->db_handle->runBaseQuery($query);
            return $result[0]['opening_balance'];
        }
    }

    function add_balance_transaction($tra_id,$amt,$acc_id,$debit_credit)
    {
      //-- get current balance from acc as per session
      $balance = $this->get_acc_balance($acc_id,$_SESSION['syear']);
      //-- add and update balance in transaction
      $date_time = date('Y-m-d h:i:s');
      if($debit_credit =='1')
        {$final_balance= $balance + $amt;}
      if($debit_credit =='0')
        {$final_balance= $balance - $amt;}  

     $query = "insert into accounts_transaction (tra_id,acc_id,debit_credit,amt,balance,date_time,session) Values ('$tra_id','$acc_id','$debit_credit','$amt','$final_balance','$date_time','".$_SESSION['syear']."' )" ;
      $result = $this->db_handle->runBaseQuery($query);
            return $query; 
    }	

    function add_course_other_fee($course,$fee_type,$amount,$preference)
    { 
        print_r($course);
         $course_ids = implode(',',$course);
         
         $query = "insert into acc_fee_other(course,fee_type,amount,preference) Values ('$course_ids','$fee_type','$amount','$preference')" ;
         $result = $this->db_handle->runBaseQuery($query);
         if($result)
                {
                    echo "<div class='alert alert-success'>Fee Type Added Successfully !!!</div>";
                }
            else
                {echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}
    }
	
}