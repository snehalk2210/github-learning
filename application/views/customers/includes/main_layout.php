<?php
$this->load->view('customers/includes/header');

$this->load->view('customers/includes/left_menu');
$this->load->view('customers/includes/mobile_menu_aera');
$this->load->view($inner_view);
$this->load->view('customers/includes/footer');
?>