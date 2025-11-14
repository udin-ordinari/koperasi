<?php defined('BASEPATH') OR exit('No direct script access allowed');

class System_model extends CI_Model {

	public static $pk = 'id';
	public static $table = 'app_system';

	public function __construct()
	{

	}
	public function get_setting_values($key)
	{
		$query = $this->db->where('nama', $key)->limit(1)->get(self::$table);
		if ($query->num_rows() === 1)
		{
			$result = $query->row();
			return $result->isi;
		}
		return '';
	}
	public function RowObject($key, $value, $table)
	{
		return $this->db->where($key, $value)->get($table)->row();
	}
	public function enum_select($table, $field)
	{
		$enums = [];
		$query = "SHOW COLUMNS FROM ".$table." LIKE '$field'";
        	$row = $this->db->query("SHOW COLUMNS FROM ".$table." LIKE '$field'")->row()->Type;
        	$regex = "/'(.*?)'/";
        	preg_match_all( $regex , $row, $enum_array );
        	$enum_fields = $enum_array[1];
        	foreach ($enum_fields as $key=>$value)
        	{
			$enums[$value] = $value;
		}
		return $enums;
	}
	public function dropdown($table)
	{
		$query = $this->db->get($table);
		$dataset = [];
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$dataset[$row->id] = $row->nama.' - '.$row->keterangan;
			}
		}
		return $dataset;
	}
	public function dropdowne($table)
	{
		$query = $this->db->get($table);
		$dataset = [];
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$dataset[$row->id] = $row->nama;
			}
		}
		return $dataset;
	}
	public function select_dropdown($table)
	{
		$query = $this->db->get($table);
		$dataset = [];
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$dataset[$row->id] = $row->nama;
			}
		}
		return $dataset;
	}
	public function akun_akuntansi($table)
	{
		$query = $this->db->get($table);
		$dataset = [];
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$dataset[$row->tipe.'.'.$row->jenis.'.'.$row->code] = $row->nama;
			}
		}
		return $dataset;
	}
	public function select_level($table)
	{
		$query = $this->db->where('id >', '1')->get($table);
		$dataset = [];
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$dataset[$row->id] = $row->nama;
			}
		}
		return $dataset;
	}
	public function selectdropdown($table)
	{
		$query = $this->db->get($table);
		$dataset = [];
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$dataset[$row->id] = $row->nama;
			}
		}
		return $dataset;
	}
	public function thn_buku()
	{
		return $this->db->where('active', '1')->get('app_thn_buku')->row();
	}
	public function is_exists($key, $value, $table)
	{
		$count = $this->db->where($key, $value)->count_all_results($table);
		return $count > 0;
	}
	public function update($id, $table, array $dataset)
	{
		$this->db->trans_start();
		$this->db->where(self::$pk, $id)->update($table, $dataset);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
	public function ubah_pengurus($id)
	{
		$query = $this->db->select('*')->where('id', $id)->limit(1)->get('app_pengurus');
		if ($query->num_rows() === 1)
		{
			$result = $query->row();
			return $result;
		}
		return '';
	}

	public function selected($table)
	{
		$query = $this->db->get($table);
		$dataset = [];
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$dataset[$row->id] = $row->nama.' - '.$row->keterangan;
			}
		}
		return $dataset;
	}
	public function kodeotomatis($table, $prefix)
	{
		$this->db->select('RIGHT('.$table.'.code,2) as code', FALSE);
		$this->db->order_by('code','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get($table);
		if($query->num_rows() <> 0)
		{      
			$data = $query->row();
			$code = intval($data->code) + 1; 
		}
		else
		{      
			$code = 1;  
		}
		$batas = str_pad($code, 2, "0", STR_PAD_LEFT);    
		$kodetampil = $prefix.$batas;
		return $kodetampil;  
	}
	public function kodeoto($table, $prefix)
	{
		$this->db->select('LEFT('.$table.'.code,1) as code', FALSE);
		$this->db->order_by('code','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get($table);
		if($query->num_rows() <> 0)
		{      
			$data = $query->row();
			$code = intval($data->code) + 1; 
		}
		else
		{      
			$code = 1;  
		}
		$batas = str_pad($code, 1, "0", STR_PAD_LEFT);    
		$kodetampil = $batas.$prefix;
		return $kodetampil;  
	}
	public function kodesimpanan()
	{
		$this->db->select('RIGHT(app_simpanan.kode,10) as kode', FALSE);
		$this->db->order_by('kode','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('app_simpanan');
		if($query->num_rows() <> 0)
		{      
			$data = $query->row();
			$kode = intval($data->kode) + 1; 
		}
		else
		{      
			$kode = 1;  
		}
		$batas = str_pad($kode, 10, "0", STR_PAD_LEFT);    
		$kodetampil = $batas;
		return $kodetampil;  
	}
	public function kodepenarikan()
	{
		$this->db->select('RIGHT(app_penarikan.kode,5) as kode', FALSE);
		$this->db->order_by('kode','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('app_penarikan');
		if($query->num_rows() <> 0)
		{      
			$data = $query->row();
			$kode = intval($data->kode) + 1; 
		}
		else
		{      
			$kode = 1;  
		}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		$kodetampil = "PNS-".date("y").''.date("m").''.date("d").'-'.$batas;
		return $kodetampil;  
	}
	public function kodepenutupan()
	{
		$this->db->select('RIGHT(app_penutupan.kode,6) as kode', FALSE);
		$this->db->order_by('kode','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('app_penutupan');
		if($query->num_rows() <> 0)
		{      
			$data = $query->row();
			$kode = intval($data->kode) + 1; 
		}
		else
		{      
			$kode = 1;  
		}
		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);    
		$kodetampil = $batas;
		return $kodetampil;  
	}
	public function CreateCode()
	{
		$this->db->select('RIGHT(app_pinjaman.kode,6) as kode', FALSE);
		$this->db->order_by('kode','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('app_pinjaman');
		if($query->num_rows() <> 0)
		{      
			$data = $query->row();
			$kode = intval($data->kode) + 1; 
		}
		else
		{      
			$kode = 1;  
		}
		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);    
		$kodetampil = "PNJ-".date("y").''.date("m").''.date("d").'-'.$batas;
		return $kodetampil;  
	}
	public function kodepiutang($table)
	{
		$this->db->select('RIGHT('.$table.'.kode,10) as kode', FALSE);
		$this->db->order_by('kode','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get($table);
		if($query->num_rows() <> 0)
		{      
			$data = $query->row();
			$kode = intval($data->kode) + 1; 
		}
		else
		{      
			$kode = 1;  
		}
		$batas = str_pad($kode, 10, "0", STR_PAD_LEFT);    
		$kodetampil = $batas;
		return $kodetampil;  
	}
	public function delete_permanently($key, $value, $table)
	{
		$this->db->trans_start();
		$this->db->where($key, $value)->delete($table);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
	public function batch_data($table, $data, $where)
	{
		$this->db->trans_start();
		$this->db->update_batch($table, $data, $where);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
     			return false;
		}
		else
		{
    			return true;
		}
	}
	public function trxotomatis()
	{
		$this->db->select('RIGHT(app_transaksi.kode, 10) as kode', FALSE);
		$this->db->order_by('kode', 'DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('app_transaksi');
		if($query->num_rows() <> 0)
		{      
			$data = $query->row();
			$kode = intval($data->kode) + 1; 
		}
		else
		{      
			$kode = 1;  
		}
		$batas = str_pad($kode, 10, '0', STR_PAD_LEFT);    
		$tampil = 'TRX-'.date("y").''.date("m").''.date("d").'-'.$batas;
		return $tampil;  
	}

}
