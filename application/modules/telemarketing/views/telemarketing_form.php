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
<?php echo form_open('telemarketing/phone') ?>
<section class="content">
	<div class="box">
		<div class="box-body">
			Status : 
			<?php echo form_dropdown('status',$this->telemarketing_model->status_dropdown('candidate_status','Status',0),set_value('status',(isset($candidate->status)?$candidate->status:''))) ?>
		</div>	
	</div>	
	<div class="row">
		<div class="col-md-8 col-sm-8">
			<div class="box">
				<div class="box-header">
					<b>Phone Script</b>
				</div>	
				<div class="box-body">
					
				</div>	
				<div class="box-footer">
					
				</div>	
			</div>	
		</div>
		<div class="col-md-4 col-sm-4">
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
							<td><button class="btn btn-danger btn-xs btn-callhis-delete" value="<?php echo $row->id ?>">Delete</button></td>
						</tr>							
						<?php endforeach ?>
					</table>
				</div>	
				<div class="box-footer">
					<button class="btn btn-success btn-xs btn-callhis" value="Answer">Answer</button>
					<button class="btn btn-warning btn-xs btn-callhis" value="No Answer">No Answer</button>
				</div>	
			</div>	
		</div>
	</div>	
</section>
<script type="text/javascript">
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
	})
</script>
<?php echo form_close() ?>