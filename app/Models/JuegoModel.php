<?php

namespace App\Models;

use CodeIgniter\Model;

class JuegoModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'juegos';
    protected $primaryKey       = 'idjuegos';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

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

    function _getJuegosacabados($result = NULL){
        
        $builder = $this->db->table($this->table);
        $builder->select('idjuegos,juego,juegos.anio as anio, created_at, updated_at, juegos.idsistemas as idsistemas, sistema, generos.genero as genero');
        $builder->orderBy('idjuegos', 'asc');
        $builder->join('sistemas', 'sistemas.idsistemas = juegos.idsistemas');
        $builder->join('generos', 'generos.id = juegos.genero');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        return $result;
    }

    function _setJuegoTerminado($juego){
        $this->db->transBegin();
        $builder = $this->db->table($this->table);
        $builder->set('juego', $juego->juego);
        $builder->set('anio', $juego->anio);
        $builder->set('genero', $juego->genero);
        $builder->set('idsistemas', $juego->idsistemas);
        $builder->insert();
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
        } else {
            $this->db->transCommit();
            return true;
        }
    }

    function _getJuegosAnio($result = NULL){
        
        $builder = $this->db->table($this->table);
        $builder->select('COUNT(idjuegos) as total, anio');
        $builder->groupBy('anio');
        $builder->orderBy('total', 'desc');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        return $result;
    }

    function _getJuegosSistemas($result = NULL){
        
        $builder = $this->db->table($this->table);
        $builder->select('COUNT(juegos.idsistemas) as total, sistema');
        $builder->join('sistemas', 'sistemas.idsistemas = juegos.idsistemas');
        $builder->groupBy('juegos.idsistemas');
        $builder->orderBy('total', 'desc');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        return $result;
    }

    function _getJuegosGeneros($result = NULL){
        
        $builder = $this->db->table($this->table);
        $builder->select('COUNT(juegos.genero) as total, generos.genero as genero');
        $builder->join('generos', 'generos.id = juegos.genero');
        $builder->groupBy('juegos.genero');
        $builder->orderBy('total', 'desc');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        return $result;
    }
}
