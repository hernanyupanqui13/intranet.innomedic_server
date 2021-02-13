    
		
		
		<div class="" >
			<br><br>
			<div class="container">
				<div class="title-wrap text-center">
					<h2 class="h1 " style="font-size: 3em;">Clientes</h2>
					<div class="h-decor"></div>
				</div>
				<div class="row d-block js-counter-carousel">
					<?php $lista_cliente = $this->db->query("select * from ts_clientes_empresas where estado=1 order by Id desc");
					 foreach ($lista_cliente->result() as $cli) { ?>
						<div class="col">
							<div class=" snip1566">
								<img src="<?php echo base_url().'assets/';?>images/content/<?php echo $cli->img;?>?v=<?php echo rand();?>" alt="">
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<br>
		</div> 
		<hr class="border">

		<div class="">
			<br><br>
			<div class="container-fluid px-0">	
				<div class="title-wrap text-center">
					<h2 class="h1" style="font-size: 3em;">Ubícanos</h2>
					<div class="h-decor"></div>
				</div>
				<div class="banner-center bg-cover">
					<iframe class="iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.356645417348!2d-77.00072238561734!3d-12.087719045953811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c76bbec287d5%3A0xc317e18004b9b72b!2sInnomedic%20International!5e0!3m2!1ses-419!2spe!4v1571873441907!5m2!1ses-419!2spe"   frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>

		<style>
			.iframe{
				max-width: 100%;
				width: 100%;
				height: 500px;
				max-height: 500px;
			}
		</style>

		


    </div>

    <?php $query = $this->db->query("select * from th_employe");
    foreach ($query->result() as $data) {
     	$namex = $data->name;
     	$emailx = $data->email;
     	$addressx = $data->address;
     	$address_onex = $data->address_one;
     	$telephonex  = $data->telephone;
     	$phone_onex = $data->phone_one;
     	$sms_mailx = $data->sms_mail;
     	$facebookx = $data->facebook;
		$twiterx = $data->twiter;
		$googlex = $data->google;
		$logox = $data->logo;
		$linkedinx = $data->linkedin;
		$instagramx = $data->instagram;
		$addressx = $data->address;
		$address_onex = $data->address_one;
		$logox = $data->logo;
     } ?>
    <!--footer-->

    <div class="footer mt-0">
		<div class="container">
			<div class="row py-1 py-md-2 px-lg-0">
				<div class="col-lg-4 footer-col1">
					<div class="row flex-column flex-md-row flex-lg-column">
						<div class="col-md col-lg-auto">
								<div class="footer-logo">
									<img src="<?php echo base_url().'assets/';?>images/footer-logo.png?v=<?php echo rand();?>" alt="" class="img-fluid">
								</div>
								<div class="mt-2 mt-lg-0"></div>
								<div class="footer-social d-none d-md-block d-lg-none">
									<?php if ($facebookx=="" and $facebookx==null) {?>
								<a href="javascript:void(0)" class="hovicon"><i class="icon-facebook-logo-circle"></i></a>
							<?php }else{?>
								<a target="_blank" href="<?php echo $facebookx;?>" class="hovicon"><i class="icon-facebook-logo-circle"></i></a>
							<?php } ?>

							<?php if ($twiterx=="" and $twiterx==null) {?>
								<a href="javascript:void(0)" class="hovicon"><i class="icon-twitter-logo-circle"></i></a>
							<?php }else{?>
								<a target="_blank" href="<?php echo $twiterx;?>" class="hovicon"><i class="icon-twitter-logo-circle"></i></a>
							<?php } ?>

							<?php if ($linkedinx=="" and $linkedinx==null) {?>
								<a href="javascript:void(0)" class="hovicon"><i class="icon-linkedin"></i></a>
							<?php }else{?>
								<a target="_blank" href="<?php echo $linkedinx; ?>" class="hovicon"><i class="icon-linkedin"></i></a>
							<?php } ?>

							<?php if ($instagramx=="" and $instagramx==null) {?>
								<a href="javascript:void(0)" class="hovicon"><i class="icon-instagram"></i></a>
							<?php }else{?>
								<a target="_blank" href="<?php echo $instagramx; ?>" class="hovicon"><i class="icon-instagram"></i></a>
							<?php } ?>
								</div>
						</div>
						<div class="col-md">
							<div class="footer-text mt-1 mt-lg-2">
								<p><?php echo $sms_mailx; ?></p>
								<small style="display: none; text-align: center; color: red;" id="error" role="alert">Ingrese un e-mail valido</small>
								<form action="" method="post" id="enviararchivos" class="footer-subscribe">
									<div class="input-group">
										<input name="email" id="email" type="text" class="form-control" placeholder="Ingrese su email *" />
										<button type="submit"> <span><i class="icon-black-envelope"></i></span></button>  
									</div>
								</form>	
							</div>
							<div class="footer-social d-md-none d-lg-block">
								<?php if ($facebookx=="" and $facebookx==null) {?>
								<a href="javascript:void(0)" class="hovicon"><i class="icon-facebook-logo-circle"></i></a>
							<?php }else{?>
								<a target="_blank" href="<?php echo $facebookx;?>" class="hovicon"><i class="icon-facebook-logo-circle"></i></a>
							<?php } ?>

							<?php if ($twiterx=="" and $twiterx==null) {?>
								<a href="javascript:void(0)" class="hovicon"><i class="icon-twitter-logo-circle"></i></a>
							<?php }else{?>
								<a target="_blank" href="<?php echo $twiterx;?>" class="hovicon"><i class="icon-twitter-logo-circle"></i></a>
							<?php } ?>

							<?php if ($linkedinx=="" and $linkedinx==null) {?>
								<a href="javascript:void(0)" class="hovicon"><i class="icon-linkedin"></i></a>
							<?php }else{?>
								<a target="_blank" href="<?php echo $linkedinx; ?>" class="hovicon"><i class="icon-linkedin"></i></a>
							<?php } ?>

							<?php if ($instagramx=="" and $instagramx==null) {?>
								<a href="javascript:void(0)" class="hovicon"><i class="icon-instagram"></i></a>
							<?php }else{?>
								<a target="_blank" href="<?php echo $instagramx; ?>" class="hovicon"><i class="icon-instagram"></i></a>
							<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<h3>Blog Posts</h3>
					<div class="h-decor"></div>
					<?php $query_blog= $this->db->query("SET lc_time_names = 'es_PE'");
						  $query_blog = $this->db->query("select *, DATE_FORMAT(created,'%d %M  %Y') AS mes from t_blog where estado=1 order by Id desc limit 3 ");foreach ($query_blog->result() as $blog) {?>
										<div class="footer-post d-flex">
						<div class="footer-post-photo"><img src="<?php echo base_url().'assets/'; ?>images/content/<?php echo $blog->img;?>?=<?php echo rand();?>" alt="" class="img-fluid"></div>
						<div class="footer-post-text">
							<!--<div class="footer-post-title"><a href="post.html"><?php echo $blog->title;?></a>&nbsp;<i class="icon-right-arrow"></i></div>-->
							<p><?php echo $blog->mes; ?></p>
						</div>
					</div>
					<?php } ?>

				</div>
				<div class="col-sm-6 col-lg-4">
					<h3>Contacto</h3>
					<div class="h-decor"></div>
					<ul class="icn-list">
						<li><i class="icon-placeholder2"></i><?php echo $address_onex;?>
							<br>
							<a target="_blank" href="https://goo.gl/maps/Qx3mJi6ihRd3CPDS8" class="btn btn-xs btn-gradient"><i class="icon-placeholder2"></i><span>Obtener indicaciones en el mapa</span><i class="icon-right-arrow"></i></a>-
						</li>
						<li><i class="icon-placeholder2"></i><?php echo $address_onex;?>
							<br>
							<a target="_blank" href="https://goo.gl/maps/Qx3mJi6ihRd3CPDS8" class="btn btn-xs btn-gradient"><i class="icon-placeholder2"></i><span>Obtener indicaciones en el mapa</span><i class="icon-right-arrow"></i></a>-
						</li>
						<li><i class="icon-smartphone"></i><b><span class="phone"><a href="tel:<?php echo $telephonex; ?>" class="phone"><span class="text-nowrap"><?php echo $telephonex; ?></span></a></span></b>
						</li>
						<li><i class="icon-smartphone"></i><b><span class="phone"><a href="tel:<?php echo $phone_onex;?>" class="phone"><span class="text-nowrap"><?php echo $phone_onex; ?></span></a></span></b>
						</li>
						<li><i class="icon-black-envelope"></i><a href="mailto:<?php echo $emailx; ?>"><?php echo $emailx; ?></a></li>
						<li><i class="icon-black-envelope"></i><a href="mailto:ventas.inn@innomedic.pe"><?php echo "ventas.inn@innomedic.pe" ?></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row text-center text-md-left">
					<div class="col-sm">Copyright &copy; <?php echo date('Y');?> <a href="javascript:void();"><?php echo $address_onex; ?></a><span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Total <span id="results"></span>&nbsp;Visitas</span>
						<a href="javascript:void(0)">Privacy Policy</a></div>
					<div class="col-sm-auto ml-auto"><span class="d-none d-sm-inline">Ponte en contacto&nbsp;&nbsp;&nbsp;</span><i class="icon-telephone"></i>&nbsp;&nbsp;<b><a href="tel:<?php echo $telephonex; ?>"><?php echo $telephonex; ?></a></b>&nbsp;&nbsp;&nbsp;<a class="font-weight-bold" target="_blank" href="https://www.facebook.com/escudero05">By design</a></div>
				</div>
			</div>
		</div>
	</div>
    <!--

	<div class="footer mt-0">
		<div class="container">
			<div class="row py-1 py-md-2 px-lg-0">
				<div class="row flex-column flex-md-row flex-lg-column">
					<div class="col-lg-4 footer-col1">
						<div class="row flex-column flex-md-row flex-lg-column">
							<div class="col-md col-lg-auto">
								<div class="footer-logo">
									<img src="<?php echo base_url().'assets/';?>images/footer-logo.png?v=<?php echo rand();?>" alt="" class="img-fluid">
								</div>
								<div class="mt-2 mt-lg-0"></div>
								<div class="footer-social d-none d-md-block d-lg-none">
									<a href="https://www.facebook.com/" target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
									<a href="https://www.twitter.com/" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
									<a href="https://plus.google.com/" target="blank" class="hovicon"><i class="icon-google-logo"></i></a>
									<a href="https://www.instagram.com/" target="blank" class="hovicon"><i class="icon-instagram"></i></a>
								</div>
							</div>
							<div class="col-md">
								<div class="footer-text mt-1 mt-lg-2">
									<p><?php echo $sms_mailx; ?></p>
									<small style="display: none; text-align: center; color: red;" id="error" role="alert">Ingrese un e-mail valido</small>
									<form action="" method="post" id="enviararchivos" class="footer-subscribe">
										<div class="input-group">
											<input name="email" id="email" type="text" class="form-control" placeholder="Ingrese su email *" />
											<button type="submit"> <span><i class="icon-black-envelope"></i></span></button>  
										</div>
									</form>

									
								</div>
								<div class="footer-social d-md-none d-lg-block">
									<?php if ($facebookx=="" or $facebookx==NULL) { ?>
										<a href="javascript:void(0)"  class="hovicon"><i class="icon-facebook-logo"></i></a>
									<?php }else{ ?>
										<a href="<?php echo $facebookx;?>" target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
									<?php } ?>
									<?php if ($twiterx =="" or $twiterx ==NULL) { ?>
										<a href="javascript:void(0)"  class="hovicon"><i class="icon-twitter-logo"></i></a>
									<?php }else{ ?>
										<a href="<?php echo $twiterx;?>" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
									<?php } ?>
									<?php if ($googlex =="" or $googlex==NULL) { ?>
										<a href="javascript:void(0)"  class="hovicon"><i class="icon-google-logo"></i></a>
									<?php }else{ ?>
										<a href="<?php echo $googlex;?>" target="blank" class="hovicon"><i class="icon-google-logo"></i></a>
									<?php } ?>
									<?php if ($instagramx =="" or $instagramx == NULL) { ?>
										<a href="javascript:void(0)"  class="hovicon"><i class="icon-instagram"></i></a>
									<?php }else{?>
										<a href="<?php echo $instagramx;?>" target="blank" class="hovicon"><i class="icon-instagram"></i></a>
									<?php } ?>
									
									
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-lg-4">
						<h3>Publicaciones de Blog</h3>
						<!--<div class="h-decor"></div>
						<?php $query_blog= $this->db->query("SET lc_time_names = 'es_PE'");
							  $query_blog = $this->db->query("select *, DATE_FORMAT(created,'%d %M  %Y') AS mes from t_blog order by Id desc limit 3");foreach ($query_blog->result() as $blog) {?>
											<div class="footer-post d-flex">
							<div class="footer-post-photo"><img src="<?php echo base_url().'assets/'; ?>images/content/<?php echo $blog->img;?>?=<?php echo rand();?>" alt="" class="img-fluid"></div>
							<div class="footer-post-text">
								<!--<div class="footer-post-title"><a href="post.html"><?php echo $blog->title;?></a>&nbsp;<i class="icon-right-arrow"></i></div>-
								<p><?php echo $blog->mes; ?></p>
							</div>
						</div>
						<?php } ?>-

					</div>
					<div class="col-sm-6 col-lg-4">
						<h3>Contacto</h3>
						<div class="h-decor"></div>
						<ul class="icn-list">
							<li><i class="icon-placeholder2"></i><?php echo $addressx; ?><br><?php echo $address_onex;?>
								<br>
								<a href="javascript:void(0)" class="btn btn-xs btn-gradient"><i class="icon-placeholder2"></i><span>Obtener indicaciones en el mapa</span><i class="icon-right-arrow"></i></a>-
							</li>
							<li><i class="icon-smartphone"></i><b><span class="phone"><span class="text-nowrap"><?php echo $telephonex; ?></span></span></b>
							</li>
							<li><i class="icon-telephone"></i><b><span class="phone"><span class="text-nowrap"><?php echo $phone_onex; ?></span></span></b>
							</li>
							<li><i class="icon-black-envelope"></i><a href="mailto:info@dentco.net"><?php echo $emailx; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row text-center text-md-left">
					<div class="col-sm">Copyright &copy; <?php echo date('Y');?> <a href="javascript:void();"><?php echo $address_onex; ?></a><span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Total <span id="results"></span>&nbsp;Visitas</span>
						<a href="javascript:void(0)">Privacy Policy</a></div>
					<div class="col-sm-auto ml-auto"><span class="d-none d-sm-inline">Ponte en contacto&nbsp;&nbsp;&nbsp;</span><i class="icon-telephone"></i>&nbsp;&nbsp;<b><?php echo $telephonex; ?></b>&nbsp;&nbsp;&nbsp;<a class="font-weight-bold" target="_blank" href="https://www.facebook.com/escudero05">By design</a></div>
				</div>
			</div>
		</div>
	</div>
-->


	<!--//footer-->
	<div class="backToTop js-backToTop">
		<i class="icon icon-up-arrow"></i>
	</div>
	<div class="modal modal-form modal-form-sm fade" id="modalQuestionForm">
		<div class="modal-dialog">
			<div class="modal-content">
				<button aria-label='Close' class='close' data-dismiss='modal'>
					<i class="icon-error"></i>
				</button>
				<div class="modal-body">
					<div class="modal-form">
						<h3>Ask a Question</h3>
						<form class="mt-15" id="questionForm" method="post" novalidate>
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
								<input type="text" name="name" class="form-control" autocomplete="off" placeholder="Your Name*" />
							</div>
							<div class="input-group">
								<span>
									<i class="icon-email2"></i>
								</span>
								<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Your Email*" />
							</div>
							<div class="input-group">
								<span>
									<i class="icon-smartphone"></i>
								</span>
								<input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Your Phone" />
							</div>
							<textarea name="message" class="form-control" placeholder="Your comment*"></textarea>
							<div class="text-right mt-2">
								<button type="submit" class="btn btn-sm btn-hover-fill">Ask Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--reserv->sicia-->
	<div class="modal modal-form fade grgergrvgveg" id="modalBookingForm" data-backdrop="static" data-keyboard="false" tabindex="-1" >
		<div class="modal-dialog border_style" >
			<div class="modal-content border_style">
				<button aria-label='Close' class='close' data-dismiss='modal'>
					<i class="icon-error"></i>
				</button>
				<div class="modal-body" >
					<div class="modal-form">
						<h1 class="theme-color" style="text-align: center;">Solicita una cotización</h1>
						<div class="text-center">
							<img src="<?php echo base_url().'assets/';?>images/<?php echo $logox;?>?v=<?php echo rand();?>" alt=""><br><br>
							<span></span>
						</div>
						<br>
						<form class="mt-15" id="bookingForm" method="post" novalidate>
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
	<style>
		.border_style{
			border-radius: 1.5em;
		}
	</style>



	<?php 
          // Pregunto si la variable counte existe
        if (!isset($_COOKIE['counte'])) 
        {
 
            // $dtz = new DateTimeZone("America/Lima"); //Your timezone
            // $currentv = new DateTime('NOW');
            // $currentv = $currentv->format('Y-m-d H:i:s'); // had to format this  
 
            $dtz = new DateTimeZone("America/Lima"); //Your timezone
            $currentv = new DateTime('NOW', $dtz);
            $currentv = $currentv->format("Y-m-d H:i:s");    

                          
            
            // Los campos a registrar
            $this->fecha = $currentv;
            $this->direccionip   = $_SERVER['REMOTE_ADDR']; // direccionip
            $this->direccionip4  = ip2long($_SERVER['REMOTE_ADDR']); // direccionip4
 
            $this->db->insert('t_visitas', $this);
 
        }
 
        setcookie('counte', 1, time()+3600);
 
        // Realizo una query a la la tabla visitas
        
     ?>
	<!--
	<div class="btn-whatsapp">
		<a target="_blank" href="https://wa.me/51946887798?text=Me%20gustaría%20recibir%20una%20cotización%20por%20favor">
		<a href="https://api.whatsapp.com/send?phone=51946887798" target="_blank">-
		<img src="<?php echo base_url().'assets/';?>color/btn_whatsapp.png?v=<?php echo rand();?>" alt="">
		</a>
	</div>-->


	<!--<h1>Prueba</h1>
	<div class="cargar_resultado"></div>--> 

	<!--aqui carga el chat de online-->
	<div id="WAButton"></div>

	<!--  Live Chat script -->
	<!--<script type="text/javascript">
	var _smartsupp = _smartsupp || {};
	_smartsupp.key = '8d67a92bb6cde8625d664ffb0c8c3921d00132a5';
	window.smartsupp||(function(d) {
	  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
	  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
	  c.type='text/javascript';c.charset='utf-8';c.async=true;
	  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
	})(document);
	</script>-->


	<!-- Vendors -->
<!-- Vendors -->
	<script src="<?php echo base_url().'assets/';?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/jquery-migrate/jquery-migrate-3.0.1.min.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/cookie/jquery.cookie.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/bootstrap-datetimepicker/moment.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/popper/popper.min.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/waypoints/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/waypoints/sticky.min.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/slick/slick.min.js?<?php echo rand();?>"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/scroll-with-ease/jquery.scroll-with-ease.min.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/countTo/jquery.countTo.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/form-validation/jquery.form.js"></script>
	<script src="<?php echo base_url().'assets/';?>vendor/form-validation/jquery.validate.min.js"></script>
	<!-- Custom Scripts -->
	<script src="<?php echo base_url().'assets/';?>js/app.js?v=<?php echo rand();?>"></script>
	<script src="<?php echo base_url().'assets/';?>js/app-shop.js"></script>
	<script src="<?php echo base_url().'assets/';?>form/forms.js?v=<?php echo rand();?>"></script>
	<script src="<?php echo base_url().'assets/';?>color/color.js?v=<?php echo rand();?>"></script>
	<script src="<?php echo base_url().'assets/';?>color/chat.js?v=<?php echo rand();?>"></script>
	<script src="<?php echo base_url().'assets/';?>color/loader.js?v=<?php echo rand();?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.4/dist/sweetalert2.all.min.js"></script>


	<!--Floating WhatsApp css-->
	<link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
<!--Floating WhatsApp javascript-->
	<script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>

	

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

	<script>
	    $('#email').on('keypress', function() {
	    var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
	    if(!re) {
	        $('#error').show();
	    } else {
	        $('#error').hide();
	    }
	})
	</script>
	<script>  
            //nuevo registro
        $(document).on('submit', '#enviararchivos', function(event){  
             event.preventDefault();  
             var email = $("#email").val();
           

             //validacion de nombre;

            if (email.length=="") {
                Swal.fire({
                  position: 'top-end',
                  type: 'error',
                  text: 'El campo link esta vacio',
                  showConfirmButton: false,
                  timer: 1500
                })
                return false;
            }else{

            }  

          $.ajax({  
               url:"<?php echo base_url().'Inicio/SendMail/';?>",  
               method:'POST',  
               data:new FormData(this),  
               contentType:false,  
               processData:false,  
               success:function(data)  
               {  
                var json =JSON.parse(data);
                  Swal.fire({
                    title: 'Muy Bien ◉‿◉',
                    text: ""+json.msg+"",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Gracias ◉‿◉!'
                  }).then((result) => {
                    if (result.value) {

                        $("#email").val("");
                    }
                  })
                 
                //$('#div_load').load(location.href+" #div_load>*","");
                
                 
               },statusCode:{
              400: function(xhr){

                var json = JSON.parse(xhr.responseText);
                if (json.alerta) {
                  Swal.fire({
                      title: 'Lo siento mucho (︶︿︶)',
                      text: ""+json.alerta+"",
                      type: 'warning',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'OK (⌣́_⌣̀)!'
                    }).then((result) => {
                      if (result.value) {
                        
                      }
                    })
                 /* $("#alert").html('<div class="alert alert-success text-center" id="alerta" role="alert">'+json.alerta+'</div>'); */
                }
                
              },401: function(xhr){
            var json = JSON.parse(xhr.responseText);
            if (json.error) {
                  Swal.fire({
                      title: 'Lo siento mucho (︶︿︶)',
                      text: ""+json.error+"",
                      type: 'warning',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes,(⌣́_⌣̀)!'
                    }).then((result) => {
                      if (result.value) {
                        
                      }
                    })
                
                }
        },
            error: function()
                                 {
                       Swal.fire({
                        title: 'Lo siento mucho (︶︿︶)',
                        text: "Algo paso con el sistema Vuelva a intentar una vez mas",
                        type: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ok!(︶︿︶)!'
                      }).then((result) => {
                        if (result.value) {
                         
                        }
                      })
                  }
              }
            

          });  
          
             

        });  
    </script>

    <script>
    function sendRequest(){
    
      $.ajax({
        url: "<?php echo base_url().'Servicios/cantidad_registro/'?>",
        method:"POST",
        contentType:false,
        processData:false,
        success:
          function(result){ 
    /* si es success mostramos resultados */
           $('#results').text(result);
        },
        complete: function() { 
    /* solo una vez que la petición se completa (success o no success) 
       pedimos una nueva petición en 3 segundos */
           setTimeout(function(){
             sendRequest();
           }, 3000);
          }
        });
      };

    /* primera petición que echa a andar la maquinaria */
    $(function() {
        sendRequest();
    });

</script>


    <!--cargar los valores con ajax-->

    <!--<script>
		 $.ajax({
		    url: "<?php echo base_url().'Inicio/cargar_clientes/';?>",
		    method:"POST",
		    contentType:false,
		    processData:false,
		    success:function(data){

		      	var resultado = JSON.parse(data);
				var contenido = '';

				$.each(resultado, function(index, value) {
				    contenido +=
				'<div class="special-carousel js-special-carousel row">'+
				    '<div class="col-2">'+
					    '<div class="special-card">'+
					       '<div class="special-card-photo">'+
					       		'<img src="<?php echo base_url().'assets/';?>images/content/'+value.img+'?v=<?php echo rand();?>" alt="">'+
					       '</div>'+
					       '<div class="special-card-caption text-left">'+
					       		'<div class="special-card-txt1">'+value.name+'</div>'+
					       		'<div class="special-card-txt2">'+value.subtitle+'</div>'+
					       		'<div class="special-card-txt3">'+value.description+'</div>'+
					       		'<div>'+
					       			'<a href="javascript:void(0);" class="btn"><i class="icon-right-arrow"></i><span>Mas Información</span><i class="icon-right-arrow"></i></a>'+

					       		'</div>'+
					       		
					       '</div>'+
					    '</div>'+ 
					'</div>'+

				'</div>';
				});

				$(".cargar_resultado").html(contenido);
		    }
		})
	</script>-->


	<!--View from about-->


</body>

</html>