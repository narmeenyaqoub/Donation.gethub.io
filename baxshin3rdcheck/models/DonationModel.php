<?php
// ===== MODEL =====
class DonationModel {
    private $conn;
    function __construct()
    {
        $sn='localhost';
        $un='root';
        $p='';
        $db='donation';

        $this->conn=new mysqli($sn, $un, $p, $db);
        if($this->conn->connect_error){
            die('Connection Failed: '.$this->conn->connect_error);
        }
    }
    //add user's input to money table
    function addMoney($phone_number, $card_number, $expiry, $cvv_code, $amountOfMoney, $choosen_center){
        $stmt = $this->conn->prepare("INSERT INTO moneyDonation(phone_number, card_number, expiry, cvv_code, amountOfMoney, choosen_center) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssds", $phone_number, $card_number, $expiry, $cvv_code, $amountOfMoney, $choosen_center);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    //take user's input and add it to databse, table: clothes
    function addClothes($full_name ,$phone_number, $clothes_type, $delivery_type){
        $stmt = $this->conn->prepare("INSERT INTO clothes(full_name ,phone_number, clothes_type, delivery_type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $full_name ,$phone_number, $clothes_type, $delivery_type);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    //add info to food table
    function addFood($full_name ,$phone_number, $food_type, $food_number, $delivery_type, $choosen_center){
        $stmt = $this->conn->prepare("INSERT INTO food(full_name ,phone_number, food_type, food_number, delivery_type, choosen_center) VALUES (?, ?, ?, ?,?,?)");
        $stmt->bind_param("sssiss", $full_name ,$phone_number, $food_type, $food_number, $delivery_type, $choosen_center);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    // add inputs to other's table
    function addOther($full_name ,$phone_number, $help_type, $help_description){
        $stmt = $this->conn->prepare("INSERT INTO other(full_name ,phone_number, help_type, help_description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $full_name ,$phone_number, $help_type, $help_description);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

  //Admin--------------------------------
    function addAboutUs($title ,$description){
        $stmt = $this->conn->prepare("INSERT INTO aboutUs(title ,aboutUs_description) VALUES (?, ?)");
        $stmt->bind_param("ss", $title ,$description);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    function deleteAboutUs($ID){
        $stmt = $this->conn->prepare("DELETE FROM aboutUs WHERE id = ?");
        $stmt->bind_param("i", $ID);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    //-------------------------------------------------------


    //get data from databse from about us table and show it in about us page
    public function getAllAboutUs() {
        $aboutUsList = [];
        $sql = "SELECT * FROM aboutUs ORDER BY id";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($about = $result->fetch_assoc()) {
                $about_id = $about['id'];

                $img_sql = "SELECT image_path FROM aboutUs_images WHERE about_id = $about_id";
                $img_result = $this->conn->query($img_sql);

                $images = [];
                if ($img_result->num_rows > 0) {
                    while ($img = $img_result->fetch_assoc()) {
                        $images[] = $img['image_path'];
                    }
                }

                $about['images'] = $images;

                $aboutUsList[] = $about;
            }
        }

        return $aboutUsList;
    }

    //---------------------------------------------------------------------------------
// Add volunteer using prepared statement
    public function addVolunteer($firstname, $email, $phone, $age, $roles, $skills, $availability, $degree) {
        $stmt = $this->conn->prepare("INSERT INTO volunteer (firstname, email, phone, age, roles, skills, availability, degree) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssissss",$firstname, $email, $phone, $age, $roles, $skills, $availability, $degree);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }


    
    // Add feedback using prepared statement
    public function addFeedback($feedback) {
        $stmt = $this->conn->prepare("INSERT INTO contact_feedback (feedback) VALUES (?)");
        $stmt->bind_param("s",$feedback);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }


    public function registerCenter($centername, $centertype, $centerphone, $centeremail, $centermsg) {
        $stmt = $this->conn->prepare("INSERT INTO registration (centername, centertype, centerphone, centeremail, centermsg) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$centername, $centertype, $centerphone, $centeremail, $centermsg);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }





      public function getAllCenters() {
        $sql = "SELECT * FROM centers ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        return $result;
    }


        public function getAllProfiles() {
        $sql = "SELECT * FROM profiles ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        return $result;
    }
    //------------------------------------------------------------------------------------

    public function __destruct() {
            if ($this->conn) {
                $this->conn->close();
            }
        }


}
?>