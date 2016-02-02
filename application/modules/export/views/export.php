<section class="content-header">
	<h1>
		Export Data
	</h1>
	<ol class="breadcrumb pull-right">
		<li><?php echo anchor('home','Dashboard')?></li>
		<li class="active">Export</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->session->flashdata('alert')?>
	<?php echo form_open('export/execute')?>
	<div class="box">
		<div class="box-body">
			<div class="form-group form-inline">
				<?php echo form_label('Event','event',array('class'=>'control-label'))?>
				<?php echo form_dropdown('event',$this->master_model->dropdown('event','Event'),set_value('event',''),'class="form-control"')?>
			</div>			
			<div class="form-group form-inline">
				<?php echo form_label('Date','date',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'date_from','class'=>'form-control input-tanggal','size'=>'10'))?>
				<?php echo form_input(array('name'=>'date_to','class'=>'form-control input-tanggal','size'=>'10'))?>
			</div>			
		</div>
		<div class="box-footer">
			<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-export"></span> Export</button>
		</div>
	</div>
	<?php echo form_close()?>
</section>
