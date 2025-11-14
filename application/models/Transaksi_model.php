<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	private $tahun;

	public function __construct()
	{
		$this->tahun = tahun_buku()->periode;
	}
	public function notif_pinjaman_baru()
	{
		return $this->db->where('status', 'baru')->get('app_pinjaman');
	}
	public function notif_angsuran()
	{
		return $this->db->get('app_angsuran');
	}
	public function notifikasi($key)
	{
		return $this->db->where('status', 'baru')->where('id', $key)->get('app_pinjaman')->result();
	}
	public function getSimpananPerBulan()
	{
		$tahun      = @$_POST['tahun'];
		$tahun      = ($tahun ? $tahun : $this->tahun);

		$sql        = "SELECT SUM(jumlah) as total, '01' as bulan FROM app_simpanan WHERE MONTH(tgl) = '01' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
				UNION ALL
				SELECT SUM(jumlah) as total, '02' as bulan FROM app_simpanan WHERE MONTH(tgl) = '02' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
				UNION ALL
				SELECT SUM(jumlah) as total, '03' as bulan FROM app_simpanan WHERE MONTH(tgl) = '03' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
				UNION ALL
				SELECT SUM(jumlah) as total, '04' as bulan FROM app_simpanan WHERE MONTH(tgl) = '04' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
				UNION ALL
				SELECT SUM(jumlah) as total, '05' as bulan FROM app_simpanan WHERE MONTH(tgl) = '05' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
				UNION ALL
				SELECT SUM(jumlah) as total, '06' as bulan FROM app_simpanan WHERE MONTH(tgl) = '06' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
				UNION ALL
				SELECT SUM(jumlah) as total, '07' as bulan FROM app_simpanan WHERE MONTH(tgl) = '07' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
				UNION ALL
				SELECT SUM(jumlah) as total, '08' as bulan FROM app_simpanan WHERE MONTH(tgl) = '08' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
				UNION ALL
				SELECT SUM(jumlah) as total, '09' as bulan FROM app_simpanan WHERE MONTH(tgl) = '09' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
				UNION ALL
				SELECT SUM(jumlah) as total, '10' as bulan FROM app_simpanan WHERE MONTH(tgl) = '10' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
				UNION ALL
				SELECT SUM(jumlah) as total, '11' as bulan FROM app_simpanan WHERE MONTH(tgl) = '11' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
				UNION ALL
				SELECT SUM(jumlah) as total, '12' as bulan FROM app_simpanan WHERE MONTH(tgl) = '12' AND YEAR(tgl) = '".$tahun."' AND saldo_awal = '0' AND is_deleted = '0'
			";
		$query      = $this->db->query($sql);
		$results    = $query->result_array();
		return $results;
	}

	public function getPinjamanPerBulan()
	{
		$tahun      = @$_POST['tahun'];
		$tahun      = ($tahun ? $tahun : $this->tahun);
		$sql        = "SELECT SUM(jumlah) as total, '01' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '01' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
				UNION ALL
				SELECT SUM(jumlah) as total, '02' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '02' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
				UNION ALL
				SELECT SUM(jumlah) as total, '03' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '03' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
				UNION ALL
				SELECT SUM(jumlah) as total, '04' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '04' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
				UNION ALL
				SELECT SUM(jumlah) as total, '05' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '05' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
				UNION ALL
				SELECT SUM(jumlah) as total, '06' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '06' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
				UNION ALL
				SELECT SUM(jumlah) as total, '07' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '07' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
				UNION ALL
				SELECT SUM(jumlah) as total, '08' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '08' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
				UNION ALL
				SELECT SUM(jumlah) as total, '09' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '09' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
				UNION ALL
				SELECT SUM(jumlah) as total, '10' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '10' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
				UNION ALL
				SELECT SUM(jumlah) as total, '11' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '11' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
				UNION ALL
				SELECT SUM(jumlah) as total, '12' as bulan FROM app_pinjaman WHERE MONTH(tgl) = '12' AND YEAR(tgl) = '".$tahun."' AND status = 'disetujui'
			";
		$query      = $this->db->query($sql);
		$results    = $query->result_array();

		return $results;
	}

	public function getPenarikanPerBulan()
	{
		$tahun      = @$_POST['tahun'];
		$tahun      = ($tahun ? $tahun : $this->tahun);

		$sql        = "SELECT SUM(jumlah) as total, '01' as bulan FROM app_penarikan WHERE MONTH(tgl) = '01' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(jumlah) as total, '02' as bulan FROM app_penarikan WHERE MONTH(tgl) = '02' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(jumlah) as total, '03' as bulan FROM app_penarikan WHERE MONTH(tgl) = '03' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(jumlah) as total, '04' as bulan FROM app_penarikan WHERE MONTH(tgl) = '04' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(jumlah) as total, '05' as bulan FROM app_penarikan WHERE MONTH(tgl) = '05' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(jumlah) as total, '06' as bulan FROM app_penarikan WHERE MONTH(tgl) = '06' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(jumlah) as total, '07' as bulan FROM app_penarikan WHERE MONTH(tgl) = '07' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(jumlah) as total, '08' as bulan FROM app_penarikan WHERE MONTH(tgl) = '08' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(jumlah) as total, '09' as bulan FROM app_penarikan WHERE MONTH(tgl) = '09' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(jumlah) as total, '10' as bulan FROM app_penarikan WHERE MONTH(tgl) = '10' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(jumlah) as total, '11' as bulan FROM app_penarikan WHERE MONTH(tgl) = '11' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(jumlah) as total, '12' as bulan FROM app_penarikan WHERE MONTH(tgl) = '12' AND YEAR(tgl) = '".$tahun."'
			";
		$query      = $this->db->query($sql);
		$results    = $query->result_array();
		return $results;
	}

	public function getAngsuranPerBulan()
	{
		$tahun      = @$_POST['tahun'];
		$tahun      = ($tahun ? $tahun : $this->tahun);

		$sql        = "SELECT SUM(pokok) as total, '01' as bulan FROM app_angsuran WHERE MONTH(tgl) = '01' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(pokok) as total, '02' as bulan FROM app_angsuran WHERE MONTH(tgl) = '02' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(pokok) as total, '03' as bulan FROM app_angsuran WHERE MONTH(tgl) = '03' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(pokok) as total, '04' as bulan FROM app_angsuran WHERE MONTH(tgl) = '04' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(pokok) as total, '05' as bulan FROM app_angsuran WHERE MONTH(tgl) = '05' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(pokok) as total, '06' as bulan FROM app_angsuran WHERE MONTH(tgl) = '06' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(pokok) as total, '07' as bulan FROM app_angsuran WHERE MONTH(tgl) = '07' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(pokok) as total, '08' as bulan FROM app_angsuran WHERE MONTH(tgl) = '08' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(pokok) as total, '09' as bulan FROM app_angsuran WHERE MONTH(tgl) = '09' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(pokok) as total, '10' as bulan FROM app_angsuran WHERE MONTH(tgl) = '10' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(pokok) as total, '11' as bulan FROM app_angsuran WHERE MONTH(tgl) = '11' AND YEAR(tgl) = '".$tahun."'
				UNION ALL
				SELECT SUM(pokok) as total, '12' as bulan FROM app_angsuran WHERE MONTH(tgl) = '12' AND YEAR(tgl) = '".$tahun."'
			";
			
		$query      = $this->db->query($sql);
		$results    = $query->result_array();
		return $results;
	}
	public function total_kas_usp()
	{
		$salawal = get_saldo_awal('1', '01', $this->tahun);

		if($salawal == NULL)
		{
			$debetusp   	= $this->transaksi_debet_usp_bulanan('01', $this->tahun) + $this->transaksi_debet_usp_bulanan('02', $this->tahun) + $this->transaksi_debet_usp_bulanan('03', $this->tahun) + $this->transaksi_debet_usp_bulanan('04', $this->tahun) + $this->transaksi_debet_usp_bulanan('05', $this->tahun) + $this->transaksi_debet_usp_bulanan('06', $this->tahun) + $this->transaksi_debet_usp_bulanan('07', $this->tahun) + $this->transaksi_debet_usp_bulanan('08', $this->tahun) + $this->transaksi_debet_usp_bulanan('09', $this->tahun) + $this->transaksi_debet_usp_bulanan('10', $this->tahun) + $this->transaksi_debet_usp_bulanan('11', $this->tahun) + $this->transaksi_debet_usp_bulanan('12', $this->tahun);
			$kreditusp      = $this->transaksi_kredit_usp_bulanan('01', $this->tahun) + $this->transaksi_kredit_usp_bulanan('02', $this->tahun) + $this->transaksi_kredit_usp_bulanan('03', $this->tahun) + $this->transaksi_kredit_usp_bulanan('04', $this->tahun) + $this->transaksi_kredit_usp_bulanan('05', $this->tahun) + $this->transaksi_kredit_usp_bulanan('06', $this->tahun) + $this->transaksi_kredit_usp_bulanan('07', $this->tahun) + $this->transaksi_kredit_usp_bulanan('08', $this->tahun) + $this->transaksi_kredit_usp_bulanan('09', $this->tahun) + $this->transaksi_kredit_usp_bulanan('10', $this->tahun) + $this->transaksi_kredit_usp_bulanan('11', $this->tahun) + $this->transaksi_kredit_usp_bulanan('12', $this->tahun);
			$hasil 		= $salawal + $debetusp - $kreditusp;
		}
		else
		{
			$debetusp   	= $this->transaksi_debet_usp_bulanan('01', $this->tahun) + $this->transaksi_debet_usp_bulanan('02', $this->tahun) + $this->transaksi_debet_usp_bulanan('03', $this->tahun) + $this->transaksi_debet_usp_bulanan('04', $this->tahun) + $this->transaksi_debet_usp_bulanan('05', $this->tahun) + $this->transaksi_debet_usp_bulanan('06', $this->tahun) + $this->transaksi_debet_usp_bulanan('07', $this->tahun) + $this->transaksi_debet_usp_bulanan('08', $this->tahun) + $this->transaksi_debet_usp_bulanan('09', $this->tahun) + $this->transaksi_debet_usp_bulanan('10', $this->tahun) + $this->transaksi_debet_usp_bulanan('11', $this->tahun) + $this->transaksi_debet_usp_bulanan('12', $this->tahun);
			$kreditusp      = $this->transaksi_kredit_usp_bulanan('01', $this->tahun) + $this->transaksi_kredit_usp_bulanan('02', $this->tahun) + $this->transaksi_kredit_usp_bulanan('03', $this->tahun) + $this->transaksi_kredit_usp_bulanan('04', $this->tahun) + $this->transaksi_kredit_usp_bulanan('05', $this->tahun) + $this->transaksi_kredit_usp_bulanan('06', $this->tahun) + $this->transaksi_kredit_usp_bulanan('07', $this->tahun) + $this->transaksi_kredit_usp_bulanan('08', $this->tahun) + $this->transaksi_kredit_usp_bulanan('09', $this->tahun) + $this->transaksi_kredit_usp_bulanan('10', $this->tahun) + $this->transaksi_kredit_usp_bulanan('11', $this->tahun) + $this->transaksi_kredit_usp_bulanan('12', $this->tahun);
			$hasil 		= $salawal + $debetusp - $kreditusp;
		}

		return $hasil;
	}
	public function total_kas_induk()
	{
		$salawal	= get_saldo_awal('1', '02', $this->tahun);

		if(empty($salawal))
		{
			$debetinduk   	= $this->transaksi_debet_induk_bulanan('01', $this->tahun) + $this->transaksi_debet_induk_bulanan('02', $this->tahun) + $this->transaksi_debet_induk_bulanan('03', $this->tahun) + $this->transaksi_debet_induk_bulanan('04', $this->tahun) + $this->transaksi_debet_induk_bulanan('05', $this->tahun) + $this->transaksi_debet_induk_bulanan('06', $this->tahun) + $this->transaksi_debet_induk_bulanan('07', $this->tahun) + $this->transaksi_debet_induk_bulanan('08', $this->tahun) + $this->transaksi_debet_induk_bulanan('09', $this->tahun) + $this->transaksi_debet_induk_bulanan('10', $this->tahun) + $this->transaksi_debet_induk_bulanan('11', $this->tahun) + $this->transaksi_debet_induk_bulanan('12', $this->tahun);
			$kreditinduk    = $this->transaksi_kredit_induk_bulanan('01', $this->tahun) + $this->transaksi_kredit_induk_bulanan('02', $this->tahun) + $this->transaksi_kredit_induk_bulanan('03', $this->tahun) + $this->transaksi_kredit_induk_bulanan('04', $this->tahun) + $this->transaksi_kredit_induk_bulanan('05', $this->tahun) + $this->transaksi_kredit_induk_bulanan('06', $this->tahun) + $this->transaksi_kredit_induk_bulanan('07', $this->tahun) + $this->transaksi_kredit_induk_bulanan('08', $this->tahun) + $this->transaksi_kredit_induk_bulanan('09', $this->tahun) + $this->transaksi_kredit_induk_bulanan('10', $this->tahun) + $this->transaksi_kredit_induk_bulanan('11', $this->tahun) + $this->transaksi_kredit_induk_bulanan('12', $this->tahun);
			$hasil 		= $debetinduk - $kreditinduk;
		}
		else
		{
			$debetinduk   	= $this->transaksi_debet_induk_bulanan('01', $this->tahun) + $this->transaksi_debet_induk_bulanan('02', $this->tahun) + $this->transaksi_debet_induk_bulanan('03', $this->tahun) + $this->transaksi_debet_induk_bulanan('04', $this->tahun) + $this->transaksi_debet_induk_bulanan('05', $this->tahun) + $this->transaksi_debet_induk_bulanan('06', $this->tahun) + $this->transaksi_debet_induk_bulanan('07', $this->tahun) + $this->transaksi_debet_induk_bulanan('08', $this->tahun) + $this->transaksi_debet_induk_bulanan('09', $this->tahun) + $this->transaksi_debet_induk_bulanan('10', $this->tahun) + $this->transaksi_debet_induk_bulanan('11', $this->tahun) + $this->transaksi_debet_induk_bulanan('12', $this->tahun);
			$kreditinduk    = $this->transaksi_kredit_induk_bulanan('01', $this->tahun) + $this->transaksi_kredit_induk_bulanan('02', $this->tahun) + $this->transaksi_kredit_induk_bulanan('03', $this->tahun) + $this->transaksi_kredit_induk_bulanan('04', $this->tahun) + $this->transaksi_kredit_induk_bulanan('05', $this->tahun) + $this->transaksi_kredit_induk_bulanan('06', $this->tahun) + $this->transaksi_kredit_induk_bulanan('07', $this->tahun) + $this->transaksi_kredit_induk_bulanan('08', $this->tahun) + $this->transaksi_kredit_induk_bulanan('09', $this->tahun) + $this->transaksi_kredit_induk_bulanan('10', $this->tahun) + $this->transaksi_kredit_induk_bulanan('11', $this->tahun) + $this->transaksi_kredit_induk_bulanan('12', $this->tahun);
			$hasil 		= $salawal + ($debetinduk - $kreditinduk);
		}

		return $hasil;
	}
	public function total_pengajuan()
	{

	}
	public function total_pengajuan_disetujui()
	{

	}
	public function total_pengajuan_ditolak()
	{

	}
	public function total_pengajuan_ulang()
	{

	}
	public function transaksi_debet_usp_bulanan($month)
	{
		$debet 		= $this->db->select_sum('jumlah', 'total')->where('MONTH(tgl)', $month)->where('YEAR(tgl)', $this->tahun)->where('jenis', 'debet')->where('unit', '01')->get('app_transaksi')->row();
		$simpanan	= $this->db->select_sum('jumlah', 'total')->where('MONTH(tgl)', $month)->where('YEAR(tgl)', $this->tahun)->where('saldo_awal', '0')->where('is_deleted', '0')->get('app_simpanan')->row();
		$angsuran	= $this->db->select_sum('pokok', 'total')->where('MONTH(tgl)', $month)->where('YEAR(tgl)', $this->tahun)->get('app_angsuran')->row();
		$swp		= $this->db->select_sum('swp', 'total')->where('MONTH(tgl)', $month)->where('YEAR(tgl)', $this->tahun)->get('app_pinjaman')->row();
		$rsk		= $this->db->select_sum('rsk', 'total')->where('MONTH(tgl)', $month)->where('YEAR(tgl)', $this->tahun)->get('app_pinjaman')->row();

		$hasilnya 	= $debet->total + $simpanan->total + $angsuran->total + $swp->total + $rsk->total;
		return $hasilnya;
	}
	public function transaksi_kredit_usp_bulanan($month)
	{
		$kre 		= $this->db->select("SUM(jumlah) AS total")->where('MONTH(tgl)', $month)->where('YEAR(tgl)', $this->tahun)->where('jenis', 'kredit')->where('unit', '01')->get('app_transaksi')->row();
		$pin 		= $this->db->select("SUM(jumlah) AS total")->where('MONTH(tgl)', $month)->where('YEAR(tgl)', $this->tahun)->where('status', 'disetujui')->get('app_pinjaman')->row();
		$pen 		= $this->db->select("SUM(jumlah) AS total")->where('MONTH(tgl)', $month)->where('YEAR(tgl)', $this->tahun)->get('app_penarikan')->row();
		$tutup 		= $this->db->select("SUM(jumlah) AS total")->where('MONTH(tgl)', $month)->where('YEAR(tgl)', $this->tahun)->get('app_penutupan')->row();

		$hasilnya 	= $kre->total + $pen->total + $pin->total + $tutup->total;
		return $hasilnya;
	}
	public function transaksi_debet_induk_bulanan($month)
	{
		$debet = $this->db->select_sum('jumlah', 'total')->where('MONTH(tgl)', $month)->where('YEAR(tgl)', $this->tahun)->where('jenis', 'debet')->where('unit', '02')->get('app_transaksi')->row();
		return $debet->total;
	}
	public function transaksi_kredit_induk_bulanan($month)
	{
		$kredit		= $this->db->select_sum('jumlah', 'total')->where('MONTH(tgl)', $month)->where('YEAR(tgl)', $this->tahun)->where('jenis', 'kredit')->where('unit', '02')->get('app_transaksi')->row();
		return $kredit->total;
	}
	public function get_saldo_awal($kode, $unit, $periode)
	{
		$a = $this->db->where('akun_id', $kode)->where('unit', $unit)->where('tahun', $periode)->get('app_saldo_awal')->row();
		if($a == '')
		{
			$hasil = $a;
		}
		else
		{
			$hasil = $a;
		}
		return $hasil;
	}
	public function total_saldo_awal_pinjaman()
	{
		$hasil = $this->db->select_sum('pokok', 'total_pokok')->select_sum('bunga', 'total_bunga')->get('app_pinjaman_lalu')->row();
		if($hasil->total_pokok == null || $hasil->total_bunga == null)
		{
			$query  = '0'; 
		}
		else
		{
			$query = $hasil->total_pokok + $hasil->total_bunga;
		}
		return $query;
	}
	public function total_pinjaman($tahun)
	{
		$hasil = $this->db->select_sum('jumlah', 'total')->where('YEAR(tgl)', $tahun)->where('status', 'disetujui')->get('app_pinjaman')->row();
		if(empty($hasil->total))
		{
			$query  = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
	public function total_pinjaman_bulanan($bulan)
	{
		$hasil = $this->db->select_sum('jumlah', 'total')->where('MONTH(tgl)', $bulan)->where('status', 'disetujui')->get('app_pinjaman')->row();
		if(empty($hasil->total))
		{
			$query  = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
	public function total_simpanan()
	{
		$hasil = $this->db->select_sum('jumlah', 'total')->get('app_simpanan')->row();
		if(empty($hasil->total))
		{
			$query  = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
	public function total_penarikan()
	{
		$hasil = $this->db->select_sum('jumlah', 'total')->get('app_penarikan')->row();
		if(empty($hasil->total))
		{
			$query  = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
	public function total_awal_simpanan()
	{
		$hasil = $this->db->select_sum('jumlah', 'total')->where('saldo_awal', '1')->get('app_simpanan')->row();
		if(empty($hasil->total))
		{
			$query  = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
	public function total_piutang_terbayar()
	{
		$hasil = $this->db->select_sum('pokok', 'total')->where('jenis =', 'piutang_awal')->get('app_angsuran')->row();
		if(empty($hasil->total))
		{
			$query  = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
	public function total_angsuran()
	{
		$hasil = $this->db->select_sum('pokok', 'total')->where('jenis =', 'cicilan')->get('app_angsuran')->row();
		if(empty($hasil->total))
		{
			$query  = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
	public function total_pelunasan()
	{
		$hasil = $this->db->select_sum('pokok', 'total')->where('jenis =', 'pelunasan')->get('app_angsuran')->row();
		if(empty($hasil->total))
		{
			$query  = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
	public function pendapatan_jasa_usp()
	{
		$angsuran  = $this->db->select_sum('bunga', 'total')->where('YEAR(tgl)', $this->tahun)->get('app_angsuran')->row();	
	
		return $angsuran->total;
	}
	public function pendapatan_jasa_induk()
	{	
		$sembako   = $this->db->select_sum('jumlah', 'total')->where('YEAR(tgl)', $this->tahun)->where('akun_id', '13')->get('app_transaksi')->row();	
		$lainnya   = $this->db->select_sum('jumlah', 'total')->where('YEAR(tgl)', $this->tahun)->where('akun_id', '14')->get('app_transaksi')->row();
		return $sembako->total + $lainnya->total;
	}
	public function total_pendapatan()
	{
		return $hasil = '0';
	}
	public function shu_dibagi_usp()
	{
		$hasil  = $this->pendapatan_jasa_usp();	
		return $hasil;
	}
	public function total_shu_induk()
	{
		$hasil  = $this->pendapatan_jasa_induk() + $this->modal_disetor();	
		return $hasil;
	}
	public function shu_dibagi_induk()
	{
		$hasil  = ($this->total_shu_induk() /100) * 50;	
		return $hasil;
	}
	public function modal_disetor()
	{
		$hasil  = ($this->pendapatan_jasa_usp() / 100) * 25;	
		return $hasil;		
	}
	public function modal_tidak_tetap($tahun)
	{
		$salawal = get_saldo_awal('7', '01', $tahun);

		if(empty($salawal))
		{
			$pokok 		= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row();
			$wajib 		= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '2')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row();
			$hasil 		= $pokok->total + $wajib->total;
		}
		else
		{
			$hasil		= $salawal;
		}		
		return $hasil;
	}

	public function dana_pengurus_karyawan()
	{
		$hasil  = ($this->pendapatan_jasa_usp() / 100) * 10;	
		return $hasil;		
	}
	public function dana_pendidikan()
	{
		$bagi   = $this->modal_disetor() + '0';
		$hasil  = ($bagi / 100) * 5;	
		return $hasil;		
	}
	public function dana_sosial()
	{
		$bagi   = $this->modal_disetor() + '0';
		$hasil  = ($bagi / 100) * 2.5;	
		return $hasil;		
	}
	public function dana_pengembangan_daerah_kerja()
	{
		$bagi   = $this->modal_disetor() + '0';
		$hasil  = ($bagi / 100) * 2.5;	
		return $hasil;		
	}
	public function cadangan_modal()
	{
		$bagi   = $this->modal_disetor() + '0';
		$hasil  = ($bagi / 100) * 30;	
		return $hasil;		
	}
	public function jumlah_hasil_kode($kode, $unit)
	{
		$hasil  = $this->db->select_sum('jumlah', 'total')->where('akun_id', $kode)->where('unit', $unit)->where('YEAR(tgl)', $this->tahun)->get('app_transaksi')->row();
		if($hasil == 'NULL')
		{
			$query = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
	public function pembelian_sembako($tahun)
	{
		$hasil = $this->db->select_sum('jumlah', 'total')->where('akun_id', '33')->where('unit', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
		if($hasil == 'NULL')
		{
			$query = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
	public function penjualan_sembako($tahun)
	{
		$hasil = $this->db->select_sum('jumlah', 'total')->where('akun_id', '34')->where('unit', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
		if($hasil == 'NULL')
		{
			$query = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
	public function pendapatan_sembako($tahun)
	{
		$hasil = $this->db->select_sum('jumlah', 'total')->where('akun_id', '13')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
		if($hasil == 'NULL')
		{
			$query = '0';
		}
		else
		{
			$query = $hasil->total;
		}
		return $query;
	}
 	public function total_simpanan_pokok($tahun)
	{
		$salawal = get_saldo_awal('28', '02', $tahun);

		if(empty($salawal))
		{
			$hasil 		= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row()->total;
		}
		else
		{
			$hasil		= $salawal;
		}		
		return $hasil;
	}
	public function total_simpanan_pokok_periode($month)
	{
		return $this->db->select_sum('jumlah', 'total')->where('MONTH(tgl)', $month)->where('YEAR(tgl) <=', $this->tahun)->where('jns_simp', '1')->where('saldo_awal', '0')->get('app_simpanan')->row();
	}
	public function total_simpanan_wajib_periode($month)
	{
		return $this->db->select_sum('jumlah', 'total')->where('MONTH(tgl)', $month)->where('YEAR(tgl) <=', $this->tahun)->where('jns_simp', '2')->where('saldo_awal', '0')->get('app_simpanan')->row();
	}
	public function total_simpanan_sukarela($tahun)
	{
		$salawal = get_saldo_awal('6', '01', $tahun);

		if(empty($salawal))
		{
			$hasil 		= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '3')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row()->total;
		}
		else
		{
			$hasil		= $salawal;
		}		
		return $hasil;
	}
	public function total_simpanan_lain($tahun)
	{
		$salawal = get_saldo_awal('7', '01', $tahun);

		if(empty($salawal))
		{
			$hasil 		= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '4')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row()->total;
		}
		else
		{
			$hasil		= $salawal;
		}		
		return $hasil;
	}
	public function total_simpanan_wajib($tahun)
	{
		$salawal = get_saldo_awal('29', '02', $tahun);

		if(empty($salawal))
		{
			$hasil 		= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '2')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row()->total;
		}
		else
		{
			$hasil		= $salawal;
		}		
		return $hasil;
	}
	public function cadangan_tujuan_resiko($tahun)
	{
		return $this->db->select_sum('rsk', 'total')->where('YEAR(tgl)', $tahun)->get('app_pinjaman')->row()->total;
	}
	public function total_biaya_rat($tahun)
	{
		return $this->db->select_sum('jumlah', 'total')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row()->total;
	}
	public function get_jenis_simpanan($id)
	{
		$query = $this->db->where('id', $id)->get('app_jns_simp');
		if ($query->num_rows() === 1)
		{
			$result = $query->row();
			return $result;
		}
		return '';
	}
	public function get_jenis_pinjaman($id)
	{
		$query = $this->db->where('id', $id)->get('app_jns_pinj');
		if ($query->num_rows() === 1)
		{
			$result = $query->row();
			return $result;
		}
		return '';
	}

	public function kode_trans($id, $unit,  $tahun)
	{
		$salawal	= get_saldo_awal($id, $unit, $tahun);

		if($salawal == '')
		{
			$debetusp   	= $this->transaksi_debet_usp_bulanan('01', $tahun) + $this->transaksi_debet_usp_bulanan('02', $tahun) + $this->transaksi_debet_usp_bulanan('03', $tahun) + $this->transaksi_debet_usp_bulanan('04', $tahun) + $this->transaksi_debet_usp_bulanan('05', $tahun) + $this->transaksi_debet_usp_bulanan('06', $tahun) + $this->transaksi_debet_usp_bulanan('07', $tahun) + $this->transaksi_debet_usp_bulanan('08', $tahun) + $this->transaksi_debet_usp_bulanan('09', $tahun) + $this->transaksi_debet_usp_bulanan('10', $tahun) + $this->transaksi_debet_usp_bulanan('11', $tahun) + $this->transaksi_debet_usp_bulanan('12', $tahun);
			$kreditusp      = $this->transaksi_kredit_usp_bulanan('01', $tahun) + $this->transaksi_kredit_usp_bulanan('02', $tahun) + $this->transaksi_kredit_usp_bulanan('03', $tahun) + $this->transaksi_kredit_usp_bulanan('04', $tahun) + $this->transaksi_kredit_usp_bulanan('05', $tahun) + $this->transaksi_kredit_usp_bulanan('06', $tahun) + $this->transaksi_kredit_usp_bulanan('07', $tahun) + $this->transaksi_kredit_usp_bulanan('08', $tahun) + $this->transaksi_kredit_usp_bulanan('09', $tahun) + $this->transaksi_kredit_usp_bulanan('10', $tahun) + $this->transaksi_kredit_usp_bulanan('11', $tahun) + $this->transaksi_kredit_usp_bulanan('12', $tahun);
			$hasil 		= $debetusp - $kreditusp;
		}
		else
		{
			$hasil 		= $salawal;
		}

		return $hasil;
	}
	public function kode_transaksi($id, $unit,  $tahun)
	{
		$salawal	= get_saldo_awal($id, $unit, $tahun);

		if($salawal == '')
		{
			$debetusp   	= $this->transaksi_debet_usp_bulanan('01', $tahun) + $this->transaksi_debet_usp_bulanan('02', $tahun) + $this->transaksi_debet_usp_bulanan('03', $tahun) + $this->transaksi_debet_usp_bulanan('04', $tahun) + $this->transaksi_debet_usp_bulanan('05', $tahun) + $this->transaksi_debet_usp_bulanan('06', $tahun) + $this->transaksi_debet_usp_bulanan('07', $tahun) + $this->transaksi_debet_usp_bulanan('08', $tahun) + $this->transaksi_debet_usp_bulanan('09', $tahun) + $this->transaksi_debet_usp_bulanan('10', $tahun) + $this->transaksi_debet_usp_bulanan('11', $tahun) + $this->transaksi_debet_usp_bulanan('12', $tahun);
			$kreditusp      = $this->transaksi_kredit_usp_bulanan('01', $tahun) + $this->transaksi_kredit_usp_bulanan('02', $tahun) + $this->transaksi_kredit_usp_bulanan('03', $tahun) + $this->transaksi_kredit_usp_bulanan('04', $tahun) + $this->transaksi_kredit_usp_bulanan('05', $tahun) + $this->transaksi_kredit_usp_bulanan('06', $tahun) + $this->transaksi_kredit_usp_bulanan('07', $tahun) + $this->transaksi_kredit_usp_bulanan('08', $tahun) + $this->transaksi_kredit_usp_bulanan('09', $tahun) + $this->transaksi_kredit_usp_bulanan('10', $tahun) + $this->transaksi_kredit_usp_bulanan('11', $tahun) + $this->transaksi_kredit_usp_bulanan('12', $tahun);
			$hasil 		= $debetusp - $kreditusp;
		}
		else
		{
			$debetusp   	= $this->transaksi_debet_usp_bulanan('01', $tahun) + $this->transaksi_debet_usp_bulanan('02', $tahun) + $this->transaksi_debet_usp_bulanan('03', $tahun) + $this->transaksi_debet_usp_bulanan('04', $tahun) + $this->transaksi_debet_usp_bulanan('05', $tahun) + $this->transaksi_debet_usp_bulanan('06', $tahun) + $this->transaksi_debet_usp_bulanan('07', $tahun) + $this->transaksi_debet_usp_bulanan('08', $tahun) + $this->transaksi_debet_usp_bulanan('09', $tahun) + $this->transaksi_debet_usp_bulanan('10', $tahun) + $this->transaksi_debet_usp_bulanan('11', $tahun) + $this->transaksi_debet_usp_bulanan('12', $tahun);
			$kreditusp      = $this->transaksi_kredit_usp_bulanan('01', $tahun) + $this->transaksi_kredit_usp_bulanan('02', $tahun) + $this->transaksi_kredit_usp_bulanan('03', $tahun) + $this->transaksi_kredit_usp_bulanan('04', $tahun) + $this->transaksi_kredit_usp_bulanan('05', $tahun) + $this->transaksi_kredit_usp_bulanan('06', $tahun) + $this->transaksi_kredit_usp_bulanan('07', $tahun) + $this->transaksi_kredit_usp_bulanan('08', $tahun) + $this->transaksi_kredit_usp_bulanan('09', $tahun) + $this->transaksi_kredit_usp_bulanan('10', $tahun) + $this->transaksi_kredit_usp_bulanan('11', $tahun) + $this->transaksi_kredit_usp_bulanan('12', $tahun);
			$hasil 		= $salawal + ($debetusp - $kreditusp);
		}

		return $hasil;
	}
}