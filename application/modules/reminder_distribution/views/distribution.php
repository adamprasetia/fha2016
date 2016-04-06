<section class="content-header">
	<h1>
		Distribution (Reminder)
	</h1>
	<ol class="breadcrumb pull-right">
		<li><?php echo anchor('home','Dashboard')?></li>
		<li class="active">Distribution</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->session->flashdata('alert')?>
	<?php echo form_open('reminder_distribution/distribution',array('method'=>'get'))?>
	<div class="box">
		<div class="box-body">
			<div class="form-group form-inline">
				<?php echo form_label('Event','event',array('class'=>'control-label'))?>
				<?php echo form_dropdown('event',$this->master_model->dropdown('event','Event'),set_value('event',$this->input->get('event')),'class="form-control"')?>
			</div>
		</div>
		<div class="box-footer">
			<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-refresh"></span> Calculate</button>
		</div>
	</div>
	<div class="box">
		<div class="box-body">
			<div class="pull-left">
				<h1>Ready distribution : <?php echo $total ?></h1>
			</div>
			<div class="pull-right">
				<h1>
					<?php echo anchor('reminder_distribution/distribution/clear'.get_query_string(),'Clear All',array('class'=>'btn btn-warning','onclick'=>"return confirm('Are you sure ?')")) ?>
					<?php echo anchor('reminder_distribution/distribution/clear_callback'.get_query_string(),'Clear for Callback',array('class'=>'btn btn-warning','onclick'=>"return confirm('Are you sure ?')")) ?>
				</h1>
			</div>
		</div>
	</div>
	<?php echo form_close()?>
	<?php echo form_open('reminder_distribution/distribution/execute'.get_query_string(),array('method'=>'post'))?>
	<div class="box">
		<div class="box-body">
			<div class="form-group">
				<table class="table">
					<tr>
						<th>No</th>
						<th>Telemarketer</th>
						<th>New</th>
						<th>OnProses</th>
						<th>Complete</th>
						<th>Distribution</th>
						<th>Clear</th>
					</tr>
					<?php $i = 1 ?>
					<?php foreach ($telemarketer as $row): ?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $row->name ?></td>
							<td width='100'><?php echo $this->distribution_model->count_by_telemarketer_new($row->id) ?></td>
							<td width='100'><?php echo $this->distribution_model->count_by_telemarketer_onproses($row->id) ?></td>
							<td width='100'><?php echo $this->distribution_model->count_by_telemarketer_complete($row->id) ?></td>
							<td width='100'><input type="number" class="form-control input-sm" name="telemarketer_<?php echo $row->id ?>"></td>
							<td width='20'><?php echo anchor('reminder_distribution/distribution/clear/'.$row->id.get_query_string(),'Clear',array('class'=>'btn btn-danger btn-sm','onclick'=>"return confirm('Are you sure ?')")) ?></td>
						</tr>
					<?php $i++ ?>
					<?php endforeach ?>
				</table>
			</div>			
		</div>
		<div class="box-footer">
			<button class="btn btn-primary btn-sm" type="submit" onclick="return confirm('Are you sure ?')"><span class="glyphicon glyphicon-export"></span> Distribution</button>
		</div>
	</div>
	<?php echo form_close()?>
</section>
