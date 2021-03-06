<section class="content-header">
	<h1>
		Telemarketing
		<small>Phone script</small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	  <li><?php echo anchor($breadcrumb,'List')?></li>
	  <li class="active">Telemarketing</li>
	</ol>
</section>
<section class="content">
<?php echo $this->session->flashdata('alert')?>
	<div class="row">
		<?php echo form_open($action) ?>
		<div class="col-md-8 col-sm-8">
			<div class="box">
				<div class="box-body form-inline">
					Status : 
					<?php echo form_dropdown('status',$this->telemarketing_model->status_dropdown(),set_value('status',$candidate->status),'class="form-control"') ?>
					<div class="pull-right">
						<div class="checkbox <?php echo ($this->user_login['level']==2?'hide':'') ?>">
							<label>
								<?php echo form_checkbox(array('id'=>'valid','name'=>'valid','value'=>'1','checked'=>set_value('valid',($candidate->valid==1?true:false)))) ?>
								Valid
							</label>
						</div>
						<div class="checkbox <?php echo ($this->user_login['level']==3?'hide':'') ?>">
							<label>
								<?php echo form_checkbox(array('id'=>'audit','name'=>'audit','value'=>'1','checked'=>set_value('audit',($candidate->audit==1?true:false)))) ?>
								Audit
							</label>
						</div>
					</div>
					<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
				</div>	
			</div>	
			<div class="box">
				<div class="box-header">
					<b>Phone Script</b>
				</div>	
				<div class="box-body">
					<h3>Selamat <?php echo (date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ?>, Bisa bicara dengan <b><?php echo $candidate->name ?></b> ?</h3>
					<table class="table">
						<tr>
							<td>Job Title</td>
							<td><?php echo $candidate->title ?></td>
						</tr>
						<tr>
							<td>Departement</td>
							<td><?php echo $candidate->dept ?></td>
						</tr>
						<tr>
							<td>Company</td>
							<td><?php echo $candidate->company ?></td>
						</tr>						
						<tr>
							<td>Tel / DID</td>
							<td><?php echo $candidate->tlp ?></td>
						</tr>
						<tr>
							<td>Mobile</td>
							<td><?php echo $candidate->mobile ?></td>
						</tr>
						<tr>
							<td>New Tel / DID</td>
							<td><?php echo form_checkbox(array('id'=>'new_contact','name'=>'new_contact','value'=>'1','checked'=>set_value('new_contact',($candidate->new_contact==1?true:false)))) ?></td>
						</tr>
					</table>					
					<table class="table table-new-contact hide">
						<tr>
							<td><?php echo form_input(array('name'=>'tlp_new','maxlength'=>'50','class'=>'form-control','size'=>'25','autocomplete'=>'off','value'=>set_value('tlp_new',$candidate->tlp_new))) ?></td>
						</tr>
					</table>
				</div>	
				<div class="box-footer">
					<div class="checkbox">
						<label>
							<?php echo form_checkbox(array('id'=>'called','name'=>'called','value'=>'1','checked'=>set_value('called',($candidate->called==1?true:false)))) ?>
							Berhasil Dihubungi
						</label>
					</div>
					<p>Jika tidak ada : coba untuk menghubungi kembali lain waktu</p>
				</div>					
			</div>		
			<div class="box box-fminute hide">
				<div class="box-body">
					<?php if ($candidate->event==4): ?>
						<h3>Nama saya <b><?php echo $this->user_login['name'] ?></b> dan saya mewakili <b>Singapore Exhibitions Services</b>, penyelenggara <b>Food&HotelAsia2016 (FHA2016)</b> di Singapura.</h3>
					<?php elseif($candidate->event==5): ?>
						<h3>Nama saya <b><?php echo $this->user_login['name'] ?></b> dan saya mewakili <b>Singapore Exhibitions Services</b> dan <b>MesseDuesseldorf Asia</b>, penyelenggara <b>ProWine ASIA 2016</b> di Singapura.</h3>
					<?php elseif($candidate->event==6): ?>

					<?php endif ?>
					<h3>Bisa minta waktunya sebentar ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'fminute1','name'=>'fminute','value'=>'1','checked'=>($candidate->fminute==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'fminute2','name'=>'fminute','value'=>'2','checked'=>($candidate->fminute==2?true:false))) ?>
							Tidak
						</label>
					</div>									
				</div>	
			</div>	
			<div class="box box-fminute-ya hide">
				<div class="box-body">
					<h3>Terima kasih</h3>
					<p>(lanjut ke Pertanyaan berikutnya)</p>
				</div>	
			</div>	
			<div class="box box-fminute-tidak hide">
				<div class="box-body">
					<?php if ($candidate->event==4): ?>
						<h3>Ini hanya sebentar dan hanya ingin mengingatkan Anda tentang <b><?php echo $candidate->event_name ?></b> yang berlangsung dari 12-15 April 2016, Singapore Expo.</h3>
					<?php elseif($candidate->event==5): ?>
						<h3>Ini hanya sebentar dan hanya ingin mengingatkan Anda tentang <b><?php echo $candidate->event_name ?></b> yang berlangsung dari 12-15 April 2016 di Hall 10, Singapore Expo.</h3>
					<?php elseif($candidate->event==6): ?>

					<?php endif ?>

					<p>(Jika responden memberikan indikasi untuk melanjutkan pembicaraan, pergi ke Probing Question. Dari responden menolak, ke callback)</p>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'push1','name'=>'push','value'=>'1','checked'=>($candidate->push==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'push2','name'=>'push','value'=>'2','checked'=>($candidate->push==2?true:false))) ?>
							Tidak
						</label>
					</div>
					<div class="push-ya hide">
		    			<h3>Terima kasih</h3>
		    			<p>(lanjut ke Pertanyaan berikutnya)</p>
	    			</div>
					<div class="push-tidak hide">
		    			<h3>Saya minta maaf sudah menggangu waktu bapak/ibu. Kapan kira kira bisa dihubungi kembali?</h3>
		    			<p>(catat tgl, waktu untuk dihubungi)</p>
	    			</div>
				</div>	
			</div>	
			<div class="box box-attend hide">
				<div class="box-body">
					<h3>Kami memahami bahwa Anda telah melakukan pra-registrasi. Apakah Anda akan mengunjungi pameran tersebut ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'attend1','name'=>'attend','value'=>'1','checked'=>($candidate->attend==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'attend2','name'=>'attend','value'=>'2','checked'=>($candidate->attend==2?true:false))) ?>
							Tidak
						</label>
					</div>					
				</div>	
			</div>	
			<div class="box box-attend-ya hide">
				<div class="box-body">
					<h3>Baik, Apakah Anda telah menerima email konfirmasi ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'email1','name'=>'email','value'=>'1','checked'=>($candidate->email==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'email2','name'=>'email','value'=>'2','checked'=>($candidate->email==2?true:false))) ?>
							Tidak
						</label>
					</div>					
				</div>	
			</div>			
			<div class="box box-attend-tidak hide">
				<div class="box-body">
					<h3>Terima kasih untuk waktu Anda kami berharap untuk menyambut Anda di edisi berikutnya pada tahun 2018.</h3>
				</div>	
			</div>			
			<div class="box box-email-ya hide">
				<div class="box-body">
					<?php if ($candidate->event==4): ?>
						<h3>Harap diingat untuk membawa email konfirmasi dan kartu bisnis anda untuk 
					    koleksi lencana di Counter Pre Registered Visitors yang terletak di MAX Atria Gallery (in front of Hall 1) or Hall 9 of Singapore Expo</h3>
					<?php elseif($candidate->event==5): ?>
						<h3>Harap diingat untuk membawa email konfirmasi dan kartu bisnis anda untuk 
					    koleksi lencana di Counter Pre Registered Visitors yang terletak di Hall 10 dari
					    Singapore Expo.</h3>
					<?php elseif($candidate->event==6): ?>

					<?php endif ?>

					<h3>Sampai jumpa di acara tersebut, Selamat <?php echo (date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ?></h3>
				</div>	
			</div>				
			<div class="box box-email-tidak hide">
				<div class="box-body">
					<?php if ($candidate->event==4): ?>
					<h3>Silakan melakukan proses Pra-pendaftaran di Counter Enquiry yang terletak di 
					    MAX Atria Gallery (in front of Hall 1) or Hall 9 of Singapore Expo dengan kartu bisnis Anda untuk mengambil konfirmasi
					    QR code anda sebelum mengumpulkan badge/lencana masuk Anda di Counter
					    Pengunjung  Pre-Register.</h3>
					<?php elseif($candidate->event==5): ?>
					<h3>Silakan melakukan proses Pra-pendaftaran di Counter Enquiry yang terletak di 
					    Hall 10 dari Singapore Expo dengan kartu bisnis Anda untuk mengambil konfirmasi
					    QR code anda sebelum mengumpulkan badge/lencana masuk Anda di Counter
					    Pengunjung  Pre-Register.</h3>
					<?php elseif($candidate->event==6): ?>
					<?php endif ?>
					<h3>Sampai jumpa di acara tersebut, Selamat <?php echo (date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ?></h3>
				</div>	
			</div>				
		</div>
		<?php echo form_close() ?>
		<div class="col-md-4 col-sm-4">
			<div class="box">
				<div class="box-header">
					<b>Telemarketer</b>
				</div>	
				<div class="box-header">
					<td><?php echo $candidate->telemarketer ?></td>
				</div>	
			</div>			
			<div class="box callhis-wrap">
				<div class="box-header">
					<b>Call History</b>
				</div>	
				<div class="box-body box-callhis">
					<table class="table table-responsive">
						<tr>
							<th>No</th>
							<th>Date</th>
							<th>Remark</th>
							<th>Action</th>
						</tr>	
						<?php $i=1; ?>
						<?php foreach ($callhis as $row): ?>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $row->date ?></td>
							<td data-id="<?php echo $row->id ?>" class="btn-callhis-update"><?php echo $row->status ?></td>
							<td><button type="button" class="btn btn-danger btn-xs btn-callhis-delete" value="<?php echo $row->id ?>">Delete</button></td>
						</tr>							
						<?php endforeach ?>
					</table>
				</div>	
				<div class="box-footer">
					<button type="button" class="btn btn-success btn-xs btn-callhis" value="Answer">Answer</button>
					<button type="button" class="btn btn-warning btn-xs btn-callhis" value="No Answer">No Answer</button>
					<button type="button" class="btn btn-default btn-xs btn-callhis" value="Busy">Busy</button>
					<button type="button" class="btn btn-danger btn-xs btn-callhis" value="Reject">Reject</button>
				</div>	
				<div class="box-footer">
					<input id="note" type="text" name="note" maxlength="100" class="form-control" placeholder="note..." autocomplete="off">
				</div>	
			</div>	
			<div class="box callhis-form hide">
				<div class="box-header">
					<b>Update Call History</b>
				</div>	
				<div class="box-body">
					<input type="hidden" name="id" id="callhis-id" value="5">
					<div class="form-group">
						<?php echo form_label('Date','date',array('class'=>'control-label'))?>
						<?php echo form_input(array('id'=>'callhis-date','name'=>'date','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('date',''),'required'=>'required'))?>
					</div>
					<div class="form-group">
						<?php echo form_label('Status','status',array('class'=>'control-label'))?>
						<?php echo form_input(array('id'=>'callhis-status','name'=>'status','class'=>'form-control input-sm','maxlength'=>'100','autocomplete'=>'off','value'=>set_value('status',''),'required'=>'required'))?>
					</div>
				</div>	
				<div class="box-footer">
					<button type="button" class="btn btn-success btn-xs btn-callhis-save-update">Save</button>
					<button type="button" class="btn btn-default btn-xs btn-callhis-cancel-update">Cancel</button>
				</div>	
			</div>
		</div>
	</div>	
</section>
<script type="text/javascript" src="<?php echo base_url('assets/js/reminder_telemarketing.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#note').keyup(function(e){
	    if(e.keyCode == 13 && $(this).val() != ''){	        
					$.ajax({
						url:'<?php echo base_url() ?>index.php/reminder_telemarketing/callhis/create',
						type:'post',
						data:{
							status:$(this).val(),
							candidate:'<?php echo $candidate->id ?>'
						},
						success:function(str){
							$('.box-callhis').html(str);							
						}
					});
				$(this).val('');
	    }else{
				console.log('Note is Emptry');
	    }
	});

	$('.btn-callhis').click(function(){
		$.ajax({
			url:'<?php echo base_url() ?>index.php/reminder_telemarketing/callhis/create',
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
	$('body').on('click','.btn-callhis-save-update',function(){
		$('.callhis-form').addClass('hide');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/reminder_telemarketing/callhis/update',
			type:'post',
			data:{
				id:$('#callhis-id').val(),
				date:$('#callhis-date').val(),
				status:$('#callhis-status').val(),
				candidate:'<?php echo $candidate->id ?>'
			},
			success:function(str){
				$('.box-callhis').html(str);
			}
		});				
		$('.callhis-wrap').removeClass('hide');		
	});	
	$('body').on('click','.btn-callhis-cancel-update',function(){
		$('.callhis-form').addClass('hide');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/reminder_telemarketing/callhis/get/<?php echo $candidate->id ?>',
			type:'post',
			success:function(str){
				$('.box-callhis').html(str);
			}
		});				
		$('.callhis-wrap').removeClass('hide');
	});	
	
	<?php if ($this->user_login['level']<>3): ?>
		$('body').on('click','.btn-callhis-update',function(){
			var date = $(this).parent().children().eq(1).html();
			var status = $(this).parent().children().eq(2).html();
			$('#callhis-id').val($(this).attr('data-id'));
			$('#callhis-date').val(date);
			$('#callhis-status').val(status);
			$('.callhis-form').removeClass('hide');
			$('.callhis-wrap').addClass('hide');
		});		
	<?php endif ?>

	$('body').on('click','.btn-callhis-delete',function(){
		if(confirm('You sure ?')){
			$.ajax({
				url:'<?php echo base_url() ?>index.php/reminder_telemarketing/callhis/delete',
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
	$('#btn-send-email').click(function(){
		$('.box-footer-send-email').html('Loading...');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/telemarketing/send_email',
			type:'post',
			dataType:'json',
			data:{
				id:'<?php echo $candidate->id ?>',
				to:$('#email').val()
			},
			success:function(str){
				var html = '';
				if(str['status']==1){
					html = '<div class="alert alert-success">'+str['result']+'</div>';
				}else{
					html = '<div class="alert alert-danger">'+str['result']+'</div>';
				}	
				$('.box-footer-send-email').html(html);
			}
		});
	});	
});
</script>