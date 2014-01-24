<?php $this->load->view('includes/header.php');?>

<?php if($this->ion_auth->logged_in()){$this->load->view('includes/navigation');}else{$this->load->view('includes/navigation1');}?>

<?php $this->load->view($main_content);?>
<?php $this->load->view('includes/footer.php');?>