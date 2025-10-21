<?php
// ===== CONTROLLER =====
class DonationController {
    private $model;
    private $view;
    
    public function __construct() {
        $this->view = new DonationView();
    }
    public function handleRequest() {
        
     
            $this->view->showForm();
        
    }
}
?>