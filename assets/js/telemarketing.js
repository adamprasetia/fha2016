$(document).ready(function(){
	$('.btn-callhis').click(function(){
		$.ajax({
			url:'<?php echo base_url() ?>index.php/telemarketing/callhis/create',
			type:'post',
			data:{
				status:$(this).attr('value'),
				candidate:'<?php echo $candidate->id ?>'
			},
			success:function(str){
				$('.box-callhis').html(str);
			}
		});
	});

	$('body').on('click','.btn-callhis-delete',function(){
		if(confirm('You sure ?')){
			$.ajax({
				url:'<?php echo base_url() ?>index.php/telemarketing/callhis/delete',
				type:'post',
				data:{
					id:$(this).attr('value'),
					candidate:'<?php echo $candidate->id ?>'
				},
				success:function(str){
					$('.box-callhis').html(str);
				}
			});				
		}
	});
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

	function check_fminute_push(){
		var fminute = $('input[type=radio][name=fminute]:checked').val();
		var push = $('input[type=radio][name=push]:checked').val();
		if(fminute==1 || push==1){
			$('.box-eknow').removeClass('hide');
		}else{
			$('.box-eknow').addClass('hide');
		}
	}
	check_fminute_push();
	function check_fminute(){
		var radio = $('input[type=radio][name=fminute]:checked').val();
		if(radio==1){
			$('.box-push-ya').removeClass('hide');
			$('.box-push-tidak').addClass('hide');
		}else if(radio==2){
			$('.box-push-ya').addClass('hide');
			$('.box-push-tidak').removeClass('hide');
		}			
	}
	check_fminute();
	$('input[type=radio][name=fminute]').change(function(){
		check_fminute();
		check_fminute_push();
	});

	function check_push(){
		var radio = $('input[type=radio][name=push]:checked').val();
		if(radio==1){
			$('.push-tidak-ya').removeClass('hide');
			$('.push-tidak-tidak').addClass('hide');
		}else if(radio==2){
			$('.push-tidak-ya').addClass('hide');
			$('.push-tidak-tidak').removeClass('hide');
		}			
	}
	check_push();
	$('input[type=radio][name=push]').change(function(){
		check_push();
		check_fminute_push();
	});

	function check_eknow_register(){
		var eknow = $('input[type=radio][name=eknow]:checked').val();
		var register = $('input[type=radio][name=register]:checked').val();
		if(eknow==2 || register==2){
			$('.box-eknow-tidak').removeClass('hide');
		}			
	}
	check_eknow_register();

	function check_eknow(){
		var radio = $('input[type=radio][name=eknow]:checked').val();
		if(radio==1){
			$('.box-eknow-ya').removeClass('hide');
		}else if(radio==2){
			$('.box-eknow-ya').addClass('hide');
		}			
	}
	check_eknow();
	$('input[type=radio][name=eknow]').change(function(){
		check_eknow();
		check_eknow_register();
	});


	function check_sendemail(){
		var radio = $('input[type=radio][name=sendemail]:checked').val();
		if(radio==1){
			$('.box-sendemail-ya').removeClass('hide');
			$('.box-sendemail-tidak').addClass('hide');
			$('.box-attend').removeClass('hide');
		}else if(radio==2){
			$('.box-sendemail-ya').addClass('hide');
			$('.box-sendemail-tidak').removeClass('hide');
			$('.box-attend').removeClass('hide');
		}			
	}
	check_sendemail();
	$('input[type=radio][name=sendemail]').change(function(){
		check_sendemail();
	});

	function check_register(){
		var radio = $('input[type=radio][name=register]:checked').val();
		if(radio==1){
			$('.box-register-ya').removeClass('hide');
		}else if(radio==2){
			$('.box-register-ya').addClass('hide');
		}			
	}
	check_register();
	$('input[type=radio][name=register]').change(function(){
		check_register();
		check_eknow_register();
	});


	function check_sendsms(){
		var radio = $('input[type=radio][name=sendsms]:checked').val();
		if(radio==1){
			$('.box-sendsms-ya').removeClass('hide');
			$('.box-sendsms-tidak').addClass('hide');
		}else if(radio==2){
			$('.box-sendsms-ya').addClass('hide');
			$('.box-sendsms-tidak').removeClass('hide');
		}			
	}
	check_sendsms();
	$('input[type=radio][name=sendsms]').change(function(){
		check_sendsms();
	});
});