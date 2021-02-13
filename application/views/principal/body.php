<!--
http://websmirno.site/medin/html/medera-html/
http://websmirno.site/medin/html/dentco-html/-->

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
		$aboutx = $datas->about;
		$viewsx = $datas->views;
     } ?>	
		<!--//header-->
	<div class="page-content">
		<!--section slider-->
		<div class="section mt-0">
			<div class="quickLinks-wrap js-quickLinks-wrap-d d-none d-lg-flex">
				<div class="quickLinks js-quickLinks">
					<div class="container">
						<div class="row no-gutters">
							<div class="col">
								<a href="#" class="link">
									<i class="icon-pencil-writing"></i><span>Solicita una cotizacion</span>
								</a>
								<div class="link-drop">
									<h5 class="link-drop-title"><i class="icon-pencil-writing"></i>Solicita una cotización</h5>
									<form id="requestForm" method="post" novalidate>
										<div class="successform">
											<p>¡Su mensaje fue enviado exitosamente!</p>
										</div>
										<div class="errorform">
											<p>Algo salió mal, intente actualizar y enviar el formulario nuevamente.</p>
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
											<input name="requestemploye" type="text" class="form-control" placeholder="Nombre de su empresa" />
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
									<i class="icon-emergency-call"></i><span>Comunicate con nosotros </span></a>
								<div class="link-drop">
									<h5 class="link-drop-title"><i class="icon-emergency-call"></i>Comunicate con nosotros</h5>
									<p>Es posible que necesite una atención de uno de nuestros asesores</p>
									<ul class="icn-list">
										<li><i class="icon-smartphone"></i><span class="phone"><?php echo $telephonex;?><br><!--<?php echo $phone_onex;?>--></span>
										<li><i class="icon-telephone"></i><span class="phone"><?php echo $phone_onex;?></span>
										</li>
										</li>
										<li><i class="icon-black-envelope"></i><a href="mailto:info@besthotel-email.com"><?php echo $emailx; ?></a></li>
									</ul>
									<p class="text-right mt-2"><a href="javascript:void(0)" class="btn btn-sm btn-hover-fill">Nuestros Contactos</a></p>
								</div>
							</div>
							<div class="col col-close"><a href="#" class="js-quickLinks-close"><i class="icon-top" data-toggle="tooltip" data-placement="top" title="Close panel"></i></a></div>
						</div>
					</div>
					<div class="quickLinks-open js-quickLinks-open"><span data-toggle="tooltip" data-placement="left" title="Open panel">+</span></div>
				</div>
			</div>

            
   
			<!--aqui va la nota de las cosas .-->
			<div id="mainSliderWrapper">
				<div class="loading-content">
					<div class="inner-circles-loader"></div>
				</div>
				<div class="main-slider arrows-white arrows-bottom" id="mainSlider" data-slick='{"arrows": false, "dots": false}'>

					<?php $query_slider = $this->db->query("select * from t_slider where estado=1 order by Id desc");
					foreach ($query_slider->result() as $xx) {?>
					 <div class="slide">
						<div class="img--holder" data-animation="kenburns" data-bg="<?php echo base_url().'assets/';?>images/content/slider/<?php echo $xx->img;?>?ver=<?php echo rand();?>"></div>
						<div class="slide-content center">
							<div class="vert-wrap container">
								<div class="vert">
									<div class="container">
										<div class="slide-txt1" data-animation="fadeInDown" data-animation-delay="1s"><?php echo $xx->title;?></div>
										<div class="slide-txt2" data-animation="fadeInUp" data-animation-delay="1.5s"><?php echo $xx->description; ?></div>
										<div class="slide-btn"><a href="<?php if($xx->url==""){ echo "javascript:void(0)";}else{echo "$xx->url";} ?>" class="btn btn-white" data-animation="fadeInUp" data-animation-delay="2s"><i class="icon-right-arrow"></i><span><?php echo $xx->btn;?></span><i class="icon-right-arrow"></i></a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					 <?php } ?>
					
				</div>
			</div>

		</div>
		<!--//section slider--> 
		<!--section welcome-->

	<!--//section slider-->

	<?php foreach ($static_view_one as $static_one) {
		$titlexx = $static_one->title;
		$subtitlexx = $static_one->subtitle;
		$descriptionxx = $static_one->description;
		$anosxx = $static_one->anos;
		$subtitle_reserxx = $static_one->subtitle_reser;
		$videoxx = $static_one->video;
	} ?>

	<?php 	foreach ($gallery as $galy) {
     	$img_aboutx = $galy->img_about;
     	$img_about1x = $galy->img_about1;
     	$img_about2x = $galy->img_about2;
     	$img_aboutx3 = $galy->img_about3;
     	$img_aboutx4 = $galy->img_about4;
     } ?>


		<!--section welcome-->
		<span id="Nosotros"></span>
		<!--section welcome-->
		<div class="section">
			<div class="container pt-lg-2">
				<div class="title-wrap text-center text-md-left  mb-lg-2">
					<div class="h-sub"><?php echo $subtitlexx; ?></div>
					<h2 class="h1">Bienvenido <br class="d-sm-none">a <span class="theme-color"><?php 	echo $titlexx;?></span></h2>
				</div>
				<div class="row mt-2 mt-md-3 mt-lg-0">
					<div class="col-md-6">
						<div class="title-wrap hidden d-none d-lg-block text-center text-md-left">
							<div class="h-sub">15 Years of Dental Excellence</div>
							<h2 class="h1">Welcome to <span class="theme-color">Dental Clinic</span></h2>
						</div>
						<div>
							<p><?php echo $descriptionxx; ?></p>
						</div>
						<div class="mt-2 mt-md-4"></div>
						<a href="javascript:void(0)" class="btn-link" >Ver mas sobre nosotros<i class="icon-right-arrow"></i></a>
					</div>
					<div class="col-md-6 mt-3 mt-md-0">
						<div class="video-wrap embed-responsive embed-responsive-16by9">
							<iframe src="https://player.vimeo.com/video/266811190?&amp;autoplay=0&amp;loop=1&amp;portrait=0&amp;byline=0&amp;title=0" allowfullscreen></iframe>
							<!--&amp;autoplay=1&amp;loop=1&amp;portrait=0&amp;byline=0&amp;title=0-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--//section welcome-->

		<!--//section-->
		<span id="Servicios"></span>

		<!--section services-->
		<!--section services-->

		<div class="section" style="background-image: url('<?php echo base_url().'assets/';?>images/content/abstract-blue-fractal-wave-technology-background_1017-15837.jpg?v=<?php echo rand();?>');  background-repeat: no-repeat; background-size: cover;">
			<br>
			<div class="container">
				<div class="title-wrap text-center">
					<h2 class="h1 text-white" style="font-size: 3em; text-decoration: unset;">Servicios</h2>
					
				</div>
				<div class="row d-block js-counter-carousel">
					<?php $service = $this->db->query("select * from t_view_service order by Id desc");
					 foreach ($service->result() as $ser): ?>
					<div class="col bajar" >
							
						<div class="text-center icn-text icn-text-wmax imagen_serv">
							<img src="<?php echo base_url().'assets/';?>images/content/<?php echo $ser->img;?>?v=<?php echo rand();?>" alt="" style="width: 50%;" class="imagen_ser">

							<h6 class="icn-text-title text-center text-white"><?php echo $ser->title; ?></h6>
							
							<div class="decor"></div>
							
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			
		</div>
		<style>
			.bajar{
				margin-top: 1.5em;
			}
			.imagen_serv{
				max-width: 40%;
				width: 70%;
			}
			.imagen_serv:hover{
				border-radius: 5px solid #ffffff;

			}

			.imagen_ser:hover{
				border-radius:50%;
				-webkit-border-radius:50%;
				box-shadow: 0px 0px 5px 6px #ffffff;
				-webkit-box-shadow: 0px 0px 5px 5px #ffffff;
				transform: rotate(360deg);
				-webkit-transform: rotate(360deg);
				cursor: pointer;
			}
		</style>
		<!--section why choose us-->
		<!--<div class="" style="background-image: url('<?php echo base_url().'assets/';?>images/content/abstract-blue-fractal-wave-technology-background_1017-15837.jpg');  background-repeat: no-repeat; background-size: cover;">
			<div class="h-decor"></div>
			<div class="container">
				<div class="title-wrap text-center">
					<h2 class="h1 text-white" style="font-size: 3em;">Servicios</h2>
					<div class="h-decor text-white"></div>
				</div>
				<div class="row ">
					<?php $service = $this->db->query("select * from t_view_service order by Id asc");
					 foreach ($service->result() as $ser): ?>
					<div class="col-md-4">
						<div class="icn-text icn-text-wmax">
							<div class="icn-text-circle"><i class="<?php echo $ser->icon;?>"></i></div>
							<div>
								<h5 class="icn-text-title text-white"><?php echo $ser->title; ?></h5>
								
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="h-decor"></div>
		</div>-->

		<!--section-->
		<div class="">
			<div class="container-fluid p-5">
				<div class="row no-gutters">
					<div class="col-xl-6 "><!--<<<<---bg-grey-->
						<div class="max-670 mx-lg-auto px-15">
							<div class="title-wrap">
								<h2 class="h1">Nuestras  <span class="theme-color">ventajas</span></h2>
							</div>
							<div class="mt-lg-5"></div>
							<div class="row">
								<div class="col-sm-8">
									<ul class="marker-list-md">
										<?php foreach ($lista7_areas as $xx) {?>
											<li><?php echo $xx->name;?></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-sm-4 mt-1 mt-sm-0">
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

		<!--//section why choose us-->
		<!--//section-->
		<hr class="border">
		<span id="staff"></span>

		<div class="">
			<br>
			<div class="container">
				<div class="title-wrap text-center">
					<h2 class="h1" style="font-size: 3em;">Staff</h2>
					<div class="h-decor"></div>
				</div>
				<div class="row d-block js-counter-carousel">
					<?php 
					 foreach ($view_doctor as $doc) { ?>
						<div class="col ">
							<div class="counter-box snip1566 imagen" >
								<div class="counter-box-icon image_radius">	<img src="<?php echo base_url().'assets/';?>images/content/<?php echo $doc->image;?>?v=<?php echo rand();?>" alt="" class="img-fluid " style="border-radius: 50%;">
								</div>
								<div class="decor"></div>
								<div class="counter-box-text"><?php echo $doc->name;?></div>
								<p class="text-center"><?php echo $doc->description;?></p>
								<!--<br><strong>CEP:</strong>
								<?php echo $doc->cip;?>-->

							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<br>
		</div>

		<style>
			
			.image_radius{
				background-color: #ffffff ;
				border-radius: 50%
			}
			.imagen{
				background-color: #DDE1EC ;
				border-radius: 15px;

			}

			.imagen:hover{
				background: #AAAFBD;
				cursor: pointer;
				-webkit-box-shadow: 2px 0px 36px -1px rgba(135,140,148,0.69);
				-moz-box-shadow: 2px 0px 36px -1px rgba(135,140,148,0.69);
				box-shadow: 2px 0px 36px -1px rgba(135,140,148,0.69);
				
			}
			.color-white:hover{
				color: #ffffff;
			}
					 
			


		</style>
		<!--//section services-->
		<div class="">
			<div class="container-fluid px-0">
				<div class="banner-center bg-cover" style="background-image: url('<?php echo base_url().'assets/';?>images/content/banner-center.jpg?v=<?php echo rand(); ?>')">
					<div class="banner-center-caption text-center">
						<div class="banner-center-text1">¡Consigue lo que siempre has deseado!</div>
						<div class="banner-center-text2">Nos esforzamos por brindar un servicio de la más alta calidad a tarifas razonables.</div>
						<a href="#" class="btn btn-white mt-5" data-toggle="modal" data-target="#modalBookingForm"><i class="icon-right-arrow"></i><span>Solicitar una cotización</span><i class="icon-right-arrow"></i></a>
					</div>
				</div>
			</div>
		</div>

		<?php foreach ($oficina_view as $escudero) {
			$titlex = $escudero->title;
			$subtitlex = $escudero->subtitle;
			$descx = $escudero->desc;
		} ?>
		<!--//areas-->
		<span id="NuestrasAreas"></span>
		<!--section-->
		<div class="section" >
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="title-wrap">
							<h2 class="h1" style="font-size: 2.5em;"><?php echo $titlex;?></h2>
							<div class="h-decor"></div>
						</div>
						<p><?php echo $descx; ?></p>
						<div class="mt-4"></div>
						<!--<h3><?php echo $subtitlex; ?></h3>-->
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
								<?php $query = $this->db->query("select * from  t_consultorias order by Id asc");
								foreach ($query->result() as $evaristo) {?>
								 	<li><img src="<?php echo base_url().'assets/';?>images/content/<?php echo $evaristo->img;?>?v=<?php echo rand();?>" alt=""></li>
								 <?php } ?>
							</ul>
							<ul class="slider-gallery-thumbs list-unstyled js-slider-gallery-thumbs">
								<?php $query = $this->db->query("select * from  t_consultorias order by Id asc");
								foreach ($query->result() as $eva) {?>
									<li><img src="<?php echo base_url().'assets/';?>images/content/<?php echo $eva->img_small;?>?v=<?php echo rand();?>" alt=""></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--//section-->

		<hr />




		


		<style>
			.color:hover{
				border: 2px solid #1e76bd;
				box-shadow: 0px 0px 3px 3px #1e76bd;
			}
		</style>

		<!--section call us-->


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  

			<?php
				  # Iniciando la variable de control que permitirá mostrar o no el modal
				  $exibirModal = false;
				  # Verificando si existe o no la cookie
				  if(!isset($_COOKIE["mostrarModal"]))
				  {
				    # Caso no exista la cookie entra aquí
				    # Creamos la cookie con la duración que queramos
				     
				    $expirar = 3600; // muestra cada 1 hora
				    //$expirar = 10800; // muestra cada 3 horas
				    //$expirar = 21600; //muestra cada 6 horas
				    //$expirar = 43200; //muestra cada 12 horas
				    //$expirar = 86400;  // muestra cada 24 horas
				    setcookie('mostrarModal', 'SI', (time() + $expirar)); // mostrará cada 12 horas.
				    # Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
				    $exibirModal = true;
				  }
				?>

				<?php if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario.// ?>
				  <script>
				  $(document).ready(function()
				  {
				    // id de nuestro modal
				    $('.grgergrvgveg').modal("show");
				   // $('#modalBookingForm').modal('toggle')
				  });
			</script>
			  <?php endif; ?>

			
			<script>
		    	$.ajax({
		    	   type:"get",
				   url:"<?php echo base_url().'Inicio/index_slider/';?>",
				   timeout: 500,     // timeout milliseconds
				   dataType: 'html',
				   success:function(response){
				      $("#content").html(response);
				   },error:function(){
				    $('#content').load(location.href+" #content>*","");
				   }
				});    
		    </script>


