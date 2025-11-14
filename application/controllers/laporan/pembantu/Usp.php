<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usp extends App_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->vars['page'] 	    = 'Laporan Pembantu';
	}
	public function index()
	{
		redirect('dashboard');
	}
	public function buku_kas()
	{
		$this->vars['title'] 	    = 'Buku Kas';
		$this->vars['content']      = 'laporan/pembantu/usp/buku-kas';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_buku_kas($bulan)
	{	
		if($bulan == '00')
		{
			echo json_encode('Silahkan Pilih Bulan');
			return;
		}	
		else
		{
			$tahun			= tahun_buku()->periode;
			$this->vars['status'] 	= 'success';
			$this->vars['bulan'] 	= $bulan;
			$this->vars['hasil'] 	= $this->db->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->where('unit', '01')->get('app_transaksi');
			$this->load->view('laporan/pembantu/usp/buku-kas-detail', $this->vars);
		}
	}

	public function bkk()
	{
		$this->vars['title'] 	    = 'Buku Kas Keluar';
		$this->vars['content']      = 'laporan/pembantu/usp/buku-kas-keluar';
		$this->load->view('templates/index', $this->vars);
	}
	public function buku_kas_keluar_usp()
	{
		$this->vars['title'] 	    = 'Buku Kas Keluar USP';
		$this->vars['content']      = 'laporan/pembantu/usp/buku-kas-keluar-usp';
		$this->load->view('templates/index', $this->vars);		
	}
	public function detail_kas_keluar($bln)
	{
		$this->vars['bln']	    = $bln;
		$this->vars['title'] 	    = 'Buku Kas Keluar USP';
		$this->vars['content']      = 'laporan/pembantu/usp/buku-kas-keluar';
		$this->load->view('template/index', $this->vars);	
	}
	public function bkm()
	{
		$this->vars['title'] 	    = 'Buku Kas Masuk';
		$this->vars['content']      = 'laporan/pembantu/usp/buku-kas-masuk';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_buku_kas_masuk($bulan)
	{	
		if($bulan == '00')
		{
			echo json_encode('Silahkan Pilih Bulan');
			return;
		}	
		else
		{
			$tahun			= tahun_buku()->periode;
			$this->vars['judule']	= 'BUKTI KAS MASUK USP';
			$this->vars['status'] 	= 'success';
			$this->vars['bulan'] 	= $bulan;
			$this->vars['hasil'] 	= $this->db->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->where('unit', '01')->get('app_transaksi');
			$this->load->view('laporan/pembantu/usp/buku-kas-masuk-detail', $this->vars);
		}
	}
	public function get_buku_kas_keluar($bulan)
	{	
		if($bulan == '00')
		{
			echo json_encode('Silahkan Pilih Bulan');
			return;
		}	
		else
		{
			$tahun			= tahun_buku()->periode;
			$this->vars['judule']	= 'BUKTI KAS KELUAR USP';
			$this->vars['status'] 	= 'success';
			$this->vars['bulan'] 	= $bulan;
			$this->vars['hasil'] 	= $this->db->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->where('unit', '01')->get('app_transaksi');
			$this->load->view('laporan/pembantu/usp/buku-kas-keluar-detail', $this->vars);
		}
	}
	public function bhk()
	{
		$this->vars['title'] 	    = 'Buku Harian Kas';
		$this->vars['content']      = 'laporan/pembantu/usp/buku-kas-harian';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_buku_kas_harian($bulan)
	{	
		if($bulan == '00')
		{
			echo json_encode('Silahkan Pilih Bulan');
			return;
		}	
		else
		{
			$tahun			= tahun_buku()->periode;
			$this->vars['judule']	= 'BUKTI KAS HARIAN USP';
			$this->vars['status'] 	= 'success';
			$this->vars['bulan'] 	= $bulan;
			$this->vars['hasil'] 	= $this->db->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->where('unit', '01')->get('app_transaksi');
			$this->load->view('laporan/pembantu/usp/buku-kas-harian-detail', $this->vars);
		}
	}
	public function rhk()
	{
		$this->vars['title'] 	    = 'Rekapitulasi Harian Kas';
		$this->vars['content']      = 'laporan/pembantu/usp/buku-rekap-harian';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_buku_rekap_harian_kas($bulan)
	{	
		if($bulan == '00')
		{
			echo json_encode('Silahkan Pilih Bulan');
			return;
		}	
		else
		{
			$tahun			= tahun_buku()->periode;
			$this->vars['judule']	= 'BUKTI REKAP KAS HARIAN USP';
			$this->vars['status'] 	= 'success';
			$this->vars['bulan'] 	= $bulan;
			$this->vars['hasil'] 	= $this->db->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->where('unit', '01')->get('app_transaksi');
			$this->load->view('laporan/pembantu/usp/buku-rekap-harian-kas-detail', $this->vars);
		}
	}
	public function bb()
	{
		$this->vars['title'] 	    = 'Buku Besar';
		$this->vars['content']      = 'laporan/pembantu/usp/buku-besar';
		$this->load->view('templates/index', $this->vars);
	}
	public function pihu()
	{
		$this->vars['title'] 	    = 'Perhitungan Hasil Usaha';
		$this->vars['content']      = 'laporan/pembantu/usp/buku-rekap-harian';
		$this->load->view('templates/index', $this->vars);
	}
	public function cashflow()
	{
		$this->vars['title'] 	    = 'Cashflow';
		$this->vars['content']      = 'laporan/akuntansi/kas';
		$this->load->view('templates/index', $this->vars);
	}
	public function usp()
	{
		$this->vars['page'] 		= 'Laporan Kas USP (Usaha Simpan Pinjam)';
		$this->vars['title'] 	   	= 'Cash Flow (Arus Kas) Periode <strong>'. session('thn_buku')->periode.'</strong>';
		$this->vars['content']      	= 'laporan/akuntansi/cashflow-usp';
		$this->load->view('templates/index', $this->vars);
	}
	public function detail_kas_usp($month)
	{	
		$this->vars['bln']		= $month;
		$this->vars['page'] 		= 'Detail Cash Flow (Arus Kas)';
		$this->vars['title'] 	   	= 'USP (Usaha Simpan Pinjam) Periode <strong>'. session('thn_buku')->periode.'</strong>';
		$hasil				= $this->db->where('MONTH(tgl)', $month)->get('app_transaksi');
		$this->vars['content']      	= 'laporan/detail-cashflow-usp';
		$this->load->view('templates/index', $this->vars);		
	}
	public function induk()
	{
		$this->vars['page'] 		= 'Laporan Kas INDUK';
		$this->vars['title'] 	    	= 'Cash Flow (Arus Kas) Periode <strong>'. session('thn_buku')->periode.'</strong>';
		$this->vars['content']      	= 'laporan/cashflow-induk';
		$this->load->view('templates/index', $this->vars);
	}
	public function detail_kas_induk($month)
	{	
		$this->vars['bln']		= $month;
		$this->vars['page'] 		= 'Detail Cash Flow (Arus Kas)';
		$this->vars['title'] 	   	= 'Unit Usaha Induk Periode <strong>'. session('thn_buku')->periode.'</strong>';
		$hasil				= $this->db->where('MONTH(tgl)', $month)->get('app_transaksi');
		$this->vars['content']      	= 'laporan/detail-cashflow-usp';
		$this->load->view('templates/index', $this->vars);		
	}
	public function neraca()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Neraca';
		$this->vars['content']      = 'laporan/neraca';
		$this->load->view('templates/index', $this->vars);
	}
	public function rugilaba()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Laba Rugi';
		$this->vars['content']      = 'laporan/laba-rugi';
		$this->load->view('templates/index', $this->vars);
	}
	public function penyusutan()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Penyusutan APH';
		$this->vars['content']      = 'laporan/penyusutan';
		$this->load->view('templates/index', $this->vars);
	}
	public function perhitungan_shu()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Formula Perhitungan SHU';
		$this->vars['content']      = 'laporan/formula-shu';
		$this->load->view('templates/index', $this->vars);
	}
	public function shu()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Sisa Hasil Usaha (SHU)';
		$this->vars['content']      = 'laporan/sisa-usaha';
		$this->load->view('templates/index', $this->vars);
	}

	public function get_kas()
	{
		$bulan = $this->input->post('bulan');
		echo json_encode($bulan);
	}
}
