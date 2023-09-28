<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTiga extends Model
{
    protected $DBGroup          = 'default';

    public function tcardModel($pid,$bulan,$tahun)
    {
        $sql = "CALL tcard(?,?,?)";
        $result = $this->db->query($sql,[$pid,$bulan,$tahun])->getResultArray();
        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
     }

      public function cekin($pid)
     	{
         $sql = "CALL pcekinapk(?)";
         $data = $this->db->query($sql,[$pid])->getRowArray();
         $respond = "";
          if($data["output"]=="DUPLICATE")
           {
            $respond = "Duplicate";
           }else if($data["output"]>0)
           {
             $respond = "Success";
           }else
	   { 
             $respond="Error";
           }

          return $respond;;

      }


     public function cekout($pid)
     {
         $sql = "CALL pcekoutapk(?)";
         $data = $this->db->query($sql,[$pid])->getRowArray();
	 $respond = "";
	  if($data["output"]=="DUPLICATE")
	   {
	    $respond = "Duplicate";
	   }else if($data["output"]>0)
	   {
	     $respond = "Success";
	   }else if($data["output"]=="BELUM CHECKIN")
	   {
	     $respond="Belum Checkin";
	   }

	  return $respond;;

      }
}
