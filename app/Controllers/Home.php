<?php

namespace App\Controllers;

class Home extends BaseController {
    public function index(){

        $data['juegos'] = $this->juegoModel->_getJuegosacabados();
        $data['total_anio'] = $this->juegoModel->_getJuegosAnio();
        $data['total_juegos_sistemas'] = $this->juegoModel->_getJuegosSistemas();

        //echo '<pre>'.var_export($data['total_anio'], true).'</pre>';exit;

        $data['title']='Gestión de videojuegos';
        $data['main_content']='home';
        return view('includes/template', $data);
    }

    public function ranking_anios(){

        $data['total_anio'] = $this->juegoModel->_getJuegosAnio();

        //echo '<pre>'.var_export($data['total_anio'], true).'</pre>';exit;

        $data['title']='Gestión de videojuegos';
        $data['main_content']='ranking_anios';
        return view('includes/template', $data);
    }

    public function ranking_sistemas(){

        $data['total_juegos_sistemas'] = $this->juegoModel->_getJuegosSistemas();

        //echo '<pre>'.var_export($data['total_anio'], true).'</pre>';exit;

        $data['title']='Gestión de videojuegos';
        $data['main_content']='ranking_sistemas';
        return view('includes/template', $data);
    }
}
