<?php 

    Class Users
    {   
        private $con;

        public function __construct($con)
        {
            $this->con = $con;
        }

        public function login($user, $password)
        {
            $query = mysqli_query($this->con, "SELECT * FROM users WHERE userName = '$user' AND password = '$password'");
           
            return $query;
            /* if(mysqli_num_rows($query) == 1) 
            {
                return $query;
            } else {
                return false;
            } */
        }
    }

?>