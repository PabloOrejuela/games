<?php
    echo view('includes/header')
        .view('includes/botonera')
        .view($main_content)
        .view('includes/footer');
    //$this->load->view('includes/footer');