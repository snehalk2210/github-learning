<?php
$this->load->view('includes/header');

$this->load->view('includes/left_menu');
$this->load->view('includes/mobile_menu_area');
$this->load->view($inner_view);
$this->load->view('includes/footer');
?>