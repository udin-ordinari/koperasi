<?php defined('BASEPATH') or exit('No direct script access allowed');

if (! function_exists('jasa_sukarela'))
{
	function jasa_sukarela()
	{
		return get_instance()->sistem->RowObject('nama', 'jasa-ss', 'app_jasa')->isi / get_instance()->sistem->RowObject('nama', 'pembagi-jasa-ss', 'app_jasa')->isi;
	}
}
if (! function_exists('tarikan_sukarela'))
{
	function tarikan_sukarela($user)
	{
		return get_instance()->sistem->tarikan_sukarela($user)->row();
	}
}
if (! function_exists('total_tarikan_sukarela'))
{
	function total_tarikan_sukarela()
	{
		return get_instance()->sistem->total_tarikan_sukarela()->row();
	}
}

if (!function_exists('total_kas_usp'))
{
	function total_kas_usp()
	{
		return get_instance()->transaksi->total_kas_usp();
	}
}
if (!function_exists('total_kas_induk'))
{
	function total_kas_induk()
	{
		return get_instance()->transaksi->total_kas_induk();
	}
}
if (!function_exists('get_saldo_awal'))
{
	function get_saldo_awal($kode, $unit, $periode)
	{
		$hasil = get_instance()->transaksi->get_saldo_awal($kode, $unit, $periode);
		if($hasil == NULL)
		{
			$saldo = '0';
		}
		else
		{
			$saldo = $hasil->saldo;
		}
		return $saldo;
	}
}
if (!function_exists('total_pinjaman'))
{
	function total_pinjaman($tahun)
	{
		return get_instance()->transaksi->total_pinjaman($tahun);
	}
}
if (!function_exists('total_saldo_awal_pinjaman'))
{
	function total_saldo_awal_pinjaman()
	{
		return get_instance()->transaksi->total_saldo_awal_pinjaman();
	}
}
if (!function_exists('total_pinjaman_bulanan'))
{
	function total_pinjaman_bulanan($bulan)
	{
		return get_instance()->transaksi->total_pinjaman_bulanan($bulan);
	}
}
if (!function_exists('total_simpanan'))
{
	function total_simpanan()
	{
		return get_instance()->transaksi->total_simpanan();
	}
}
if (!function_exists('total_angsuran'))
{
	function total_angsuran()
	{
		return get_instance()->transaksi->total_angsuran();
	}
}
if (!function_exists('total_pendapatan'))
{
	function total_pendapatan()
	{
		return get_instance()->transaksi->total_pendapatan();
	}
}
if (!function_exists('shu_dibagi_usp'))
{
	function shu_dibagi_usp()
	{
		return get_instance()->transaksi->shu_dibagi_usp();
	}
}
if (!function_exists('shu_dibagi_induk'))
{
	function shu_dibagi_induk($tahun)
	{
		return get_instance()->transaksi->shu_dibagi_induk($tahun);
	}
}
if (!function_exists('modal_disetor'))
{
	function modal_disetor()
	{
		return get_instance()->transaksi->modal_disetor();
	}
}
if (!function_exists('dana_pengurus_karyawan'))
{
	function dana_pengurus_karyawan()
	{
		return get_instance()->transaksi->dana_pengurus_karyawan();
	}
}
if (!function_exists('dana_pendidikan'))
{
	function dana_pendidikan()
	{
		return get_instance()->transaksi->dana_pendidikan();
	}
}
if (!function_exists('dana_sosial'))
{
	function dana_sosial()
	{
		return get_instance()->transaksi->dana_sosial();
	}
}
if (!function_exists('dana_pengembangan_daerah_kerja'))
{
	function dana_pengembangan_daerah_kerja()
	{
		return get_instance()->transaksi->dana_pengembangan_daerah_kerja();
	}
}
if (!function_exists('cadangan_modal'))
{
	function cadangan_modal()
	{
		return get_instance()->transaksi->cadangan_modal();
	}
}
if (!function_exists('get_jenis_simpanan'))
{
	function get_jenis_simpanan($key)
	{
		return get_instance()->transaksi->get_jenis_simpanan($key);
	}
}
if (!function_exists('jumlah_hasil_kode'))
{
	function jumlah_hasil_kode($kode, $unit)
	{
		return get_instance()->transaksi->jumlah_hasil_kode($kode, $unit);
	}
}
if (!function_exists('total_simpanan_pokok'))
{
	function total_simpanan_pokok($tahun)
	{
		return get_instance()->transaksi->total_simpanan_pokok($tahun);
	}
}
if (!function_exists('total_simpanan_pokok_bulanan'))
{
	function total_simpanan_pokok_bulanan($bln)
	{
		return get_instance()->transaksi->total_simpanan_pokok_periode($bln);
	}
}
if (!function_exists('total_simpanan_wajib'))
{
	function total_simpanan_wajib($tahun)
	{
		return get_instance()->transaksi->total_simpanan_wajib($tahun);
	}
}
if (!function_exists('total_simpanan_sukarela'))
{
	function total_simpanan_sukarela($tahun)
	{
		return get_instance()->transaksi->total_simpanan_sukarela($tahun);
	}
}
if (!function_exists('total_simpanan_lain'))
{
	function total_simpanan_lain($tahun)
	{
		return get_instance()->transaksi->total_simpanan_lain($tahun);
	}
}
if (!function_exists('modal_tidak_tetap'))
{
	function modal_tidak_tetap($tahun)
	{
		return get_instance()->transaksi->modal_tidak_tetap($tahun);
	}
}
if (!function_exists('cadangan_tujuan_resiko'))
{
	function cadangan_tujuan_resiko($tahun)
	{
		return get_instance()->transaksi->cadangan_tujuan_resiko($tahun);
	}
}
if (!function_exists('total_biaya_rat'))
{
	function total_biaya_rat($tahun)
	{
		return get_instance()->transaksi->total_biaya_rat($tahun);
	}
}
if (!function_exists('pendapatan_jasa_usp'))
{
	function pendapatan_jasa_usp()
	{
		return get_instance()->transaksi->pendapatan_jasa_usp();
	}
}
if (!function_exists('pendapatan_sembako'))
{
	function pendapatan_sembako($tahun)
	{
		return get_instance()->transaksi->pendapatan_sembako($tahun);
	}
}
if (!function_exists('get_jenis_pinjaman'))
{
	function get_jenis_pinjaman($key)
	{
		return get_instance()->transaksi->get_jenis_pinjaman($key);
	}
}




