<?php 

    class Category
    {
        private $con;

        public function __construct($con)
        {
            $this->con = $con;
        }

        public function getCategories()
        {
            $query = mysqli_query($this->con, "SELECT * FROM category");
            // return $this->validateQuery($query);
            return $query;
        }

        public function getNameCategory($idcategory) {
            $query = mysqli_query($this->con, "SELECT * FROM category WHERE idCategory = '$idcategory' LIMIT 1");
            return $this->validateQuery($query);
        }

        private function validateQuery($query)
        {
            if($query)
            {
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