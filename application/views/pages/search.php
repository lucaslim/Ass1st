<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1><?php echo $title ?><small><?php echo $page_links ?></small></h1>
			<table>
				<?php foreach ($results as $value): ?>
					<tr>
						<td>
							<img style="width:150px; height:150px" src="<?php echo base_url(); ?>uploads/teamlogos/<?php echo $value -> Picture?>">
						</td>
						<td style="vertical-align: top;">
							<div>
								<a href="<?php echo base_url() . $value -> Url . $value -> Id?>"><?php echo $value -> Name ?></a>&nbsp;<small><em>(<?php echo $value -> Type?>)</em></small>
							</div>
							<?php if($value -> Type == 'Players'): ?>
								<!-- Player info -->
								<div>
									<?php $arr_place = array(); ?>
									<?php if(!empty($value -> City)) array_push($arr_place, $value -> City) ?>
									<?php if(!empty($value -> Province)) array_push($arr_place, $value -> Province) ?>
									<?php if(!empty($value -> CountryName)) array_push($arr_place, $value -> CountryName) ?>
									<?php echo implode(', ', $arr_place); ?>
								</div>
							<?php elseif($value -> Type == 'Team'): ?>
								<!-- Team Info -->
								<div>
									<?php echo $value -> LeagueName ?>									
								</div>
								<div>
									<?php echo $value -> ConferenceName ?> Conference
								</div>
								<div>
									<?php echo $value -> ArenaName ?>
								</div>
							<?php endif; ?>
						</td>
					</tr>					
				<?php endforeach;?>
			</table>
		</div>
	</div>
</div>