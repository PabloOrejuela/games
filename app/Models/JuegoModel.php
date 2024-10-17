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
        $builder->select('juegos.id as id,juego,juegos.anio as anio, created_at, updated_at, idsistemas, sistema, genero');
        $builder->orderBy('id', 'asc');
        $builder->join('sistemas', 'sistemas.id = juegos.idsistemas');
        $builder->join('generos', 'generos.id = juegos.idgenero');
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
        $builder->set('idgenero', $juego->idgenero);
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
        $builder->select('COUNT(id) as total, anio');
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
        $builder->select('idsistemas as id,COUNT(idsistemas) as total, sistema');
        $builder->join('sistemas', 'sistemas.id = juegos.idsistemas');
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
        $builder->select('COUNT(genero) as total, genero');
        $builder->join('generos', 'generos.id = juegos.idgenero');
        $builder->groupBy('juegos.idgenero');
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
