<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jugando extends BaseController{

    private $maxJuegosJugando = 50;
    
    public function _getJugando(){
        $jugando = $this->jugandoModel
            ->select('jugando.id as id,juego,estado,sistema,genero,updated_at,created_at,favorito')
            ->where('estado', 1)
            ->join('sistemas','sistemas.id=jugando.idsistemas')
            ->join('generos','generos.id=jugando.idgenero')
            ->findAll();

            return $jugando;
    }

    public function index(){
        $data['jugando'] = $this->_getJugando();
        //echo '<pre>'.var_export($this->maxJuegosJugando, true).'</pre>';exit;
        $data['title']='Gestión de videojuegos';
        $data['main_content']='jugando';
        return view('includes/template', $data);
    }

    function activaFavorito(){
        
        //Recibo el id
        $id = $this->request->getPostGet('id');

        $estadoFavorito = $this->jugandoModel->find($id);

        if ($estadoFavorito->favorito == 1) {
            $juego = [
            'favorito' => 0
        ];
        } else {
            $juego = [
            'favorito' => 1
        ];
        }
        
        //Cambio el estado de favorito al idjuego
        $this->jugandoModel->update($id, $juego);

        $data['resultado'] = "Exito";
        echo json_encode($data);
    }

    public function delete($id){
        
        /*$data = array(
            'id' => $this->request->getPostGet('id')
        );*/

        $this->jugandoModel->delete($id);

        $data['jugando'] = $this->_getJugando();
        
        $data['title']='Gestión de videojuegos';
        $data['main_content']='jugando';
        return view('includes/template', $data);
    }

    public function terminar_juego($id){

        $anio = date('Y');
        
        //Obtener datos del juego
        $juego = $this->jugandoModel->find($id);

        $juego->anio = $anio;
        //echo '<pre>'.var_export($juego, true).'</pre>';exit;

        //Grabo en la tabla de juegos
        $r = $this->juegoModel->_setJuegoTerminado($juego);

        //Cambio estado en la tabla jugando
        $juego = array(
            'estado' => 0,
            'favorito' => 0
        );

        if ($r) {
            $this->jugandoModel->update($id, $juego);
        }

        $data['jugando'] = $this->_getJugando();

        $data['title']='Gestión de videojuegos';
        $data['main_content']='jugando';
        return view('includes/template', $data);
    }

    public function registra_partida($id){

        $anio = date('Y');
        $juego = $this->jugandoModel->find($id);

        //Grabo en la tabla de juegos
        $this->jugandoModel->_registraPartida($juego);

        $data['jugando'] = $this->_getJugando();

        $data['title']='Gestión de videojuegos';
        $data['main_content']='jugando';
        return view('includes/template', $data);
    }

    public function insert(){
        $data['sistemas'] = $this->sistemaModel
            ->select('sistemas.id as idsistemas,sistema,anio,empresa.id as idempresa,empresa')
            ->join('empresa', 'empresa.id = sistemas.idempresa')
            ->orderBy('sistema', 'asc')
            ->findAll();
        $data['generos'] = $this->generoModel->_getGeneros();

        $data['title']='Gestión de videojuegos';
        $data['main_content']='insert';
        return view('includes/template', $data);
    }

    public function insert_new_game(){

        $anio = date('Y');
        $total_en_proceso = count($this->jugandoModel->where('estado', 1)->findAll());
        
        $data = array(
            'idsistemas' => $this->request->getPostGet('idsistemas'),
            'idgenero' => $this->request->getPostGet('genero'),
            'juego' => $this->request->getPostGet('juego')
        );

        if ($data['idsistemas'] != 0) {
            //Grabo en la tabla de juegos
            if ($total_en_proceso <= $this->maxJuegosJugando) {
                $r = $this->jugandoModel->insert($data);
            }
            
            $data['jugando'] = $this->_getJugando();

            $data['title']='Gestión de videojuegos';
            $data['main_content']='jugando';
            return view('includes/template', $data);
        }else{
            return redirect()->back();
        }  
    }

    public function archivar($id){
        
        $data = array(
            'estado' => 0
        );

        $this->jugandoModel->update($id, $data);

        $data['jugando'] = $this->_getJugando();
        
        $data['title']='Gestión de videojuegos';
        $data['main_content']='jugando';
        return view('includes/template', $data);
    }
}
