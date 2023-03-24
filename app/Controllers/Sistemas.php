<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Sistemas extends BaseController {
    
    public function index(){
        $data['sistemas'] = $this->sistemaModel->_getAllSistems();

        $data['title']='Mis sistemas';
        $data['main_content']='sistemas';
        return view('includes/template', $data);
    }
}
