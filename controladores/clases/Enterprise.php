<?php 

    class Enterprise
    {
        private $con;

        public function __construct($con)
        {
            $this->con = $con;
        }

        public function getEnterprises()
        {
            $query = mysqli_query($this->con, "SELECT * FROM enterprises WHERE IsActive = 1");
            return $this->validateQuery($query);
        }

        public function getEnterprise($name)
        {
            $query = mysqli_query($this->con, "SELECT * FROM enterprises WHERE nameEnterprise = '$name'");
            return $this->validateQuery($query);
            // return $query;
        }

        public function getPhotosEnterprise($enterprise)
        {
            $query = mysqli_query($this->con, "SELECT * FROM photos WHERE enterprise = '$enterprise'");
            // return $this->validateQuery($query);
            return $query;
        }

        public function deletePhotoEnterprise($name)
        {
            $query = mysqli_query($this->con, "DELETE FROM photos WHERE name = '{$name}'");
            return $query;
        }

        public function getEnterprisesToAccept()
        {
            $query = mysqli_query($this->con, "SELECT * FROM enterprises WHERE IsActive = 0");
            return $query;
        }

        public function insertEnterprise($name, $desc, $type, $coordinates, $facebook, $twitter, $telephone, $email)
        {
            $queryStatement = "INSERT INTO enterprises (enterpriseID, nameEnterprise, descEnterprise, "
            . "coordinatesEnterprise, typeEnterprise, isActive, facebook, twitter, telephone, email) "
            . "VALUES (NULL, '{$name}', '{$desc}', '{$coordinates}', {$type}, 0, '{$facebook}', '{$twitter}', '{$telephone}', '{$email}')";
            $query = mysqli_query($this->con, $queryStatement);
            return $query;
        }

        public function updateEnterprise($oldName, $newName,$desc, $type, $coordinates, $IsActive ,$facebook, $twitter, $telephone, $email)
        {
            $queryStatement = "UPDATE enterprises SET nameEnterprise = '{$newName}', descEnterprise = '{$desc}', coordinatesEnterprise = '{$coordinates}', typeEnterprise = {$type}, isActive = {$IsActive}, facebook = '{$facebook}', twitter = '{$twitter}', telephone = '{$telephone}', email = '{$email}' WHERE nameEnterprise = '{$oldName}'";
            $query = mysqli_query($this->con,  $queryStatement);
            return $query;
        }

        public function insertPhoto($randomName, $route, $name)
        {
            $queryStatement = "INSERT INTO photos (name, route, enterprise) VALUES ('{$randomName}', '{$route}', '{$name}')";
            $query = mysqli_query($this->con, $queryStatement);
            return $query;       
        }

        public function returnEnterprisesByCategory($category)
        {
            $result = $this->getNumberCategory($category);
            $categoryNumber = $result->fetch_assoc();
            $categoryNumber = $categoryNumber['idCategory'];
            $queryStatement = "SELECT * FROM enterprises WHERE typeEnterprise = '{$categoryNumber}' AND IsActive = 1";
            $query = mysqli_query($this->con, $queryStatement);
            return $query;
        }

        public function getNumberCategory($category)
        {
            $queryStatement = "SELECT * FROM category WHERE categoryName = '{$category}'";
            $query = mysqli_query($this->con, $queryStatement);
            return $query;
        }

        public function deleteEnterprise($id) {
            $queryStatement = "DELETE FROM enterprises WHERE enterpriseID = '{$id}'";
            $query = mysqli_query($this->con, $queryStatement);
            return $this->con->affected_rows;
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