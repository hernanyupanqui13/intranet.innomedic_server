	<?php $query_ss = $this->db->query("select * from th_employe");
    foreach ($query_ss->result() as $datas) {
     	$namex = $datas->name;
     	$emailx = $datas->email;
     	$addressx = $datas->address;
     	$telephonex  = $datas->telephone;
     	$phone_onex = $datas->phone_one;
     	$sms_mailx = $datas->sms_mail;
     	$facebookx = $datas->facebook;
		$twiterx = $datas->twiter;
		$googlex = $datas->google;
		$instagramx = $datas->instagram;
		$addressx = $datas->address;
		$address_onex = $datas->address_one;
		$logox = $datas->logo;
     } ?>

	<!--quick links-->
	<div class="quickLinks-wrap js-quickLinks-wrap-d d-none d-lg-flex">
		<div class="quickLinks js-quickLinks">
			<div class="container">
				<div class="row no-gutters">
					<div class="col">
						<a href="#" class="link">
							<i class="icon-placeholder"></i><span>Ubicación</span></a>
						<div class="link-drop p-0">
							<!--<div id="googleMapDrop" class="google-map"></div>-->
							 <div class="google-map">
							 	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.3850096385618!2d-77.00268631842316!3d-12.085773777662784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c76bbec287d5%3A0xc317e18004b9b72b!2sInnomedic%20International!5e0!3m2!1ses-419!2spe!4v1571435619054!5m2!1ses-419!2spe" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
						</div>
					</div>
					<div class="col">
						<a href="#" class="link">
							<i class="icon-clock"></i><span>Tiempo de trabajo</span>
						</a>
						<div class="link-drop">
							<h5 class="link-drop-title"><i class="icon-clock"></i>Tiempo de trabajo</h5>
							<table class="row-table">
								<?php  $time_jobs = $this->db->query("select * from t_time_job");
										 foreach ($time_jobs->result() as $xx) {?>
								<tr>
									<td><i><?php echo $xx->dia;?></i></td>
									<td><?php echo $xx->hours;?></td>
								</tr>
								<?php } ?>

							</table>
						</div>
					</div>
					<div class="col">
						<a href="#" class="link">
							<i class="icon-pencil-writing"></i><span>Solicita una cotizacion</span>
						</a>
						<div class="link-drop">
							<h5 class="link-drop-title"><i class="icon-pencil-writing"></i>Solicita una cotización</h5>
							<form id="requestForm" method="post" novalidate>
								<div class="successform">
									<p>Your message was sent successfully!</p>
								</div>
								<div class="errorform">
									<p>Something went wrong, try refreshing and submitting the form again.</p>
								</div>
								<div class="input-group">
									<span>
									<i class="icon-user"></i>
								</span>
									<input name="requestname" type="text" class="form-control" placeholder="Nombres y apellidos" />
								</div>
								<div class="input-group row-sm-space mt-1">
									<span>
									<i class="icon-user"></i>
								</span>
									<input name="requestname" type="text" class="form-control" placeholder="Nombre de su empresa" />
								</div>
								
								<div class="row row-sm-space mt-1">
									<div class="col">
										<div class="input-group">
											<span>
											<i class="icon-email2"></i>
										</span>
											<input name="requestemail" type="text" class="form-control" placeholder="Ingrese E-mail" />
										</div>
									</div>
									<div class="col">
										<div class="input-group">
											<span>
											<i class="icon-smartphone"></i>
										</span>
											<input name="requestphone" type="text" class="form-control" placeholder="Nº celular" />
										</div>
									</div>
								</div>
								<div class="row-sm-space mt-1"></div>
								
								<textarea name="requestmessage" class="form-control" placeholder="Mensaje" rows="3"></textarea>
								<div class="text-right mt-2">
									<button type="submit" class="btn btn-sm btn-hover-fill">Enviar Cotización</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col">
						<a href="#" class="link">
							<i class="icon-calendar"></i><span>Historias en Linea</span>
						</a>
						<div class="link-drop">
							<h5 class="link-drop-title"><i class="icon-calendar"></i>Ya puedes consultar tu Historia Clínica en Internet</h5>
							<p>Pueden acceder ya a su historia clínica digital a través de la página web oficial de la Innomedic International.</p>
							<p class="text-right"><a target="_blank" href="http://200.48.125.66:8021/" class="btn btn-sm btn-hover-fill">Ingresar ahora</a></p>
						</div>
					</div>
					<div class="col">
						<a href="#" class="link">
							<i class="icon-emergency-call"></i><span>Comunicate con nosotros </span></a>
						<div class="link-drop">
							<h5 class="link-drop-title"><i class="icon-emergency-call"></i>Comunicate con nosotros</h5>
							<p>Es posible que necesite una atención de uno de nuestros asesores</p>
							<ul class="icn-list">
								<li><i class="icon-telephone"></i><span class="phone"><?php echo $telephonex;?><br><?php echo $phone_onex;?></span>
								</li>
								<li><i class="icon-black-envelope"></i><a href="mailto:info@besthotel-email.com"><?php echo $emailx; ?></a></li>
							</ul>
							<p class="text-right mt-2"><a href="<?php echo base_url().'Contacto/';?>" class="btn btn-sm btn-hover-fill">Nuestros Contactos</a></p>
						</div>
					</div>
					<div class="col col-close"><a href="#" class="js-quickLinks-close"><i class="icon-top" data-toggle="tooltip" data-placement="top" title="Close panel"></i></a></div>
				</div>
			</div>
			<div class="quickLinks-open js-quickLinks-open"><span data-toggle="tooltip" data-placement="left" title="Open panel">+</span></div>
		</div>
	</div>
	<div class="page-content">
		<!--section-->
		<div class="section mt-0">
			<div class="breadcrumbs-wrap">
				<div class="container">
					<div class="breadcrumbs">
						<a href="<?php echo base_url();?>">Innomedic</a>
						<span>Servicios</span>
					</div>
				</div>
			</div>
		</div>
		<!--//section-->
		<!--section-->
		<div class="section page-content-first">
			<div class="container">
				<div class="text-center mb-2  mb-md-3 mb-lg-4">
					<div class="h-sub theme-color">Lo que ofrecemos</div>
					<h1>Nuestros Servicios</h1>
					<div class="h-decor"></div>
					<div class="text-center mt-4">
						<p>Todos estos servicios se prestan para permitir a los pacientes disfrutar de un <br>estilo de vida saludable</p>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row col-equalH">
					<?php foreach ($service as $ser): ?>
						<div class="col-md-6 col-lg-4">
						<div class="service-card">
							<div class="service-card-photo">
								<a href="<?php echo "javascript:void(0);"?>"><img src="<?php echo base_url().'assets/';?>images/content/<?php echo $ser->img_view;?>?v=<?php echo rand();?>" class="img-fluid" alt=""></a>
							</div>
							<h5 class="service-card-name"><a href="<?php echo "javascript:void(0);" ?>"><?php echo $ser->title; ?></a></h5>
							<div class="h-decor"></div>
							<p><?php echo $ser->desc; ?></p>
						</div>
					</div>
					<?php endforeach ?>
					
				</div>
			</div>
		</div>
		<!--//section-->
