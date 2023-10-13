<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSatu extends Model
{
    protected $DBGroup = 'default';
    protected $primaryKey = 'pid';

    public function loginModel($pid,$pass)
    {
        $builder = $this->db->table('personal');
        $builder->select('pid,nama,gedung,kodebagian');
        $builder->where(['pid'=>$pid,'password' => $pass]);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        } else {
            return false;
        }
    }


    public function teknisi($gedung,$kodebagian)
    {
	    $builder = $this->db->table('personal');
	    $builder->select('pid,nama,hp');
	    $builder->where(['gedung'=>$gedung,'kodebagian'=>$kodebagian]);
       	    $result = $builder->get();
	    if($result)
	    {
	        return $result->getResultArray();
	    }
	    else
	    {
	        return false;
	    }

    }

    public function lokasi($gedung)
    {
        $builder = $this->db->table('lokasi');
        $builder->select('nama');
        $builder->where(['gedung'=>$gedung]);
        $result = $builder->get();
        if($result)
        {
            return $result->getResultArray();
        }
        else {
            return false;
        }
    }

    public function versi()
    {
        $builder = $this->db->table('versi');
        $builder->select('buildversion');
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        } else {
            return false;
        }

    }

    public function kirimtiket($kodebarang,$namabarang,$keluhan,$lokasi,$gedung,$pengirim,$teknisi,$statkirim)
    {
       $jam = date('His');
       $validasi = $namabarang.'-'.$lokasi.'-'.$gedung.'-'.$pengirim.'-'.$jam; 
       $tgl = date("Y-m-d H:i:s");
       if($statkirim=="SENT")
       {
            $statuskirim = 'SENT';
       }
       else 
       {
            $statuskirim = 'ANTRI';
       }
       $builder = $this->db->table('tickets');
       $insert = $builder->insert(['tgl'=>$tgl,'kodebarang'=>strtoupper($kodebarang),
       'namabarang'=>strtoupper($namabarang),'keluhan'=>strtoupper($keluhan),'statuskirim'=>$statuskirim,'lokasi'=>strtoupper($lokasi),'gedung'=>$gedung,'pengirim'=>$pengirim,'teknisi'=>$teknisi,'statustiket'=>'OPEN','baca'=>'F','validasi'=>strrev($validasi)]);

       if($insert)
       {
            return true;
       }
       else
       {
            return false;
       }
    }

    public function tiket($gedung)
    {
        $builder = $this->db->table('tickets');
        $builder->select('*');
        $builder->where(['gedung'=>$gedung]);
        $result = $builder->get();
        if($result)
        {
            return $result->getResultArray();
        }
        else {
            return false;
        }
    }

    public function mytiket($pid)
    {
        $builder = $this->db->table('tickets');
        $builder->select('notiket,nama,tgl,namabarang,keluhan,lokasi,pengirim,baca,statustiket,mulai,selesai');
        $builder->join('personal','teknisi=pid','left');
        $builder->where(['pid'=>$pid,'statusstaf' => 'T']);
        $result = $builder->get();
        if($result)
        {
            return $result->getResultArray();
        }
        else {
            return false;
        }
    }

    public function tiketaction($no)
    {
        $builder = $this->db->table('tickets');
        $builder->select('notiket,namabarang,lokasi,keluhan,nama,bagian,statustiket');
	$builder->join('personal','pid=pengirim','left');
        $builder->where(['notiket'=>$no]);
        $result = $builder->get();
        if($result)
        {
            return $result->getRowArray();
	  //return $result->getResultArray();
        }
        else {
            return false;
        }
    }

    public function tiketopen($pid)
    {

        $builder = $this->db->table('tickets');
        $builder->select('notiket,nama,tgl,namabarang,keluhan,lokasi,pengirim,baca,statustiket,mulai,selesai');
        $builder->join('personal','pengirim=pid','left');
        $builder->where(['pid'=>$pid,'statustiket' => 'OPEN']);
        $result = $builder->get();
        if($result)
        {
            return $result->getResultArray();
        }
        else {
            return false;
        }

    }


    public function onesend()
    {
        $builder = $this->db->table('pengirim');
        $builder->select('alamat,rahasia');
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        } else {
            return false;
        }

    }

    public function tiketstart($no)
    {
		$skrg = date('Y-m-d H:i:s');
        $builder = $this->db->table('tickets');
        $result = $builder->set('mulai',$skrg);
        $result = $builder->set('statustiket','START');
        $builder->where('notiket',$no);	
        $builder->update();
        return $this->db->affectedRows();
    }

    public function absen($pid,$tahun)
    {
        $builder = $this->db->table('absen');
        $builder->select('*');
        $builder->where(['pid'=>$pid,'YEAR(tgl)' => $tahun]);
        $result = $builder->get();
        if($result)
        {
            return $result->getResultArray();
        }
        else {
            return false;
        }
    }

    public function info()
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
    public function gajiop($pid,$kodepr)
    {
        $builder = $this->db->table('rekapgajiview');
        $builder->select('*,SUM(premihadir+makan+transport+uangshift+bonus) as totaltunjangan,SUM(pph21+jamsostek+bpjs) as totalpotongan');
        $builder->join('profilepabrik','kodepr =kodepr','cross');
        $builder->where(['pid'=>$pid,'kodepr' => $kodepr]);
        $result = $builder->get();
        if($result)
        {
            return $result->getRowArray();
        }
        else {
            return false;
        }
    }

    public function saran($pid)
    {
        $builder = $this->db->table('saran');
        $builder->select('*');
        $builder->where(['nama'=>$pid]);
        $result = $builder->get();
        if($result)
        {
            return $result->getResultArray();
        }
        else {
            return false;
        }
    } 

    public function kirimsaran($pid,$isi)
    {
        $tgl = date("Y-m-d H:i:s");
        $builder = $this->db->table('saran');
        $insert=$builder->insert(['TGL'=>$tgl,'NAMA'=>$pid,'ISI'=>$isi]);
        if($insert) 
        {
            return true;
        }
        else 
        {
            return false;
        }

    }

    public function cutistaf($pid)
    {

	$bln = date("m");
	$thn = date("Y");
        $builder = $this->db->table('cutistaff');
        $builder->select('cutitahunan');
        $builder->where('pid',$pid);
	$builder->where('bulan',$bln);
	$builder->where('tahun',$thn); 
 	$result = $builder->get();
        if($result)
        {
            return $result->getRowArray();
        }
        else 
        {
            return false;
        }
    }




}
