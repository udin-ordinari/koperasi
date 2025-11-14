$(function(e) {
	
	//Basic
	$('#swal-basic').on('click', function () {
		Swal.fire("Berhasil !", "SweetAlert2 is working!", "error");
	});
	
	//A title with a text under
	$('#swal-title').click(function () {
		Swal.fire({
				title: 'Here is  a title!',
				text: 'All are available in the template',
				icon: 'info'
			})
	});
	
	//Success Message
	$('#swal-success').click(function () {
		Swal.fire({
				title: 'Well done!',
				text: 'You clicked the button!',
				icon: 'success',
				confirmButtonColor: '#57a94f'
			})
	});
	
	//Warning Message
	$('#swal-warning').click(function () {
		Swal.fire({
		  title: "Are you sure?",
		  text: "Your will not be able to recover this imaginary file!",
		  icon: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "Yes, delete it!",
		  closeOnConfirm: false
		},
		function(){
		  Swal.fire("Deleted!", "Your imaginary file has been deleted.", "success");
		});
	});
	
	//Parameter
	$('#swal-parameter').click(function () {
		Swal.fire({
		  title: "Are you sure?",
		  text: "You will not be able to recover this imaginary file!",
		  icon: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm) {
		  if (isConfirm) {
			Swal.fire("Deleted!", "Your imaginary file has been deleted.", "success");
		  } else {
			Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
		  }
		});
	});
	
	//Custom Image
	$('#swal-image').click(function () {
		Swal.fire({
			title: 'Lovely!',
			text: 'your image is uploaded.',
			imageUrl: 'assets/img/logo.png',
			animation: false
		})
	});
	
	//Auto Close Timer
	$('#swal-timer').click(function () {
		let timerInterval;
		Swal.fire({
			title: 'Anda Telah Keluar !',
			html: 'Anda Akan Dialihkan Dalam <b></b> milidetik.',
			icon: 'success',
			timer: 2000,
			timerProgressBar: true,
			didOpen: () => {
				Swal.showLoading();
				const timer = Swal.getPopup().querySelector("b");
				timerInterval = setInterval(() => {
					timer.textContent = `${Swal.getTimerLeft()}`;
				}, 100);
			},
			willClose: () => {
				clearInterval(timerInterval);
			}
		}).then((result) => {
			if (result.dismiss === Swal.DismissReason.timer) {
				location.reload();
			}
		});
	});
	
	
	//Ajax with Loader Alert
	$('#swal-ajax').click(function () {
		Swal.fire({
		  title: "Ajax request example",
		  text: "Submit to run ajax request",
		  icon: "info",
		  showCancelButton: true,
		  closeOnConfirm: false,
		  showLoaderOnConfirm: true
		}, function () {
		  setTimeout(function () {
			Swal.fire("Ajax request finished!");
		  }, 2000);
		});
	});
	
});