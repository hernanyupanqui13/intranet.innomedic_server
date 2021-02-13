<?php 
    foreach ($t_employe_view as $datas) {
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
		$aboutx = $datas->about;
		$viewsx = $datas->views;
     } ?>

     <?php 	foreach ($gallery as $galy) {
     	$img_aboutx = $galy->img_about;
     	$img_about1x = $galy->img_about1;
     	$img_about2x = $galy->img_about2;
     	$img_aboutx3 = $galy->img_about3;
     	$img_aboutx4 = $galy->img_about4;
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

	<!--//quick links-->
	<div class="page-content">
		<!--section-->
		<div class="section mt-0">
			<div class="breadcrumbs-wrap">
				<div class="container">
					<div class="breadcrumbs">
						<a href="<?php echo base_url();?>">Inicio</a>
						<span>Sobre Nosotros</span>
					</div>
				</div>
			</div>
		</div>
		<!--section-->
		<div class="section page-content-first">
			<div class="container">
				<div class="text-center mb-2  mb-md-3 mb-lg-4">
					<div class="h-sub theme-color">Conoce más acerca de nosotros</div>
					<h1>Sobre nuestra clinica</h1>
					<div class="h-decor"></div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 text-center text-lg-left pr-md-4">
						<img src="<?php echo base_url().'assets/';?>images/content/<?php echo $img_aboutx;?>?v=<?php echo rand();?>" class="w-100" alt="">
						<div class="row mt-4">
							<div class="col-6">
								<img src="<?php  echo base_url().'assets/';?>images/content/<?php echo $img_about1x;?>?v=<?php echo rand();?>" class="w-100" alt="">
							</div>
							<div class="col-6">
								<img src="<?php  echo base_url().'assets/';?>images/content/<?php echo $img_about2x;?>?v=<?php echo rand();?>" class="w-100" alt="">
							</div>

						</div>
						<div class="mt-4"></div>
						<img src="<?php echo base_url().'assets/';?>images/content/<?php echo $img_aboutx3;?>?v=<?php echo rand();?>" class="w-100" alt="">
					</div>
					<div class="col-lg-6 mt-3 mt-lg-0">
						<span><?php echo $aboutx; ?></span>
						<div class="mt-3 mt-md-7"></div>
						<!--<h3>Misión / Visión /<span class="theme-color">&nbsp;Valores</span></h3>-->
						<div class="mt-0 mt-md-4"></div>
						<?php echo $viewsx;?>
					</div>
				</div>
			</div>
		</div>
		<!--//section-->

		

		<!--section-->
		<div class="section">
			<div class="container ">
				<div class="title-wrap text-center">
					<div class="h-sub theme-color">La motivación es fácil.</div>
					<h2 class="h1">Nuestros valores mas importantes</h2>
					<div class="h-decor"></div>
				</div>
				<!--<span class=""></span>-->
				<div class="cargar_resultado1 row js-icn-carousel icn-carousel flex-column flex-sm-row text-center text-sm-left" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}]}'>
					
					
				</div>
			</div>
		</div>



		<!--section-->
		<div class="section">
			<div class="container-fluid p-5">
				<div class="row no-gutters">
					<div class="col-xl-6 "><!--<<<<---bg-grey-->
						<div class="max-670 mx-lg-auto px-15">
							<div class="title-wrap">
								<h2 class="h1">Nuestras  <span class="theme-color">ventajas</span></h2>
							</div>
							<div class="mt-lg-5"></div>
							<div class="row">
								<div class="col-sm-7">
									<ul class="marker-list-md">
										<?php foreach ($lista7_areas as $xx) {?>
											<li><?php echo $xx->name;?></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-sm-5 mt-1 mt-sm-0">
									<ul class="marker-list-md">
										<?php foreach ($lista_ventajas_mas as $xxx) {?>
											<li><?php echo $xxx->name;?></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 banner-left bg-full" 
					style="background-image: url('<?php  echo base_url().'assets/';?>images/content/<?php echo $img_aboutx4;?>?v=<?php echo rand();?>')"></div>
				</div>
			</div>
		</div>
		<!--//section-->
		<!--section-->
		<div class="section">
			<div class="container-fluid px-0">
				<div class="banner-center bg-cover" style="background-image: url('<?php echo base_url().'assets/';?>images/content/banner-center.jpg?v=<?php echo rand(); ?>')">
					<div class="banner-center-caption text-center">
						<div class="banner-center-text1">¡Consigue lo que siempre has deseado!</div>
						<div class="banner-center-text2">Nos esforzamos por brindar un servicio de la más alta calidad a tarifas razonables</div>
						<a href="#" class="btn btn-white mt-5" data-toggle="modal" data-target="#modalBookingForm_nosotros"><i class="icon-right-arrow"></i><span>Solicitar una cotización</span><i class="icon-right-arrow"></i></a>
					</div>
				</div>
			</div>
		</div>
		<?php foreach ($oficina_view as $escudero) {
			$titlex = $escudero->title;
			$subtitlex = $escudero->subtitle;
			$descx = $escudero->desc;
		} ?>

		<!--section-->
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="title-wrap">
							<h2 class="h1"><?php echo $titlex;?></h2>
							<div class="h-decor"></div>
						</div>
						<p><?php echo $descx; ?></p>
						<div class="mt-4"></div>
						<h3><?php echo $subtitlex; ?></h3>
						<div class="mt-lg-4"></div>
						<ul class="marker-list-md">
							<?php foreach ($consultoriasname as $xx) {?>
								<li><?php echo $xx->name;?></li>
							<?php } ?>
						</ul>
					</div>
					<div class="col-lg-8 mt-4 mt-lg-0">
						<div class="slider-gallery">

							<!--aqui se tiene que hacer con ajax-->
							<ul class="slider-gallery-main list-unstyled js-slider-gallery-main">
								<?php $query = $this->db->query("select * from  t_consultorias");
								foreach ($query->result() as $evaristo) {?>
								 	<li><img src="<?php echo base_url().'assets/';?>images/content/<?php echo $evaristo->img;?>?v=<?php echo rand(); ?>" alt=""></li>
								 <?php } ?>
							</ul>
							<ul class="slider-gallery-thumbs list-unstyled js-slider-gallery-thumbs">
								<?php $query = $this->db->query("select * from  t_consultorias");
								foreach ($query->result() as $eva) {?>
									<li><img src="<?php echo base_url().'assets/';?>images/content/<?php echo $eva->img_small;?>?v=<?php echo rand(); ?>" alt=""></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--//section-->

		<div class="modal modal-form fade grgergrvgveg" id="modalBookingForm_nosotros" data-backdrop="static" data-keyboard="false" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<button aria-label='Close' class='close' data-dismiss='modal'>
						<i class="icon-error"></i>
					</button>
					<div class="modal-body">
						<div class="modal-form">
							<h1 class="theme-color" style="text-align: center;">Solicita una cotización</h1>
							<div class="text-center">
								<img src="<?php echo base_url().'assets/';?>images/<?php echo $logox;?>?v=<?php echo rand();?>" alt=""><br><br>
								<span>Si desea conocer nuestro sistema de gestión y todas las soluciones que tenemos para usted, déjenos sus comentarios</span>
							</div>
							<br>
							<form class="mt-15" id="bookingForm_nosotros" method="post" novalidate>
								<div class="successform">
									<p class="text-center">¡Su mensaje fue enviado exitosamente!</p>
								</div>
								<div class="errorform">
									<p>Algo salió mal, intente actualizar y enviar el formulario nuevamente.</p>
								</div>
								<div class="input-group">
									<span>
									<i class="icon-user"></i>
								</span>
									<input type="text" name="bookingname" class="form-control" autocomplete="off" placeholder="Nombres y apellidos " />
								</div>
								<div class="input-group">
									<span>
									<i class="icon-user"></i>
								</span>
									<input type="text" name="bookingemploye" class="form-control" autocomplete="off" placeholder="Nombre de su empresa " />
								</div>
								<div class="row row-xs-space mt-1">
									<div class="col-sm-12">
										<div class="input-group">
											<span>
												<i class="icon-email2"></i>
											</span>
											<input type="text" name="bookingemail" class="form-control" autocomplete="off" placeholder="Ingrese su e-mail" />
										</div>
									</div>
									
								</div>
								<!--telñefono-->
								<div class="row row-xs-space mt-1">
									<div class="col-sm-12 ">
										<div class="input-group">
											<span>
												<i class="icon-smartphone"></i>
											</span>
											<input type="number" name="bookingphone" class="form-control" autocomplete="off" placeholder="Ingrese su teléfono" />
										</div>
									</div>
								</div>
								<!--<div class="row row-xs-space mt-1">
									<div class="col-sm-6">
										<div class="input-group">
											<span>
												<i class="icon-birthday"></i>
											</span>
											<input type="number" name="bookingage" class="form-control" autocomplete="off" placeholder="¿Cual es tu Edad?" />
										</div>
									</div>
								</div>-->
								<!--
								<div class="selectWrapper input-group mt-1 form-group">
									<span>
										<i class="icon-tooth"></i>
									</span>
									<select name="bookingservice" class="form-control">
										<option selected="selected" disabled="disabled">Seleccionar Especialidad</option>
										<?php foreach ($areas as $xx) { ?>
											<option value="<?php echo $xx->Id;?>"><?php echo $xx->name; ?></option>
										<?php } ?>
									</select>
								</div>--><!--
								<div class="input-group flex-nowrap mt-1">
									<span>
										<i class="icon-calendar2"></i>
									</span>
									<div class="datepicker-wrap">
										<input name="bookingdate" type="text" class="form-control datetimepicker" placeholder="Fecha a reservación" readonly>
									</div>
								</div>
								<div class="input-group flex-nowrap mt-1">
									<span>
										<i class="icon-clock"></i>
									</span>
									<div class="datepicker-wrap">
										<input name="bookingtime" type="text" class="form-control timepicker" placeholder="Hora">
									</div>
								</div>-->
								<textarea name="bookingmessage" class="form-control" placeholder="Mensaje" rows="4"></textarea>
								<div class="text-center mt-2">
									<button type="submit" class="btn btn-sm btn-hover-fill">Enviar cotización</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
	<script>
		 $.ajax({
		    url: "<?php echo base_url().'Nosotros/cargar_valores/';?>",
		    method:"POST",
		    contentType:false,
		    processData:false,
		    success:function(data){

		      	var resultado = JSON.parse(data);
				var contenido = '';

				$.each(resultado, function(index, value) {
				    contenido +=
				    	'<div class="col-md">'+
					       '<div class="icn-text">'+
						       '<div class="icn-text-simple"> <i class="'+value.img+'"></i></div>'+
						       '<div>'+
						       		'<h5 class="icn-text-title">'+value.name+'</h5>'+
						       		//'<p>'+value.description+'</p>'+
						       '</div>'+
					       '</div>'+ 
				    '</div>';
				});

				$(".cargar_resultado1").html(contenido);
		    }
		})
	</script>



