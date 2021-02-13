			<div class="container">
				<div class="title-wrap text-center">
					<div class="h-sub theme-color">Las empresas que confias en nosotros</div>
					<h2 class="h1">Nuestros Clientes</h2>
					<div class="h-decor"></div>
				</div>
				<div class="special-carousel js-special-carousel row">
					<?php $lista_cliente = $this->db->query("select * from t_clientes_empresas order by Id desc");
					 foreach ($lista_cliente->result() as $cli) { ?>
					<div class="col-2">
						<div class="special-card">
							<div class="special-card-photo">
								<img src="<?php echo base_url().'assets/';?>images/content/<?php echo $cli->img;?>?v=<?php echo rand();?>" alt="">
							</div>
							<div class="special-card-caption text-left">
								<div class="special-card-txt1"><?php echo $cli->name;?></div>
								<div class="special-card-txt2"><?php echo $cli->subtitle;?></div>
								<div class="special-card-txt3"><?php echo $cli->description;?></div>
								<div>
									<?php if ($cli->url =="" or $cli->url==NULL) {?>
										<a href="javascript:void(0);" class="btn"><i class="icon-right-arrow"></i><span>Mas Información</span><i class="icon-right-arrow"></i></a>
									<?php }else{?>
										<a target="_blank" href="<?php echo $cli->url;?>" class="btn"><i class="icon-right-arrow"></i><span>Mas Información</span><i class="icon-right-arrow"></i></a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					
				</div>
			</div>