<div class="section">
			<div class="container">
				<div class="title-wrap text-center">
					<div class="h-sub theme-color">La motivación es fácil.</div>
					<h2 class="h1">Nuestros valores mas importantes</h2>
					<div class="h-decor"></div>
				</div>
				<div class="row js-icn-carousel icn-carousel flex-column flex-sm-row text-center text-sm-left" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}]}'>
					<?php foreach ($lista_valores as $xx) {?>
					<div class="col-md">
						<div class="icn-text">
							<div class="icn-text-simple"><i class="<?php echo $xx->img;?>"></i></div>
							<div>
								<h5 class="icn-text-title"><?php echo $xx->name;?></h5>
								<p><?php echo $xx->description;?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>