			
<?php if(strlen($pagination)) : ?>
	<div class="lead pagination_links">
		Pages: <?php echo $pagination; ?>
	</div>
<?php endif; ?>	
<div class="table-wrapper" style="height: 776px;">
	<table class="table table-hover">
		<thead>
		<?php foreach ($fields as $field_name => $field_display) : ?>
			<th class="<?php if($sort_by == $field_name) echo 'sort_' . $sort_order; ?>">
				<?php echo anchor("pages/schedule/$field_name/" . 
					// use condition to determine ascending or descending
					(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'), 
					$field_display); ?>
			</th>
		<?php endforeach; ?>
		</thead>

		<tbody>
		<?php foreach ($games as $game) : ?>
			<tr>
			<?php foreach ($fields as $field_name => $field_display) : ?>
				<td>
					<?php if($field_display == 'Home') : ?>
						<a href="<?php echo base_url() . 'pages/team/' . $game -> HomeTeamId; ?>"><?php echo $game -> $field_name; ?></a>
					<?php elseif($field_display == 'Away') : ?>
						<a href="<?php echo base_url() . 'pages/team/' . $game -> AwayTeamId; ?>"><?php echo $game -> $field_name; ?></a>
					<?php elseif($field_display == 'Time') : ?>
						<?php echo date('g:i A', strtotime($game -> $field_name)); ?>
					<?php elseif($field_display == 'Date') : ?>
						<?php echo date('m/d/Y', strtotime($game -> $field_name)); ?>
					<?php else : ?>
						<?php echo $game -> $field_name; ?>
					<?php endif; ?>
				</td>
			<?php endforeach; ?>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>				
<?php if(strlen($pagination)) : ?>
	<div class="lead pagination_links">
		Pages: <?php echo $pagination; ?>
	</div>
<?php endif; ?>										
