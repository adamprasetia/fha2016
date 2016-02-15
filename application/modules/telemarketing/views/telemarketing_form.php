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
					<h3>Selamat <?php echo (date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ?>. Nama saya <b><?php echo $this->user_login['name'] ?></b> dan saya mewakili <b>Singapore Exhibitions Services</b>, penyelenggara <b><?php echo $candidate->event_name ?></b> di Singapura.</h3>
					<h3>Bisakah saya berbicara dengan ?</h3>
					<div class="row">
						<div class="col-md-8">
							<table class="table">
								<tr>
									<td width="200">Name of Target Contact</td>
									<td><?php echo $candidate->name ?></td>
								</tr>
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
									<td>New Contact</td>
									<td><?php echo form_checkbox(array('id'=>'new_contact','name'=>'new_contact','value'=>'1','checked'=>set_value('new_contact',($candidate->new_contact==1?true:false)))) ?></td>
								</tr>
							</table>
						</div>	
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									Priority
								</div>	
								<div class="panel-body">
									<p><b><?php echo (isset($priority->name)?$priority->name:'') ?></b></p>
									<?php echo (isset($priority->priority)?$priority->priority:'') ?>
								</div>
							</div>
						</div>	
					</div>	
					<table class="table table-new-contact hide">
						<tr>
							<th colspan=2>New Target Contact :</th>
						</tr>
						<tr>
							<td width="200">Name of Target Contact</td>
							<td><?php echo form_input(array('name'=>'name_new','maxlength'=>'100','class'=>'form-control','size'=>'40','autocomplete'=>'off','value'=>set_value('name_new',$candidate->name_new))) ?></td>
						</tr>
						<tr>
							<td>Job Title</td>
							<td><?php echo form_input(array('name'=>'title_new','maxlength'=>'100','class'=>'form-control','size'=>'40','autocomplete'=>'off','value'=>set_value('title_new',$candidate->title_new))) ?></td>
						</tr>
						<tr>
							<td>Tel / DID</td>
							<td><?php echo form_input(array('name'=>'tlp_new','maxlength'=>'50','class'=>'form-control','size'=>'25','autocomplete'=>'off','value'=>set_value('tlp_new',$candidate->tlp_new))) ?></td>
						</tr>
						<tr>
							<td>Mobile</td>
							<td><?php echo form_input(array('name'=>'mobile_new','maxlength'=>'50','class'=>'form-control','size'=>'25','autocomplete'=>'off','value'=>set_value('mobile_new',$candidate->mobile_new))) ?></td>
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
					<p>Jika tidak ada : Cari Kontak detail dan coba untuk menghubungi kembali</p>
				</div>	
			</div>	
			<div class="box box-fminute hide">
				<div class="box-body">
					<h3>Selamat <?php echo (date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ?>. Nama saya <b><?php echo $this->user_login['name'] ?></b> dan saya mewakili <b>Singapore Exhibitions Services</b>, penyelenggara <b><?php echo $candidate->event_name ?></b> di Singapura.</h3>
					<h3>Bisakah saya minta waktunya beberapa menit ?</h3>
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
			<div class="box box-push-ya hide">
				<div class="box-body">
					<h3>Terima kasih</h3>
					<p>(lanjut ke Pertanyaan berikutnya)</p>
				</div>	
			</div>	
			<div class="box box-push-tidak hide">
				<div class="box-body">
					<h3>Ini tidak akan memakan waktu yang lama. Kami hanya ingin mengetahui apakah bapak/ibu sudah register untuk event di Bulan April 2016</h3>
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
					<div class="push-tidak-ya hide">
	    			<h3>Terima kasih</h3>
	    			<p>(lanjut ke Pertanyaan berikutnya)</p>
    			</div>
					<div class="push-tidak-tidak hide">
	    			<h3>Saya minta maaf sudah menggangu waktu bapak/ibu. Kapan kira kira bisa dihubungi kembali?</h3>
	    			<p>(catat tgl, waktu untuk dihubungi)</p>
    			</div>
				</div>	
			</div>	
			<div class="box box-eknow hide">
				<div class="box-body">
					<h3>Apakah bapak/ibu sudah mengetahui bahwa <b><?php echo $candidate->event_name ?></b> akan diselenggarakan tanggal 12-15 April di Singapore Expo ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'eknow1','name'=>'eknow','value'=>'1','checked'=>($candidate->eknow==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'eknow2','name'=>'eknow','value'=>'2','checked'=>($candidate->eknow==2?true:false))) ?>
							Tidak
						</label>
					</div>					
				</div>	
			</div>	
			<div class="box box-eknow-ya hide">
				<div class="box-body">
					<h3>Baik. Sudahkah bapak/ibu melakukan pra pendaftaran ke <b><?php echo $candidate->event_name ?></b> ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'register1','name'=>'register','value'=>'1','checked'=>($candidate->register==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'register2','name'=>'register','value'=>'2','checked'=>($candidate->register==2?true:false))) ?>
							Tidak
						</label>
					</div>					
				</div>	
			</div>
			<div class="box box-register-ya hide">
				<div class="box-body">
					<h3>Terima kasih atas dukungan dan waktunya. Mohon diingat untuk membawa email konfirmasi bapak/ibu untuk koleksi lencana/badge bapak/ibu. Jika bapak/ibu ingin kami mengirimkan reminder/pengingat acara, bapak/ibu dapat memberikan nomor ponsel bapak/ibu dan kami akan mengirimkan SMS Reminder/pengingat. </h3>					
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'sendsms1','name'=>'sendsms','value'=>'1','checked'=>($candidate->sendsms==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'sendsms2','name'=>'sendsms','value'=>'2','checked'=>($candidate->sendsms==2?true:false))) ?>
							Tidak
						</label>
					</div>					
				</div>	
			</div>				
			<div class="box box-sendsms-ya hide">
				<div class="box-body">
					<p>(Dapatkan nomor ponsel)</p>
					<table class="table">
						<tr>
							<td style="vertical-align:middle">Mobile Phone</td>
							<td><?php echo form_input(array('name'=>'mobile_sms','maxlength'=>'50','class'=>'form-control','size'=>'40','autocomplete'=>'off','value'=>set_value('mobile_sms',$candidate->mobile_sms))) ?></td>
						</tr>
					</table>										
					<h3>Baik terima kasih atas infonya. Sampai jumpa di acara tersebut! Selamat <?php echo (date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ?>.</h3> 
					<p>(Selesai)</p>
				</div>	
			</div>	
			<div class="box box-sendsms-tidak hide">
				<div class="box-body">
					<h3>Baik terima kasih atas infonya. Sampai jumpa di acara tersebut! Selamat <?php echo (date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ?>.</h3> 
					<p>(Selesai)</p>
				</div>	
			</div>	
			<div class="box box-eknow-tidak hide">
				<div class="box-body">
					<p>(Berikan info tentang <b><?php echo $candidate->event_name ?></b>)</p>
					<h3>Dapatkah saya kirimkan email kepada bapak/ibu undangan untuk menghadiri <b><?php echo $candidate->event_name ?></b> bersama dengan informasi acara dan link ke pra-pendaftaran secara online ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'sendemail1','name'=>'sendemail','value'=>'1','checked'=>($candidate->sendemail==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'sendemail2','name'=>'sendemail','value'=>'2','checked'=>($candidate->sendemail==2?true:false))) ?>
							Tidak
						</label>
					</div>
				</div>	
			</div>	
			<div class="box box-sendemail-ya hide">
				<div class="box-body">
 					(Minta alamat emailnya)
 					<table class="table">
						<tr>
							<td style="vertical-align:middle">Email</td>
							<td><?php echo form_input(array('id'=>'email','name'=>'email','maxlength'=>'150','class'=>'form-control','size'=>'40','autocomplete'=>'off','value'=>set_value('email',$candidate->email))) ?></td>
						</tr>
					</table>					

					<h3>Jika bapak/ibu tertarik untuk mengunjungi acara, silakan lakukan pra-pendaftaran kunjungan bapak/ibu secara online di <?php echo ($candidate->event==4?'www.foodnhotelasia.com':($candidate->event==5?'www.prowineasia.com':'www.foodnhotelasia.com atau www.prowineasia.com')) ?> sebelum 31 Maret 2016. </h3>
					<h3>Jika tidak, akan ada biaya masuk sebesar SGD 80 untuk pendaftaran onsite (di tempat acara).</h3>
					<h3>Apakah juga membawa rekan bapak/ibu dan teman-teman di industri untuk pertunjukan karena saya yakin bahwa itu akan relevan dan bermanfaat bagi pekerjaan mereka juga. Rekan bapak/ibu juga harus melakukan pra-pendaftaran secara online untuk menikmati tiket masuk gratis ke pameran.</h3>
					<h3>Harap menyimpan email yang akan saya kirimkan kepada bapak/ibu segera.</h3>
				</div>				
			</div>		
			<div class="box box-attend hide">
				<div class="box-body">
					<h3>Jadi apakah bapak/ibu akan meluangkan waktu untuk mengahadiri <b><?php echo $candidate->event_name ?></b> ?</h3>
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
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'attend3','name'=>'attend','value'=>'3','checked'=>($candidate->attend==3?true:false))) ?>
							Ragu-ragu
						</label>
					</div>
				</div>				
			</div>		
			<div class="box box-sendemail-ya hide">
				<div class="box-body">
 					<h3>Terima kasih banyak atas waktunya. Selamat <?php echo (date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ?>.</h3>
					<p>(End call) (Kirim Email)</p>
				</div>				
				<div class="box-body">
					<button id="btn-send-email" type="button" class="btn btn-success" onclick="return confirm('Are you sure')">Send Email</button>
				</div>				
				<div class="box-footer box-footer-send-email">

				</div>				
			</div>		
			<div class="box box-sendemail-tidak hide">
				<div class="box-body">
 					<h3>Terima kasih banyak atas waktunya. Selamat <?php echo (date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ?>.</h3>
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
			<div class="box">
				<div class="box-header">
					<b>Call History</b>
				</div>	
				<div class="box-body box-callhis">
					<table class="table table-responsive">
						<tr>
							<th>Date</th>
							<th>Remark</th>
							<th>Action</th>
						</tr>	
						<?php foreach ($callhis as $row): ?>
						<tr>
							<td><?php echo $row->date ?></td>
							<td><?php echo $row->status ?></td>
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
					<input id="note" type="text" name="note" maxlength="50" class="form-control" placeholder="note..." autocomplete="off">
				</div>	
			</div>	
		</div>
	</div>	
</section>
<script type="text/javascript" src="<?php echo base_url('assets/js/telemarketing.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#note').keyup(function(e){
	    if(e.keyCode == 13 && $(this).val() != ''){	        
					$.ajax({
						url:'<?php echo base_url() ?>index.php/telemarketing/callhis/create',
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