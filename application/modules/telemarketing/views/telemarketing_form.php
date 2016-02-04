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
<?php echo form_open($action) ?>
<section class="content">
<?php echo $this->session->flashdata('alert')?>
	<div class="box">
		<div class="box-body form-inline">
			Status : 
			<?php echo form_dropdown('status',$this->telemarketing_model->status_dropdown('candidate_status','Status'),set_value('status',$candidate->status),'class="form-control"') ?>
			<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
		</div>	
	</div>	
	<div class="row">
		<div class="col-md-8 col-sm-8">
			<div class="box">
				<div class="box-header">
					<b>Phone Script</b>
				</div>	
				<div class="box-body">
					<h3>Selamat <?php echo (date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ?>. Nama saya <b><?php echo $this->user_login['name'] ?></b> dan saya mewakili <b>Singapore Exhibitions Services</b>, penyelenggara <b><?php echo $candidate->event_name ?></b> di Singapura.</h3>
					<h3>Bisakah saya berbicara dengan ?</h3>
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
							<td>Company</td>
							<td><?php echo $candidate->company ?></td>
						</tr>
						<tr>
							<td>Tel / DID</td>
							<td><?php echo $candidate->tlp ?></td>
						</tr>
						<tr>
							<td>New Contact</td>
							<td><?php echo form_checkbox(array('id'=>'new_contact','name'=>'new_contact','value'=>'1','checked'=>set_value('new_contact',($candidate->new_contact==1?true:false)))) ?></td>
						</tr>
					</table>
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
							<td>Company</td>
							<td><?php echo form_input(array('name'=>'company_new','maxlength'=>'100','class'=>'form-control','size'=>'40','autocomplete'=>'off','value'=>set_value('company_new',$candidate->company_new))) ?></td>
						</tr>
						<tr>
							<td>Tel / DID</td>
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
					<p>Jika tidak ada : Cari Kontak detail dan coba untuk menghubungi kembali</p>
				</div>	
			</div>	
			<div class="box box-fminute hide">
				<div class="box-body">
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
					<h3>Terima kasih Pak/Ibu</h3>
					<p>(lanjut ke Pertanyaan berikutnya)</p>
				</div>	
			</div>	
			<div class="box box-push-tidak hide">
				<div class="box-body">
					<h3>Ini tidak akan memakan waktu yang lama. Kami hanya ingin mengetahui apakah anda sudah register untuk event di Bulan April 2016</h3>
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
	    			<h3>Saya minta maaf sudah menggangu waktu Anda. Kapan kira kira bisa dihubungi kembali?</h3>
	    			<p>(catat tgl, waktu untuk dihubungi)</p>
    			</div>
				</div>	
			</div>	
			<div class="box box-eknow hide">
				<div class="box-body">
					<h3>Apakah Anda sudah mengetahui bahwa FHA 2016 akan diselenggarakan tanggal 12-15 April di Singapore Expo ?</h3>
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
					<h3>Bagus. Sudahkah anda melakukan pra pendaftaran ke FHA 2016 ?</h3>
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
					<h3>Terima kasih atas dukungan dan waktunya. Mohon diingat untuk membawa email konfirmasi Anda untuk koleksi lencana/badge anda. Jika Anda ingin kami mengirimkan reminder/pengingat acara, Anda dapat memberikan nomor ponsel Anda dan kami akan mengirimkan SMS Reminder/pengingat. </h3>					
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
							<td><?php echo form_input(array('name'=>'mobile','maxlength'=>'50','class'=>'form-control','size'=>'40','autocomplete'=>'off','value'=>set_value('mobile',$candidate->mobile))) ?></td>
						</tr>
					</table>										
					<h3>Sampai jumpa di acara tersebut!</h3> 
					<p>(Selesai)</p>
				</div>	
			</div>	
			<div class="box box-sendsms-tidak hide">
				<div class="box-body">
					<h3>Sampai jumpa di acara tersebut!</h3> 
					<p>(Selesai)</p>
				</div>	
			</div>	
			<div class="box box-eknow-tidak hide">
				<div class="box-body">
					<p>(Berikan info tentang FHA 2016)</p>
					<h3>Dapatkah saya kirimkan email kepada Anda undangan untuk menghadiri FHA 2016 bersama dengan informasi acara dan link ke pra-pendaftaran secara online ?</h3>
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
							<td><?php echo form_input(array('name'=>'email','maxlength'=>'150','class'=>'form-control','size'=>'40','autocomplete'=>'off','value'=>set_value('email',$candidate->email))) ?></td>
						</tr>
					</table>					

					<h3>Jika Anda tertarik untuk mengunjungi acara, silakan lakukan pra-pendaftaran kunjungan Anda secara online di www.foodnhotelasia.com sebelum 31 Maret 2016. </h3>
					<h3>Jika tidak, akan ada biaya masuk sebesar SGD 80 untuk pendaftaran onsite (di tempat acara).</h3>
					<h3>Apakah juga membawa rekan Anda dan teman-teman di industri untuk pertunjukan karena saya yakin bahwa itu akan relevan dan bermanfaat bagi pekerjaan mereka juga. Rekan Anda juga harus melakukan pra-pendaftaran secara online untuk menikmati tiket masuk gratis ke pameran.</h3>
					<h3>Harap menyimpan email yang akan saya kirimkan kepada Anda segera. Terima kasih dan kami berharap untuk dapat berjumpa dengan Anda.</h3> 
					<p>(End call) (Kirim Email)</p>
				</div>				
			</div>		
			<div class="box box-sendemail-tidak hide">
				<div class="box-body">
 					<h3>Terima kasih banyak atas waktunya. Semoga hari ini menyenangkan buat anda</h3>
				</div>				
			</div>		
		</div>
		<div class="col-md-4 col-sm-4">
			<div class="box">
				<div class="box-header">
					<b>Note</b>
				</div>	
				<div class="box-header">
					<td><?php echo form_input(array('name'=>'note','maxlength'=>'100','class'=>'form-control','autocomplete'=>'off','value'=>set_value('note',$candidate->note))) ?></td>
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
				</div>	
			</div>	
		</div>
	</div>	
</section>
<script type="text/javascript" src="<?php echo base_url('assets/js/telemarketing.js') ?>"></script>
<?php echo form_close() ?>