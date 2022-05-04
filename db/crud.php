<?php 
    class crud{
        //private database object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn)
        {
            $this->db=$conn;
        }

        //function to insert a new recoard into the attendence database
        public function insertAttendees($fname,$lname,$dob,$email,$contact,$speciality){
            try {
                //define sql statement to be executed
                $sql="INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,cotactno,specialty_id) VALUES(:fname,:lname,:dob,:email,:contact,:speciality)";
                // prepare the sql statment for execution 
                $stmt =$this->db->prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':speciality',$speciality);

                // excute statment
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editAttendee ($id,$fname,$lname,$dob,$email,$contact,$speciality){
            try {
                $sql="UPDATE `attendee` SET firstname=:fname,lastname=:lname,
                dateofbirth=:dob,emailaddress=:email,
                cotactno=:contact,specialty_id=:speciality WHERE attendee_id =:id";

                // prepare the sql statment for execution 
                $stmt =$this->db->prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':speciality',$speciality);

                // excute statment
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

            
        }

        public function getatendess(){
            try{
                $sql="SELECT * FROM attendee a inner join specialtes s on a.specialty_id  = s.specialtes_id";
                $result=$this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
        public function getAttendDeatails($id){
            try{
                $sql="SELECT * FROM attendee a inner join specialtes s on a.specialty_id  = s.specialtes_id WHERE attendee_id=:id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result=$stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        public function deleteattendes($id){
            try {
                
                $sql="DELETE FROM attendee WHERE attendee_id =:id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getSpecalities(){
            try{
                $sql="SELECT * FROM specialtes";
            $result=$this->db->query($sql);
            return $result;
            }
            catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            }
        }
  
    }
?>