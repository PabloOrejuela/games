<?php

namespace App\Models;

use CodeIgniter\Model;

class SistemaModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'sistemas';
    protected $primaryKey       = 'idsistemas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
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

    function _getAllSistems($result = NULL){
        
        $builder = $this->db->table($this->table);
        $builder->select('sistemas.id as idsistemas,sistema,anio,empresa.id as idempresa,empresa');
        $builder->orderBy('sistema', 'asc');
        $builder->join('empresa', 'empresa.id = sistemas.idempresa');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        return $result;
    }
}
