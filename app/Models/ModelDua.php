<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDua extends Model
{
    protected $DBGroup = 'spk';
    protected $primaryKey = 'pid';

    public function infostaf()
    {
        $builder = $this->db->table('informasi');
        $builder->select('tgl,judul,isi,pembuat'); 
        $builder->orderBy('id','DESC');     
        $result = $builder->get();
        if($result)
        {
            return $result->getResultArray();
        }
        else {
            return false;
        }
    } 
    
    public function gajistaf($pid,$token,$kodepr)
    {
        $builder = $this->db->table('rekapmaster as rm');
        $builder->select('p.nama,p.tglmasuk,rs.pid,d.namasub,rm.tahun,rm.bulanxs,rs.gapok,rs.tunjangan,rs.bonus,rs.gajiallin,rs.potterlambat,rs.pottidakhadir,
        rs.premihadir,rs.makan,rs.transport,rs.overtime,rs.lembur,rs.uangshift,rs.jamsostek,rs.bpjskesehatan,rs.bpjspensiun,rs.bonustambahan,
       rs.netto,rs.pph21,rs.nettodibagikan');

        $builder->join('rekapstaf as rs','rs.kodepr =rm.kodepr','left');
        $builder->join('deptview as d','rs.kodesub = d.kodesub','left');
        $builder->join('personal as p','p.pid =rs.pid','left');
        $builder->join('token as t','t.pid = rs.pid','left');
        $builder->where(['rs.pid'=>$pid,'rm.kodepr' => $kodepr,'t.password'=>$token]);
        $result = $builder->get();
        if($result)
        {
            return $result->getRowArray();
        }
        else {
            return false;
        }
    }

   
}