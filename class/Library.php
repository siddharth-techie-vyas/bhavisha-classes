<?php 
require_once ("DBController.php");

class Library {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

    function add_publication($publication)
    {
        $query="select * from library_publication where publication='$publication' ";
		$result = $this->db_handle->runBaseQuery($query);
        if($result)
        {
            echo "<div class='alert alert-danger'>Publication Already Exist</div>";
        }
        else
        {
            $query = "insert into library_publication(publication) Values(?)";
            $paramType = "s";
            $paramValue = array($publication);
            $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
            echo "<div class='alert alert-success'>Publication Added Successfully !!!</div>";
        }
    }

    function add_author($author_name)
    {
        $query="select * from library_authors where author='$author_name' ";
		$result = $this->db_handle->runBaseQuery($query);
        if($result)
        {
            echo "<div class='alert alert-danger'>Author Already Exist</div>";
        }
        else
        {
            $query = "insert into library_authors (author) Values(?)";
            $paramType = "s";
            $paramValue = array($author_name);
            $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
            echo "<div class='alert alert-success'>Author Added Successfully !!!</div>";
        }
    }

    function add_location($location)
    {
        $query="select * from library_location where location='$location' ";
		$result = $this->db_handle->runBaseQuery($query);
        if($result)
        {
            echo "<div class='alert alert-danger'>Location Already Exist</div>";
        }
        else
        {
            $query = "insert into library_location (location) Values(?)";
            $paramType = "s";
            $paramValue = array($location);
            $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
            echo "<div class='alert alert-success'>Location Added Successfully !!!</div>";
        }
    }

    function add_book($book_name,$author,$location,$copies,$course,$subject,$publication,$remark,$edition)
    {
       $query="select * from library_books where author='$author' AND book_name = '$book_name' AND location='$location' ";
		$result = $this->db_handle->runBaseQuery($query);
        if($result)
        {
            echo "<div class='alert alert-danger'>Book Already Exist</div>";
        }
        else
        {
            $upc = '3806548'.rand(111111,999999);
            $query = "insert into library_books (book_name,author,location,copies,course,subject,publication,remark,edition,upc) Values(?,?,?,?,?,?,?,?,?,?)";
            $paramType = "ssssssssss";
            $paramValue = array($book_name,$author,$location,$copies,$course,$subject,$publication,$remark,$edition,$upc);
            $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
            echo "<div class='alert alert-success'>Book Added Successfully !!!</div>";
        }
    }

    function viewall_publication()
    {
        $query="select * from library_publication Order by publication ASC ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    } 

    function viewall_author()
    {
        $query="select * from library_authors Order by author ASC ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    } 

    function viewall_location()
    {
        $query="select * from library_location Order by location ASC ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    } 

    function viewall_books()
    {
        $query="select * from library_books Order by id DESC ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
    
    function delete_author($id)
    {
        $query="delete from library_authors where id = '$id' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function delete_location($id)
    {
        $query="delete from library_location where id = '$id' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function delete_publication($id)
    {
        $query="delete from library_publication where id = '$id' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function delete_book($id)
    {
        $query="delete from library_books where id = '$id' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_author_one($id)
    {
        $query="select * from library_authors where id = '$id' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_publication_one($id)
    {
        $query="select * from library_publication where id = '$id' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_location_one($id)
    {
        $query="select * from library_location where id = '$id' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_book_one($id)
    {
        $query="select * from library_books where id = '$id' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_book_by_subject($subject)
    {
        $query="select * from library_books where subject = '$subject' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function book_allotment($book,$copies,$alloted_date,$scedule_return_date,$user_type,$user_id)
    {
        $query="select * from library_allotment where user_id='$user_id' AND user_type='$user_type' AND book_id='$book' AND return_date = '0000-00-00' ";
		$result = $this->db_handle->runBaseQuery($query);
        if($result)
        {
            echo "<div class='alert alert-danger'>Book has been already alloted to him / her</div>";
            exit();
        }
        else
        {
            //-- chk qty
            $qty="select * from library_books where id='$book' ";
		    $result0 = $this->db_handle->runBaseQuery($qty);
            $nu = $result0[0]['copies'] - $result0[0]['alloted'];
            if($nu == 0)
            {
                echo "<div class='alert alert-danger'>No copeies available for allotment</div>"; 
                exit();
            }

            $query = "insert into library_allotment(book_id,copies,alloted_date,schedule_return_date,user_type,user_id) Values('$book','$copies','$alloted_date','$scedule_return_date','$user_type','$user_id')";
            $paramType = "iissii";
            $paramValue = array($book,$copies,$alloted_date,$scedule_return_date,$user_type,$user_id);
            $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
            echo "<div class='alert alert-success'>Book Alloted Successfully !!!</div>";

            //-- decrease the number of copies allotted
            $query="update library_books SET alloted=alloted+$copies where id='$book' ";
		    $result = $this->db_handle->runBaseQuery($query);
    
        }

    }

    function book_allotment_viewall()
    {
        $query="select * from library_allotment ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function book_return($id,$return_date,$copies,$book_id)
    {
        
        $query="update library_allotment SET return_date = '$return_date' where id='$id' ";
		$result = $this->db_handle->runSingleQuery($query);

        //-- update qty again in library book
        $query0="update library_books SET alloted=alloted-$copies where id='$book_id' ";
        $result0 = $this->db_handle->runSingleQuery($query0);

        
    }

    function get_upc_labels($course)
    {
        $query="select * from library_books";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
}