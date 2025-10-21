<?php
require_once 'models/DonationModel.php';
require_once 'views/DonationView.php';
require_once 'controllers/DonationController.php';
// ===== MAIN APPLICATION =====
$controller = new DonationController();
$controller->handleRequest();
?>