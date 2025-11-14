<div class="row row-sm">
	<div class="col-lg-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row row-sm">
					<div class="col-lg-12 text-center">
						<p class="h5 text-primary kandel"><?php echo $anggota->nama; ?><span class="text-danger"> [ <?php echo get_cabang($anggota->cabang)->nama; ?> ]</span></p>
						<address><span class="tx-14 text-muted"><font class="text-info"><?php echo $anggota->ktp; ?></font><br><?php echo $anggota->phone; ?><br><?php echo $anggota->email; ?><br><?php echo $anggota->alamat; ?><br></address>
					</div>
				</div>
				<div class="table-responsive mg-t-20">
					<table class="table table-invoice table-bordered">
						<thead class="bg-info">
							<tr class="text-center">
								<th class="wd-10">No</th>
								<th>Tanggal</th>
								<th>Jenis Simpanan</th>
								<th class="total">Total</th>
							</tr>
						</thead>
						<tbody class="tx-14">
						<?php
							$data = $this->db->where('user_id', $anggota->id)->order_by('tgl', 'asc')->order_by('jns_simp', 'asc')->get('app_simpanan');
							$no   = 1;
							foreach($data->result() as $row) { 
							$totale = $row->jumlah;

							if($row->jns_simp == '1')
							{
								$label = '<span class="text-primary">'.get_jenis_simpanan($row->jns_simp)->nama.'</span>';
							}
							elseif($row->jns_simp == '2')
							{
								$label = '<span class="text-success">'.get_jenis_simpanan($row->jns_simp)->nama.'</span>';
							}
							elseif($row->jns_simp == '3')
							{
								$label = '<span class="text-warning">'.get_jenis_simpanan($row->jns_simp)->nama.'</span>';
							}
							elseif($row->jns_simp == '4')
							{
								$label = '<span class="text-secondary">'.get_jenis_simpanan($row->jns_simp)->nama.'</span>';
							}
							if($row->saldo_awal == '1')
							{
								$awal = '<span class="text-muted"> [ Saldo Awal ] </span>';
							}
							else
							{
								$awal = '<span class="text-muted"></span>';
							}

						?>
							<tr>

								<?php
									if($row->jns_simp == '3')
									{										
									
										$sukarela = $this->db->select_sum('jumlah')->where('user_id', $row->user_id)->where('jns_simp', '3')->get('app_simpanan')->row();
										$suka	  = $sukarela->jumlah - tarikan_sukarela($row->user_id)->total;
										if($suka == '0')
										{
											$totale = '';
										}
										else
										{
								?>
								<td class="no"><?php echo $no++; ?>.</td>
								<td><?php echo tgl_jabar($row->tgl); ?></td>
								<td><?php echo $label.' '. $awal; ?></td>
								<td class="total">Rp. <?php echo number_format($totale - tarikan_sukarela($row->user_id)->total, 0, ', ', '.'); ?></td>
								<?php
										}
									}
									else
									{
								?>
								<td class="no"><?php echo $no++; ?>.</td>
								<td><?php echo tgl_jabar($row->tgl); ?></td>
								<td><?php echo $label.' '. $awal; ?></td>
								<td class="total">Rp. <?php echo number_format($totale, 0, ', ', '.'); ?></td>
								<?php } ?>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td></td>
								<td></td>
								<td class="text-primary" style="text-align: right;">Jasa Simpanan Sukarela : </td>
			<?php

			$pok = $this->db->select_sum('jumlah', 'total')->where('user_id', $row->user_id)->where('jns_simp', '1')->get('app_simpanan')->row();
			if($pok->total == '')
			{
				$pokok = '0';
			}
			else
			{
				$pokok = $pok->total;
			}
			$a = $this->db->select_sum('jumlah', 'total')->where('user_id', $row->user_id)->where('jns_simp', '2')->get('app_simpanan')->row();
			if($a->total == '')
			{
				$wajib = '0';
			}
			else
			{
				$wajib = $a->total;
			}
			$b = $this->db->select_sum('jumlah', 'total')->where('user_id', $row->user_id)->where('jns_simp', '3')->get('app_simpanan')->row();
			if($b->total == '')
			{
				$sukarela = '0';
			}
			else
			{
				$sukarela = $b->total;
			}
			$c = $this->db->select_sum('jumlah', 'total')->where('user_id', $row->user_id)->where('jns_simp', '4')->get('app_simpanan')->row();
			if($c->total == '')
			{
				$swp = '0';
			}
			else
			{
				$swp = $c->total;
			}

			$bunga    = ($sukarela - tarikan_sukarela($row->user_id)->total) * jasa_sukarela();
			$total    = $pokok + $wajib + $swp + ($sukarela - tarikan_sukarela($row->user_id)->total) + $bunga;

?>
								<td>Rp. <?php echo number_format(floor($bunga), 0,",","."); ?></td>

							</tr>
							<tr class="kandel fs-5">
								<td></td>
								<td></td>
								<td style="text-align: right;">Jumlah : </td>
								<td>Rp. <?php echo number_format($total, 0,",","."); ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<div class="form-group row justify-content-end mb-0">
			<div class="col-md-6 ps-md-2">
				<button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal"><i class="fal fa-xmark-circle fa-fw fa-lg"></i> Tutup </button>
			</div>
		</div>
	</div>
</div>
	