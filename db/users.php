<?php 
    class user{
         //private database object
         private $db;

         //constructor to initialize private variable to the database connection
         function __construct($conn)
         {
             $this->db=$conn;
         }
        public function insertuser($username,$password){
                try {
                    $result=$this->getUserByname($username);
                    if($result['num']>0){
                        return false;
                    }else{
                        $new_password=md5($password.$username);
                        //define sql statement to be executed
                        $sql="INSERT INTO users (username,password) VALUES(:username,:password)";
                        // prepare the sql statment for execution 
                        $stmt =$this->db->prepare($sql);
                        //bind all placeholders to the actual values
                        $stmt->bindparam(':username',$username);
                        $stmt->bindparam(':password',$new_password);
                    
                        // excute statment
                        $stmt->execute();
                        return true;
                    }
                    
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
        }
        

        public function getuser($username,$password){
            try{
                $sql="SELECT * FROM users WHERE username=:username AND password=:password";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$password);
                $stmt->execute();
                $result=$stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function getUserByname($username){
            try {
                $sql="SELECT COUNT(*) as num FROM users =:username";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                $stmt->execute();
                $result=$stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }

?>