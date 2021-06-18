<?php
    Class Photo
    {
        private $con;

        public function __construct($con) {
            $this->con = $con;
        }

        public function deletePicByName($name) {
            $query = mysqli_query($this->con, "DELETE FROM photos WHERE name = '$name' ");
            return mysqli_affected_rows($this->con);
        }

        private function validateQuery($query)
        {
            if(gettype($query) == 'boolean') {
                if(mysqli_affected_rows($query) > 0) {
                    return $query;
                } else {
                    return false;
                } 
            } else {
                if(mysqli_num_rows($query) > 0)
                {
                    return $query;
                } else {
                    return false;
                }
            }
        }
    }


?>