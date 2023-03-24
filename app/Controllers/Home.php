<?php

namespace App\Controllers;

class Home extends BaseController {
    public function index(){

        $data['juegos'] = $this->juegoModel->_getJuegosacabados();

        $data['title']='Gestión de videojuegos';
        $data['main_content']='home';
        return view('includes/template', $data);
    }
}
