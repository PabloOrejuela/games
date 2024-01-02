<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jugando extends BaseController{
    public function index(){
        $data['jugando'] = $this->jugandoModel->_getJuegosProceso();
        //echo '<pre>'.var_export($data['jugando'], true).'</pre>';exit;
        $data['title']='Gestión de videojuegos';
        $data['main_content']='jugando';
        return view('includes/template', $data);
    }

    public function delete($id){
        
        /*$data = array(
            'id' => $this->request->getPostGet('id')
        );*/

        $this->jugandoModel->delete($id);

        $data['jugando'] = $this->jugandoModel->_getJuegosProceso();
        
        $data['title']='Gestión de videojuegos';
        $data['main_content']='jugando';
        return view('includes/template', $data);
    }

    public function terminar_juego($id){

        $anio = date('Y');
        
        /*$data = array(
            'id' => $this->request->getPostGet('id')
        );*/
        //Obtener datos del juego
        $juego = $this->jugandoModel->find($id);
        $juego->anio = $anio;
        //echo '<pre>'.var_export($juego, true).'</pre>';exit;

        //Grabo en la tabla de juegos
        $r = $this->juegoModel->_setJuegoTerminado($juego);
        //Borro de los jugando
        if ($r) {
            $this->jugandoModel->delete($juego->id);
        }

        $data['jugando'] = $this->jugandoModel->_getJuegosProceso();
        $data['title']='Gestión de videojuegos';
        $data['main_content']='jugando';
        return view('includes/template', $data);
    }

    public function registra_partida($id){

        $anio = date('Y');
        $juego = $this->jugandoModel->find($id);
        $data['jugando'] = $this->jugandoModel->_getJuegosProceso();
        
        //Grabo en la tabla de juegos
        $this->jugandoModel->_registraPartida($juego);

        $data['jugando'] = $this->jugandoModel->_getJuegosProceso();
        $data['title']='Gestión de videojuegos';
        $data['main_content']='jugando';
        return view('includes/template', $data);
    }

    public function insert(){
        $data['sistemas'] = $this->sistemaModel->_getAllSistems();

        $data['title']='Gestión de videojuegos';
        $data['main_content']='insert';
        return view('includes/template', $data);
    }

    public function insert_new_game(){

        $anio = date('Y');
        $total_en_proceso = count($this->jugandoModel->_getJuegosProceso());
        
        $data = array(
            'idsistemas' => $this->request->getPostGet('idsistemas'),
            'juego' => $this->request->getPostGet('juego')
        );

        if ($data['idsistemas'] != 0) {
            //Grabo en la tabla de juegos
            if ($total_en_proceso <= 38) {
                $r = $this->jugandoModel->save($data);
            }
            

            $data['jugando'] = $this->jugandoModel->_getJuegosProceso();
            $data['title']='Gestión de videojuegos';
            $data['main_content']='jugando';
            return view('includes/template', $data);
        }else{
            return redirect()->back();
        }  
    }
}
