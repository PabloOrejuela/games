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

    public function validate_login(){
        $data = array(
            'user' => $this->request->getPostGet('user'),
            'password' => $this->request->getPostGet('password'),
        );
        
        $this->validation->setRuleGroup('login');
        
        if (!$this->validation->withRequest($this->request)->run()) {
            //Depuración
            //dd($validation->getErrors());
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }else{ 

            $usuario = $this->usuarioModel->_getUsuario($data);
            $ip = $_SERVER['REMOTE_ADDR'];
            
            if (isset($usuario) && $usuario != NULL) {
                //valido el login y pongo el id en sesion  && $usuario->id != 1 
                echo '<pre>'.var_export($usuario, true).'</pre>';
                if ($usuario->logged == 1 && $usuario->ip != $ip) {
                    //Está logueado así que lo deslogueo
                    $user = [
                        'id' => $usuario->id,
                        'is_logged' => 0,
                        'ip' => 0
                    ];
                    $this->usuarioModel->update($usuario->id, $user);
                }

                $sessiondata = [
                    //'is_logged' => 1,
                    'idusuario' => $usuario->id,
                    'user' => $usuario->user,
                ];
        
                $user = [
                    'id' => $usuario->id,
                    'logged' => 1,
                    'ip' => $ip
                ];
                
                $this->usuarioModel->update($usuario->id, $user);
                $this->session->set($sessiondata);
        
                return redirect()->to('/home');

            }else{
                $this->logout();
                return redirect()->to('/');
            }
        }
        
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function lista_juegos_sistema($id){
        
        $data['sistema'] = $this->sistemaModel->where('id', $id)->findAll();

        $data['listaJuegos'] = $this->juegoModel->select('juego,genero,juegos.anio as anio,updated_at')
                                                ->join('sistemas', 'sistemas.id=juegos.idsistemas')
                                                ->join('generos', 'juegos.idgenero=generos.id')
                                                ->where('sistemas.id', $id)->orderBy('juego', 'asc')->findAll();
                                                
        //echo $this->db->getLastQuery();

        // echo '<pre>'.var_export($data['listaJuegos'] , true).'</pre>';exit;
        $data['title']='Juegos';
        $data['main_content']='lista_juegos_sistema';
        return view('includes/template', $data);
    }

    public function ranking_sistemas(){

        $data['total_juegos_sistemas'] = $this->juegoModel->_getJuegosSistemas();

        //echo '<pre>'.var_export($data['total_juegos_sistemas'], true).'</pre>';exit;

        $data['title']='Gestión de videojuegos';
        $data['main_content']='ranking_sistemas';
        return view('includes/template', $data);
    }

    public function ranking_generos(){

        $data['total_juegos_generos'] = $this->juegoModel->_getJuegosGeneros();

        //echo '<pre>'.var_export($data['total_anio'], true).'</pre>';exit;

        $data['title']='Gestión de videojuegos';
        $data['main_content']='ranking_generos';
        return view('includes/template', $data);
    }


    public function logout(){
        //destruyo la session  y salgo
        
        $user = [
            'id' => $this->session->idusuario,
            'logged' => 0,
            'ip' => ''
        ];
        //echo '<pre>'.var_export($user, true).'</pre>';exit;
        $this->usuarioModel->_updateLoggin($user);
        $this->session->destroy();
        return redirect()->to('/');
    }
}
