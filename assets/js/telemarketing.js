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

	function check_fminute(){
		if($('#called').is(":checked")){
			$('.box-fminute').removeClass('hide');
		}else{
			$('.box-fminute').addClass('hide');
		}			
	}
	check_fminute();
	$('#called').change(function(){
		check_fminute();
	});

	function check_eknow(){
		if($('#fminute').is(":checked")){
			$('.box-eknow').removeClass('hide');
		}else{
			$('.box-eknow').addClass('hide');
		}			
	}
	check_fminute();
	$('#fminute').change(function(){
		check_eknow();
	});
})