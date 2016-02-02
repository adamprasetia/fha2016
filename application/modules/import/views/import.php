<section class="content-header">
	<h1>
		Import Data
	</h1>
	<ol class="breadcrumb pull-right">
		<li><?php echo anchor('home','Dashboard')?></li>
		<li class="active">Import</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->session->flashdata('alert')?>
	<?php echo form_open_multipart('import/execute')?>
	<div class="box">
		<div class="box-body">
			<div class="form-group form-inline">
				<?php echo form_label('Event','event',array('class'=>'control-label'))?>
				<?php echo form_dropdown('event',$this->master_model->dropdown('event','Event'),set_value('event',''),'class="form-control"')?>
			</div>			
			<div class="form-group form-inline">
				<?php echo form_label('File Excel 2007(*.xlsx)','userfile',array('class'=>'control-label'))?>
				<?php echo form_upload(array('name'=>'userfile','class'=>'form-control'))?>
			</div>
		</div>
		<div class="box-footer">
			<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-import"></span> Import</button>
			&nbsp;|&nbsp;<?php echo anchor(base_url().'files/fha2016_import_tmp.xlsx','Download Template');?>
		</div>
	</div>
	<?php echo form_close()?>
</section>
