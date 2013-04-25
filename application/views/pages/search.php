<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1><?php echo $title ?><small><?php echo $page_links ?></small></h1>
			<h2><small>About <?php echo $total_rows; ?> result(s)</small></h2>
			<table>
				<?php foreach ( $results as $value ): ?>
					<tr>
						<td>
							<?php $img_src = ""; ?>
							<?php if ( strpos( $value -> Picture, 'http' ) !== false ): ?>
								<?php $img_src = $value -> Picture; ?>
							<?php elseif ( !empty( $value -> Picture ) && $value -> Type == 'Team' ): ?>
								<?php $img_src = base_url() . 'uploads/teamlogos/' . $value -> Picture; ?>
							<?php elseif ( !empty( $value -> Picture ) && $value -> Type == 'Players' ): ?>
								<?php $img_src = base_url() . 'uploads/playerlogo/' . $value -> Picture; ?>
							<?php else : ?>
								<?php $img_src = base_url() . 'uploads/teamlogos/blank_avatar.png'; ?>
							<?php endif; ?>
							<img style="width:150px; height:150px" src="<?php echo $img_src; ?>">
						</td>
						<td style="vertical-align: top;">
							<div>
								<a href="<?php echo base_url() . $value -> Url . $value -> Id?>"><?php echo $value -> Name ?></a>&nbsp;<small><em>(<?php echo $value -> Type?>)</em></small>
							</div>
							<?php if ( $value -> Type == 'Players' ): ?>
								<!-- Player info -->
								<div>
									<?php $arr_place = array(); ?>
									<?php if ( !empty( $value -> City ) ) array_push( $arr_place, $value -> City ) ?>
									<?php if ( !empty( $value -> Province ) ) array_push( $arr_place, $value -> Province ) ?>
									<?php if ( !empty( $value -> CountryName ) ) array_push( $arr_place, $value -> CountryName ) ?>
									<?php echo implode( ', ', $arr_place ); ?>
								</div>
							<?php elseif ( $value -> Type == 'Team' ): ?>
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
