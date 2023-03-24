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
    protected $protectFields    = true;
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
        $builder->select('idjuegos,juego,juegos.anio as anio, created_at, updated_at, juegos.idsistemas as idsistemas, sistema');
        $builder->orderBy('idjuegos', 'asc');
        $builder->join('sistemas', 'sistemas.idsistemas = juegos.idsistemas');
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
        $builder->set('idsistemas', $juego->idsistemas);
        $builder->insert();
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
        } else {
            $this->db->transCommit();
            return true;
        }
    }
}
