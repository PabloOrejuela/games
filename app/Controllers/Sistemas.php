<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Sistemas extends BaseController {
    
    public function index(){
        //$data['sistemas'] = $this->sistemaModel->_getAllSistems();
        $data['sistemas'] = $this->sistemaModel
            ->select('sistemas.id as idsistemas,sistema,anio,empresa.id as idempresa,empresa')
            ->join('empresa', 'empresa.id = sistemas.idempresa')
            ->orderBy('sistema', 'asc')
            ->findAll();

        $data['title']='Mis sistemas';
        $data['main_content']='sistemas';
        return view('includes/template', $data);
    }
}
