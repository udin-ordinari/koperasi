<?php defined('BASEPATH') or exit('No direct script access allowed');

if ( ! function_exists('session'))
{
	function session($session)
	{
		return get_instance()->session->userdata($session);
	}
}
if (! function_exists('get_ip_address'))
{
	function get_ip_address()
	{
		return getenv('HTTP_X_FORWARDED_FOR') ? getenv('HTTP_X_FORWARDED_FOR') : getenv('REMOTE_ADDR');
	}
}
if (!function_exists('get_setting'))
{
	function get_setting($key)
	{
		return get_instance()->sistem->get_setting_values($key);
	}
}
if (!function_exists('get_logo'))
{
	function get_logo($key)
	{
		return get_instance()->sistem->get_logo_values($key);
	}
}
if (!function_exists('get_level'))
{
	function get_level($id)
	{
		return get_instance()->db->get_where('app_groups', array('id' => $id))->row();
	}
}
if ( ! function_exists('menu_level'))
{
	function menu_level($group_id)
	{
		return get_instance()->users_model->get_user_privileges($group_id)->result();
	}
}
if ( ! function_exists('get_modules'))
{
	function get_modules($key)
	{
		return get_instance()->sistem->RowObject('id', $key, 'app_menus');
	}
}
if (! function_exists('modules')) {
	function modules($key = '')
	{
		$modules = [];
		return $key == '' ? $modules : $modules[$key];
	}
}

if (!function_exists('enum_select'))
{
	function enum_select($table, $field)
	{
		return get_instance()->sistem->enum_select($table, $field);
	}
} 
if ( ! function_exists('dropdown'))
{
	function dropdown($table)
	{
		return get_instance()->sistem->select_dropdown($table);
	}
}
if (!function_exists('get_anggota'))
{
	function get_anggota($user_id)
	{
		return get_instance()->users_model->get_data_anggota($user_id);
	}
}
if (!function_exists('get_online'))
{
	function get_online($user_id)
	{
		return get_instance()->users_model->get_data_anggota_online($user_id);
	}
}
if ( ! function_exists('tahun_buku'))
{
	function tahun_buku()
	{
		return get_instance()->sistem->thn_buku();
	}
}
if (!function_exists('notif_pinjaman_baru'))
{
	function notif_pinjaman_baru()
	{
		return get_instance()->transaksi->notif_pinjaman_baru();
	}
} 
if (!function_exists('notif_angsuran'))
{
	function notif_angsuran()
	{
		return get_instance()->transaksi->notif_angsuran();
	}
} 
if (!function_exists('anggota_baru'))
{
	function anggota_baru()
	{
		return get_instance()->users_model->anggota_baru();
	}
} 
if (!function_exists('get_pengurus'))
{
	function get_pengurus($key)
	{
		return get_instance()->db->get_where('app_pengurus', array('title' => $key))->row();
	}
}
if (!function_exists('ubah_pengurus'))
{
	function ubah_pengurus($key)
	{
		return get_instance()->sistem->ubah_pengurus($key);
	}
}
if (!function_exists('get_jumlah_anggota'))
{
	function get_jumlah_anggota()
	{
		return get_instance()->users_model->get_jumlah_anggota();
	}
}
if ( ! function_exists('tgl_jabar'))
{
	function tgl_jabar($date)
	{
        	$bulan  = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        	$Bulan  = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        	$tahun 	= substr($date ?? '',0,4);
        	$bulan	= substr($date ?? '',5,2);
        	$tgl 	= substr($date ?? '',8,2);
        	$waktu 	= substr($date ?? '',11,8);
        	$result = $tgl." ".$Bulan[(int)$bulan - 1]." ".$tahun." ";
        	return $result;
	}
}
if ( ! function_exists('bulan'))
{
	function bulan($key = '') {
		$data = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];
		return $key === '' ? $data : $data[$key];
	}
}
if ( ! function_exists('waktu_lalu'))
{
	function waktu_lalu($date)
	{
		$selisih = time() - strtotime($date);
		$detik	 = $selisih;
		$menit	 = round($selisih / 60);
		$jam	 = round($selisih / 3600);
		$hari	 = round($selisih / 86400);
		$minggu	 = round($selisih / 604800);
		$bulan	 = round($selisih / 2419200);
		$tahun	 = round($selisih / 29030400);

		if ($detik <= 60)
		{
			$waktu = $detik.' Detik lalu';
		}
		elseif ($menit <= 60)
		{
			$waktu = $menit.' Menit lalu';
		}
		elseif ($jam <= 24)
		{
			$waktu = $jam.' Jam lalu';
		}
		elseif ($hari <= 7)
		{
			$waktu = $hari.' Hari lalu';
		}
		elseif ($minggu <= 4)
		{
			$waktu = $minggu.' Minggu lalu';
		}
		elseif ($bulan <= 12)
		{
			$waktu = $bulan.' Bulan lalu';
		}
		else
		{
			$waktu = $tahun.' Tahun lalu';
		}
		return $waktu;
	}
}
if ( ! function_exists('tgl_indo'))
{
	function tgl_indo($date)
	{
 
		$Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        	$Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
      
        	$tahun = substr($date,0,4);
        	$bulan = substr($date,5,2);
        	$tgl = substr($date,8,2);
        	$waktu = substr($date,11,8);
        	$hari = date("w",strtotime($date));
        	//$result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." ";
        	$result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ";
        	return $result;
	}
}
if ( ! function_exists('dapatkan_jejak1'))
{
	function dapatkan_jejak1($ip)
	{		
		if($ip == '127.0.0.1')
		{
			return 'localhost, server, komputer, 00-0000, 11-0000';  
		}
		else
		{
			$ipdat = @json_decode(file_get_contents("http://ip-api.com/json/".$ip));   
			return $ipdat->country . ', ' . $ipdat->regionName . ', ' . $ipdat->city . ', ' . $ipdat->lat . ', ' . $ipdat->lon;  
		}  
	}
}
if ( ! function_exists('dapatkan_jejak'))
{
	function dapatkan_jejak($ip)
	{		
		if($ip == '127.0.0.1' OR $ip == '::1')
		{
			return 'Indonesia, Jawa Tengah, Semarang, 00-0000, 11-0000';  
		}
		else
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
    				CURLOPT_URL => 'https://api.ipgeolocation.io/ipgeo?apiKey=afa7c8d06014484f872bfeb3fb34349f&ip=' . $ip,
    				CURLOPT_RETURNTRANSFER => true,
    				CURLOPT_ENCODING => '',
    				CURLOPT_MAXREDIRS => 10,
    				CURLOPT_TIMEOUT => 0,
    				CURLOPT_FOLLOWLOCATION => true,
    				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    				CURLOPT_CUSTOMREQUEST => 'GET',
			));

			$response = curl_exec($curl);

			curl_close($curl);

			// Decode the JSON response
			$data = json_decode($response, true);

			if (isset($data['country_name'])) {
    				return $data['country_name'] . ', ' . 
           			$data['continent_name'] . ', ' . 
           			$data['country_capital'] . ', ' . 
           			$data['latitude'] . ', ' . 
           			$data['longitude'];
			} else {
    				return 'Error: Invalid API response';
			}
  
		}  
	}
}

if ( ! function_exists('get_cabang'))
{
	function get_cabang($id)
	{
		return get_instance()->db->where('id', $id)->get('app_cabang')->row();
	}
}
if (!function_exists('get_modul'))
{
	function get_modul($id)
	{
		return get_instance()->db->get_where('app_modules', array('id' => $id))->row();
	}
}
if ( ! function_exists('_isNaturalNumber'))
{
	function _isNaturalNumber( $n ) {
		return ($n != 0 && ctype_digit((string) $n));
	}
}
if ( ! function_exists('_toInteger'))
{
	function _toInteger( $n )
	{
		$n = abs(intval(strval($n)));
		return $n;
	}
}
if ( ! function_exists('get_akun'))
{
	function get_akun($id)
	{
		return get_instance()->db->where('id', $id)->get('app_akun');
	}
}
if ( ! function_exists('get_kode_akun'))
{
	function get_kode_akun($id, $table)
	{
		return get_instance()->db->where('id', $id)->limit('1')->get($table)->row();
	}
}
function penggenapan($uang)
{
	return round($uang, -2);
}
if ( ! function_exists('get_trans_akun'))
{
	function get_trans_akun($kode, $unit, $tahun)
	{
		return get_instance()->transaksi->kode_trans($kode, $unit, $tahun);
	}
}
if (!function_exists('get_list_barang'))
{
	function get_list_barang()
	{
		return get_instance()->sistem->get_list_barang();
	}
}
if (!function_exists('get_satuan'))
{
	function get_satuan($id)
	{
		return get_instance()->sistem->get_satuan($id);
	}
}
if (!function_exists('shu_dibagi_induk'))
{
	function shu_dibagi_induk()
	{
		return get_instance()->transaksi->shu_dibagi_induk();
	}
}
if ( ! function_exists('nootomatis'))
{
	function nootomatis()
	{
		return get_instance()->sistem->trxotomatis();
	}
}
if ( ! function_exists('render_bootstrap_menu'))
{
	function render_bootstrap_menu($items, $level = 0)
	{
		foreach ($items as $item)
		{
        		$has_children = isset($item['children']) && !empty($item['children']);
        		$collapse_id = 'menu' . $item['id'];
			echo '<li class="nav-item">';

        		if ($has_children)
			{
				echo '<a class="nav-link menu-link" href="#' . $collapse_id . '" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="' . $collapse_id . '">';
            			echo '<i class="' . $item['icon'] . '"></i> <span>' . $item['nama_menu'] . '</span>';
            			echo '</a>';
				echo '<div class="collapse menu-dropdown level-' . $level . '" id="' . $collapse_id . '">';
            			echo '<ul class="nav nav-sm flex-column">';
            			render_bootstrap_menu($item['children'], $level + 1);
            			echo '</ul>';
            			echo '</div>';
			}
			else
			{
				echo '<a href="' . base_url($item['alamat_url']) . '" class="nav-link">';
            			if( ! $item['icon']) { echo $item['nama_menu']; } else { echo '<i class="' . $item['icon'] . '"></i>' . $item['nama_menu']; }
            			echo '</a>';
			}
			echo '</li>';
		}
	}
}