$(document).ready(function(){
	function check_new_contact(){
		if($('#new_contact').is(":checked")){
			$('.table-new-contact').removeClass('hide');
		}else{
			$('.table-new-contact').addClass('hide');
		}			
	}
	check_new_contact();
	$('#new_contact').change(function(){
		check_new_contact();
	});

	function check_called(){
		if($('#called').is(":checked")){
			$('.box-fminute').removeClass('hide');
		}else{
			$('.box-fminute').addClass('hide');
		}			
	}
	check_called();
	$('#called').change(function(){
		check_called();
	});

	// function check_fminute_push(){
	// 	var fminute = $('input[type=radio][name=fminute]:checked').val();
	// 	var push = $('input[type=radio][name=push]:checked').val();
	// 	if(fminute==1 || push==1){
	// 		$('.box-push').removeClass('hide');
	// 	}else{
	// 		$('.box-push').addClass('hide');
	// 	}
	// }
	// check_fminute_push();	
	// function check_fminute(){
	// 	var radio = $('input[type=radio][name=fminute]:checked').val();
	// 	if(radio==1){
	// 		$('.box-push-ya').removeClass('hide');
	// 		$('.box-push-tidak').addClass('hide');
	// 	}else if(radio==2){
	// 		$('.box-push-ya').addClass('hide');
	// 		$('.box-push-tidak').removeClass('hide');
	// 	}			
	// }
	// check_fminute();
	// $('input[type=radio][name=fminute]').change(function(){
	// 	check_fminute();
	// 	check_fminute_push();
	// });



	function check_fminute(){
		var radio = $('input[type=radio][name=fminute]:checked').val();
		if(radio==1){
			$('.box-attend').removeClass('hide');
			$('.box-fminute-ya').removeClass('hide');
			$('.box-fminute-tidak').addClass('hide');
		}else if(radio==2){
			$('.box-attend').addClass('hide');
			$('.box-fminute-ya').addClass('hide');
			$('.box-fminute-tidak').removeClass('hide');
		}			
	}
	check_fminute();
	$('input[type=radio][name=fminute]').change(function(){
		check_fminute();
	});

	function check_push(){
		var radio = $('input[type=radio][name=push]:checked').val();
		if(radio==1){
			$('.box-attend').removeClass('hide');
			$('.push-ya').removeClass('hide');
			$('.push-tidak').addClass('hide');
		}else if(radio==2){
			$('.box-attend').addClass('hide');
			$('.push-ya').addClass('hide');
			$('.push-tidak').removeClass('hide');
		}			
	}
	check_push();
	$('input[type=radio][name=push]').change(function(){
		check_push();
	});



	function check_attend(){
		var radio = $('input[type=radio][name=attend]:checked').val();
		if(radio==1){
			$('.box-attend-ya').removeClass('hide');
			$('.box-attend-tidak').addClass('hide');
		}else if(radio==2){
			$('.box-attend-ya').addClass('hide');
			$('.box-attend-tidak').removeClass('hide');
		}			
	}
	check_attend();
	$('input[type=radio][name=attend]').change(function(){
		check_attend();
	});

	function check_email(){
		var radio = $('input[type=radio][name=email]:checked').val();
		if(radio==1){
			$('.box-email-ya').removeClass('hide');
			$('.box-email-tidak').addClass('hide');
		}else if(radio==2){
			$('.box-email-ya').addClass('hide');
			$('.box-email-tidak').removeClass('hide');
		}			
	}
	check_email();
	$('input[type=radio][name=email]').change(function(){
		check_email();
	});
	
});