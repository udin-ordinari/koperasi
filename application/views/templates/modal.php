<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
.loader {
  border: 10px solid #f3f3f3; 
  border-top: 10px solid #3498db; 
  border-radius: 50%; 
  width: 80px;
  height: 80px;
  position: relative;
  margin: 0 auto;
  text-align: center;
  animation: spin 1s linear infinite;

}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<div class="modal fade" id="modalFull" tabindex="-1" aria-labelledby="modalFull" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body"> </div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalKing">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body"> </div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalGede">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body"> </div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalSedeng">
	<div class="modal-dialog modal-md modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body"> </div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
	$('#modalFull').on('show.bs.modal', function (event) {
		var a = $(event.relatedTarget)
		var title = a.data('name');
		var dataURL = a.attr('data-href');
        	$('.modal-title').text(title);
        	$('.modal-body').html('<div class="loader"></div>');
        	$('.modal-body').load(dataURL, function(response, status, xhr)
		{
			if (status == "success")
			{
                		$('.loader').remove();
            		}
			else if (status == "error")
			{
                		$('.modal-body').html('<div class="text-center"><img src="<?php echo base_url('assets/img/warning.png'); ?>" width="100px"><p class="pt-2"> Maaf ! <br>Aplikasi Tidak Berjalan Sebagaimana Mestinya.<br>Hubungi Programmer.</p></div>');
            		}
        	});
	})
})
$(document).ready(function () {
	$('#modalKing').on('show.bs.modal', function (event) {
		var a = $(event.relatedTarget)
		var title = a.data('name');
		var dataURL = a.attr('data-href');
        	$('.modal-title').text(title);
        	$('.modal-body').html('<div class="loader"></div>');
        	$('.modal-body').load(dataURL, function(response, status, xhr)
		{
			if (status == "success")
			{
                		$('.loader').remove();
            		}
			else if (status == "error")
			{
                		$('.modal-body').html('<div class="text-center"><img src="<?php echo base_url('assets/img/warning.png'); ?>" width="100px"><p class="pt-2"> Maaf ! <br>Aplikasi Tidak Berjalan Sebagaimana Mestinya.<br>Hubungi Programmer.</p></div>');
            		}
        	});
	})
})

$(document).ready(function () {
	$('#modalGede').on('show.bs.modal', function (event) {
		var a = $(event.relatedTarget);
        	var title = a.data('name');
        	var dataURL = a.attr('data-href');
        	$('.modal-title').text(title);
        	$('.modal-body').html('<div class="loader"></div>');
        	$('.modal-body').load(dataURL, function(response, status, xhr)
		{
			if (status == "success")
			{
                		$('.loader').remove();
            		}
			else if (status == "error")
			{
                		$('.modal-body').html('<div class="text-center"><img src="<?php echo base_url('assets/img/warning.png'); ?>" width="100px"><p class="pt-2"> Maaf ! <br>Aplikasi Tidak Berjalan Sebagaimana Mestinya.<br>Hubungi Programmer.</p></div>');
            		}
        	});
	});
});


$(document).ready(function () {
	$('#modalSedeng').on('show.bs.modal', function (event) {
		var a = $(event.relatedTarget)
		var title = a.data('name');
		var dataURL = a.attr('data-href');
        	$('.modal-title').text(title);
        	$('.modal-body').html('<div class="loader"></div>');
        	$('.modal-body').load(dataURL, function(response, status, xhr)
		{
			if (status == "success")
			{
                		$('.loader').remove();
            		}
			else if (status == "error")
			{
                		$('.modal-body').html('<div class="text-center"><img src="<?php echo base_url('assets/img/warning.png'); ?>" width="100px"><p class="pt-2"> Maaf ! <br>Aplikasi Tidak Berjalan Sebagaimana Mestinya.<br>Hubungi Programmer.</p></div>');
            		}
        	});
	})
})

</script>