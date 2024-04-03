<?php

namespace App\Models;

use CodeIgniter\Model;

class JugandoModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'jugando';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['juego', 'idsistemas', 'estado'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function _getJuegosProceso($result = NULL){
        
        $builder = $this->db->table($this->table);
        $builder->select(
            $this->table.'.id as id,
            juego,
            generos.genero as genero,
            estado,
            sistema,
            anio,
            updated_at'
        );
        $builder->where('estado', 1);
        $builder->orderBy('updated_at', 'desc');
        $builder->join('sistemas', 'sistemas.idsistemas = jugando.idsistemas');
        $builder->join('generos', 'generos.id = jugando.genero');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        return $result;
    }

    function _terminarJuego($juego){
        //Obtener los datos del juego
        
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->orderBy('id', 'asc');
        $builder->join('sistemas', 'sistemas.idsistemas = jugando.idsistemas');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        return $result;
    }

    function _registraPartida($juego){
        $fechaActual = date('Y-m-d H:i:s');
        //echo '<pre>'.var_export($fechaActual, true).'</pre>';exit;
        $builder = $this->db->table($this->table);
        $builder->set('updated_at', $fechaActual);
        $builder->where('id', $juego->id);
        $builder->update();
    }
}
