<?php
// ===== CONTROLLER =====
class DonationController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->view = new DonationView();
        $this->model = new DonationModel();
    }
    public function handleRequest()
    {
        $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';
        $formType = isset($_GET['form']) ? $_GET['form'] : '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->handleFormSubmition($formType, $page);
        } else {

            if ($page == 'centers') {
                $centers = $this->model->getAllCenters();
                $this->view->showForm($page, $formType, "", $centers);
            } elseif ($page == 'center-profiles') {
                $profiles = $this->model->getAllProfiles();
                $this->view->showForm($page, $formType, "", null, $profiles);
                //admin--------------------------------------
            }else if($page == 'admin'){
                 if($formType){
                        $this->view->showAdminForms($formType);
                    } else {
                        $this->view->showAdminPage();
                    }
                    //--------------------------------------
            }else {
                $aboutUs = $this->model->getAllAboutUs();
                $this->view->showForm($page, $formType, $aboutUs);
            }
        }
    }
    function handleFormSubmition($formType, $page)
    {
         // get inputs from forms
            $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';
            $phoneNumber = trim($_POST['phoneNumber'] ?? '');
            $cardNumber = trim($_POST['cardNumber'] ?? '');
            $expiry = trim($_POST['expiry'] ?? '');
            $CVV = trim($_POST['CVV'] ?? '');
            $amount = trim($_POST['amount'] ?? '');
            $centerName = trim($_POST['centerName'] ?? '');
            $name = trim($_POST['name'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $items = trim($_POST['items'] ?? '');
            $delivery = trim($_POST['delivery'] ?? '');
            $foodType = trim($_POST['food-type'] ?? '');
            $quantity = trim($_POST['quantity'] ?? '');
            $donationType = trim($_POST['donation-type'] ?? '');
            $description = trim($_POST['description'] ?? '');


        $action = $_POST['action'] ?? '';
        if ($action === 'close') {
            $arr = array();
            switch ($formType) {
                case 'money':
                    $arr = array(
                        'phoneNumber' => $phoneNumber,
                        'cardNumber' => $cardNumber,
                        'expiry' => $expiry,
                        'CVV' => $CVV,
                        'amount' => $amount,
                        'centerName' => $centerName
                    );
                    break;
                case 'clothes':
                    $arr = array(
                        'name' => $name,
                        'phone' => $phone,
                        'items' => $items,
                        'delivery' => $delivery
                    );
                    break;
                case 'food':
                    $arr = array(
                        'name' => $name,
                        'phone' => $phone,
                        'foodType' => $foodType,
                        'quantity' => $quantity,
                        'delivery' => $delivery,
                        'centerName' => $centerName
                    );
                    break;
                case 'other':
                    $arr = array(
                        'name' => $name,
                        'phone' => $phone,
                        'donationType' => $donationType,
                        'description' => $description
                    );
                    break;
                default:
                    $arr = array();;
            }
            $jsonArr = json_encode($arr);
            setcookie('donationForm', $jsonArr, 0, '/');
            // After saving, redirect back to donation page
            header('Location: ?page=donation');
            exit();
        }
        // Handle actual form submission
        if ($action === 'submit') {
            // Clear any saved data since we're actually submitting
            if (isset($_COOKIE['donationForm'])) {
                setcookie("donationForm", "", time() - 1, "/");
            }
           
             

            $aboutUs = $this->model->getAllAboutUs();
            //check the form type to insert proper data to destination table
            switch ($formType) {
                case 'money':
                if (empty($phoneNumber) || empty($cardNumber) || empty($expiry) || empty($CVV) || empty($amount)) {
            $this->view->ShowForm($page, $formType, NULL, NULL, NULL, "دڤێت هەمی بەش بهێنە پڕکرن");
            return;
         }
                    if ($this->model->addMoney($phoneNumber, $cardNumber, $expiry, $CVV, $amount, $centerName)) {
                        $formType = 'success';
                        $page = 'donation';
                        $this->view->showForm($page, $formType, $aboutUs);
                        exit();
                    }
                case 'clothes':
                    if (empty($name) || empty($phone) || empty($items) || empty($delivery)) {
            $this->view->ShowForm($page, $formType, NULL, NULL, NULL, "دڤێت هەمی بەش بهێنە پڕکرن");
         return;}
                    if ($this->model->addClothes($name, $phone, $items, $delivery)) {
                        $formType = 'success';
                        $page = 'donation';
                        $this->view->showForm($page, $formType, $aboutUs);
                        exit();
                    }
                case 'food':
                    if (empty($name) || empty($phone) || empty($foodType) || empty($quantity)|| empty($delivery)) {
            $this->view->ShowForm($page, $formType, NULL, NULL, NULL, "دڤێت هەمی بەش بهێنە پڕکرن");
         return;}
                    if ($this->model->addFood($name, $phone, $foodType, $quantity, $delivery, $centerName)) {
                        $formType = 'success';
                        $page = 'donation';
                        $this->view->showForm($page, $formType, $aboutUs);
                        exit();
                    }
                case 'other':
                    if (empty($name) || empty($phone) || empty($donationType) || empty($description)) {
            $this->view->ShowForm($page, $formType, NULL, NULL, NULL, "دڤێت هەمی بەش بهێنە پڕکرن");
         return;}
                    if ($this->model->addOther($name, $phone, $donationType, $description)) {
                        $formType = 'success';
                        $page = 'donation';
                        $this->view->showForm($page, $formType, $aboutUs);
                        exit();
                    }
                    break;
            }



        }

        
            
                if (isset($_POST['firstname'], $_POST['email'], $_POST['phone'], $_POST['age'], $_POST['role'])) {
                $firstname = $_POST['firstname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $age = (int) $_POST['age'];
                $roles = $_POST['role'];
                $skills = isset($_POST['skills']) ? $_POST['skills'] : '';
                $availability = isset($_POST['availability']) ? $_POST['availability'] : '';
                $degree = isset($_POST['degree']) ? $_POST['degree'] : '';

             if($action==='closeform'){
             $arr = array();

              $arr = array(
                        'firstname' => $firstname,
                        'email' => $email,
                        'phone' => $phone,
                        'age' => $age,
                        'role'=>$roles,
                        'skills'=>$skills,
                        'availability'=>$availability,
                        'degree'=>$degree
                    );
            $jsonArr = json_encode($arr);
            setcookie('volunteerForm', $jsonArr, 0, '/');
            header('Location: ?page=home');
            exit();
            // After saving, redirect back to donation page
        
        }
        if($action==='submitform'){
                if (isset($_COOKIE['volunteerForm'])) {
                setcookie("volunteerForm", "", time() - 1, "/");
            }
                if ($this->model->addVolunteer($firstname, $email, $phone, $age, $roles, $skills, $availability, $degree)) {
                    // Show success message in the form
                    $this->view->showForm($page, $formType,NULL,NULL,NULL, '!فورما تە ب سەرکەفتیانە هاتە فرێ کرن');
                } else {
                    $this->view->showForm($page, $formType, NULL,"<p style='color:red'>Failed to save volunteer data.</p>");
                }
            
        }



            }


            //--------------------------------------------------------------------------------------


            if (isset($_POST['feedback'])) {
                $feedback = $_POST['feedback'];

            if($action==='savedraft'){
             $arr = array();
              $arr = array(
                'feedback' => $feedback,
                    );
            $jsonArr = json_encode($arr);
            setcookie('feedbackform', $jsonArr, 0, '/');
            header('Location: ?page=home');
            exit();
        
        
        }


                 if($action==='submitfeedback'){

                    if (isset($_COOKIE['feedbackform'])) {
                setcookie("feedbackform", "", time() - 1, "/");
            }
                if ($this->model->addFeedback($feedback)) {
                    // Show success message in the form
                    $this->view->showForm($page, $formType,NULL,NULL,NULL, '!فیدبەگا تە ب سەرکەفتیانە هاتە فرێ کرن');
                } else {
                    $this->view->showForm($page, $formType,NULL,NULL,NULL, "<p style='color:red'>Failed to save volunteer data.</p>");
                }
            }
            }
            
            //-----------------------------------------------------------------------------------------


            if (isset($_POST['centername'], $_POST['centertype'], $_POST['centerphone'], $_POST['centeremail'], $_POST['centermsg'])) {
                $centername = $_POST['centername'];
                $centertype = $_POST['centertype'];
                $centerphone = $_POST['centerphone'];
                $centeremail = $_POST['centeremail'];
                $centermsg = $_POST['centermsg'];

            if($action==='savedraft'){
             $arr = array();
              $arr = array(
                        'centername' => $centername,
                        'centertype' => $centertype,
                        'centerphone' => $centerphone,
                        'centeremail' => $centeremail,
                        'centermsg'=>$centermsg
                    );
            $jsonArr = json_encode($arr);
            setcookie('registerform', $jsonArr, 0, '/');
            header('Location: ?page=home');
            exit();

        
        }
                 if($action==='sbnContact'){
                if (isset($_COOKIE['registerform'])) {
                setcookie("registerform", "", time() - 1, "/");}

                if ($this->model->registerCenter($centername, $centertype, $centerphone, $centeremail, $centermsg)) {
                    // Show success message in the form
                    $this->view->showForm($page, $formType,NULL,NULL,NULL,'!فورما تە ب سەرکەفتیانە هاتە فرێ کرن');
                } else {
                    $this->view->showForm($page, $formType,NULL,NULL,NULL, "<p style='color:red'>Failed to save volunteer data.</p>");
                }
            }

            }

            //Admin-------------------------------------------
        if($action==="submitAboutUsForm"){
            $title = trim($_POST['aboutUsTitle'] ?? '');
            $description = trim($_POST['aboutUsDescription'] ?? '');
            if($this->model->addAboutUs($title ,$description)){
                $this->view->showAdminPage('پێزانین بسەرکەفتیانە هاتە زێدەکرن');
            }else{
                $this->view->showAdminForms($formType, 'ئاریشەک هەبوویە، پێزانین نەهاتە زێدەکرن');
            }
        }
        if($action==="submitAboutUsDeleteForm"){
            $ID = trim($_POST['aboutUsDeleteId'] ?? '');
            if($this->model->deleteAboutUs($ID)){
                $this->view->showAdminPage('پێزانین بسەرکەفتیانە هاتە ژێبرن');
            }else{
                $this->view->showAdminForms($formType, 'ئاریشەک هەبوویە، پێزانین نەهاتە زێدەکرن');
            }
        }
        //-------------------------------------------------
    }

    //----------------------------------------------------------


    public function showCenters()
    {
        $centers = $this->model->getAllCenters();
        $this->view->getCenters($centers);
    }


    
}
