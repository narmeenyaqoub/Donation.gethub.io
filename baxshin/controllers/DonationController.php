<?php
// ===== CONTROLLER =====
class DonationController {
    private $model;
    private $view;
    
    public function __construct() {
        $this->view = new DonationView();
        $this->model = new DonationModel();
    }
    public function handleRequest() {
        $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';
        $formType = isset($_GET['form']) ? $_GET['form'] : '';
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->handleFormSubmition($formType);
            
        }
    else {

    if ($page == 'centers') {
    $centers = $this->model->getAllCenters();
    $this->view->showForm($page,$formType,"", $centers);
    } elseif ($page == 'center-profiles') {
    $profiles = $this->model->getAllProfiles();
    $this->view->showForm($page,$formType,"", null, $profiles);
    } else {
     $aboutUs=$this->model->getAllAboutUs();
     $this->view->showForm($page, $formType, $aboutUs);
}
    }

        
    }
     function handleFormSubmition($formType){
        // get inputs from forms
        $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';
        $phoneNumber=trim($_POST['phoneNumber'] ?? '');
        $cardNumber=trim($_POST['cardNumber'] ?? '');
        $expiry=trim($_POST['expiry'] ?? '');
        $CVV=trim($_POST['CVV'] ?? '');
        $amount=trim($_POST['amount'] ?? '');
        $centerName=trim($_POST['centerName'] ?? '');
        $name=trim($_POST['name'] ?? '');
        $phone=trim($_POST['phone'] ?? '');
        $items=trim($_POST['items'] ?? '');
        $delivery=trim($_POST['delivery'] ?? '');
        $foodType=trim($_POST['food-type'] ?? '');
        $quantity=trim($_POST['quantity'] ?? '');
        $donationType=trim($_POST['donation-type'] ?? '');
        $description=trim($_POST['description'] ?? '');

        $aboutUs=$this->model->getAllAboutUs();
        //check the form type to insert proper data to destination table
        switch ($formType) {
            case 'money':
                if($this->model->addMoney($phoneNumber, $cardNumber, $expiry, $CVV, $amount , $centerName)){
                    $formType ='success';
                    $page ='donation';
                    $this->view->showForm($page, $formType, $aboutUs);
                    exit();
                    }
            case 'clothes':
                if($this->model->addClothes($name ,$phone, $items, $delivery)){
                    $formType ='success';
                    $page ='donation';
                    $this->view->showForm($page, $formType, $aboutUs);
                    exit();
                    }
            case 'food':
                if($this->model->addFood($name ,$phone, $foodType, $quantity, $delivery, $centerName)){
                    $formType ='success';
                    $page ='donation';
                    $this->view->showForm($page, $formType, $aboutUs);
                    exit();
                    }
            case 'other':
                if($this->model->addOther($name ,$phone, $donationType, $description)){
                    $formType ='success';
                    $page ='donation';
                    $this->view->showForm($page, $formType, $aboutUs);
                    exit();
                    }
             break;
    }


         if (isset($_POST['firstname'], $_POST['email'], $_POST['phone'], $_POST['age'], $_POST['role'])) {
            $firstname = $_POST['firstname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $age = (int) $_POST['age'];
            $roles = implode(", ", $_POST['role']); 
            $skills = isset($_POST['skills']) ? $_POST['skills'] : '';
            $availability = isset($_POST['availability']) ? $_POST['availability'] : '';
            $degree = isset($_POST['degree']) ? $_POST['degree'] : '';

/*
            // Validate required fields
        if (empty($firstname) || empty($email) || empty($phone) || empty($age) || empty($roles)) {
            $this->view->ShowHTMLForm("All fields are required!");
            return;
        }

               // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->view->ShowHTMLForm("Please enter a valid email address!");
            return;
        }
*/
         if ($this->model->addVolunteer($firstname, $email, $phone, $age, $roles, $skills, $availability, $degree)) {
    // Show success message in the form
    $this->view->showForm($page, $formType, $aboutUs,'!فورما تە ب سەرکەفتیانە هاتە فرێ کرن');

} else {
    $this->view->showForm($page, $formType, $aboutUs, "<p style='color:red'>Failed to save volunteer data.</p>");

}
        }

//--------------------------------------------------------------------------------------


     if (isset($_POST['feedback'])) {
     $feedback = $_POST['feedback'];

     if ($this->model->addFeedback($feedback)) {
    // Show success message in the form
    $this->view->showForm($page, $formType, $aboutUs,'!فیدبەگا تە ب سەرکەفتیانە هاتە فرێ کرن');
} else {
    $this->view->showForm($page, $formType, $aboutUs,"<p style='color:red'>Failed to save volunteer data.</p>");
            
    }
}
//-----------------------------------------------------------------------------------------


        if (isset($_POST['centername'], $_POST['centertype'], $_POST['centerphone'], $_POST['centeremail'], $_POST['centermsg'])) {
            $centername = $_POST['centername'];
            $centertype = $_POST['centertype'];
            $centerphone = $_POST['centerphone'];
            $centeremail = $_POST['centeremail'];
            $centermsg= $_POST['centermsg'];

        
/*

            // Validate required fields
        if (empty($centername) || empty($centertype) || empty($centerphone) || empty($centeremail) || empty($centermsg)) {
            $this->view->ShowHTMLForm("All fields are required!");
            return;
        }
                       // Validate email format
        if (!filter_var($centeremail, FILTER_VALIDATE_EMAIL)) {
            $this->view->ShowHTMLForm("Please enter a valid email address!");
            return;
        }
*/
        if ($this->model->registerCenter($centername, $centertype, $centerphone, $centeremail, $centermsg)) {
    // Show success message in the form
          $this->view->showForm($page, $formType, $aboutUs,'!فورما تە ب سەرکەفتیانە هاتە فرێ کرن');
        } else {
          $this->view->showForm($page, $formType, $aboutUs,"<p style='color:red'>Failed to save volunteer data.</p>");
         }

    }
        
    }


    //----------------------------------------------------------


    public function showCenters() {
        $centers = $this->model->getAllCenters();
        $this->view->getCenters($centers);
    }

}
?>