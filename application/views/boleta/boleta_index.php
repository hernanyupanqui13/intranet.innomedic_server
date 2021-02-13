
<?php $datos_personales =$this->db->query("select *,DATE_FORMAT(fecha_ingreso,'%d-%m-%Y') as ff from ts_datos_personales where id_usuario='".$this->session->userdata("session_id")."'"); foreach ($datos_personales->result() as $xx) {
    $nombrescompletos =  $xx->apellido_paterno." ".$xx->apellido_materno." ".$xx->nombres;
    $tipocomprobante = $xx->tipo_documento;
    $nro_documento = $xx->nro_documento;
    $id_perfil_x = $xx->id_perfil;
    $puestox = $xx->puesto;
    $fecha_ingresox = $xx->ff;
} ?>



<div class=" col-md-12 col-lg-12">
    <div class="card">
        <div class="card-header badge-dark">
            <h4 class="m-b-0 text-white">Consulta de Boletas </h4>
        </div>
        <div class="card-body border border-info">
            <div class="card-header badge-info">
                <h4 class="m-b-0 text-white">Datos Personales </h4>
            </div>
            <br>
            <div class="row">                        
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label class="control-label"><b>Nombres y Apellidos:</b></label>
                        <br>
                        <?php echo $nombrescompletos; ?>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                    <label><b>Tipo de Documento:</b></label>
                        <br>
                        <?php foreach($tipo_documento as $x) {                             
                            if($tipocomprobante==$x->Id){
                                echo $x->nombre;
                            } else {
                                echo "";
                            }                                
                         } ?>                        
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b>Nro. de documento:</b></label>
                            <br>
                        <?php echo $nro_documento; ?>
                    </div>
                </div>                                                   
            </div>

            <div class="row">                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label"><b>Puesto de trabajo:</b></label>
                        <br>
                        <?php echo $puestox; ?>                                
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b>Fecha Ingreso:</b></label><br>
                        <?php echo $fecha_ingresox; ?>                                
                    </div>
                </div>                        
            </div>

            <div class="card-header badge-info">
                <h4 class="m-b-0 text-white">Filtro de Busqueda </h4>
            </div>

            <form class="form-horizontal p-t-20 " action="#" method="post" id="buscar_registro_por_orden_fecha" autocomplete="off">
                <div class="row">
                    <div class="col-md-12" style="display: none;">
                        <div class="form-group "> 
                            <div class="example">
                                <label for="exampleInputuname3" class="col-sm-2 control-label">Fecha </label>
                                <div class="input-daterange input-group" id="date-range">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="limpiar" class="form-control" name="desde" value="<?php echo $desdex; ?>"  placeholder="Desde - <?php echo date('Y-m-d');?>" />
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info b-0 text-white">Desde - Hasta</span>
                                    </div>
                                    <input type="text" id="limpiarx" class="form-control" name="hasta" value="<?php echo $hastax; ?>" placeholder="Hasta - <?php echo date('Y-m-d');?>"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-2 control-label">Año</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="far fa-caret-square-down"></i></span>
                                </div>
                                    <?php                                     
                                    if ($this->uri->segment(6,0)==1  ) {
                                        $activo ="selected";
                                    } else {
                                        $activo ="";
                                    }
                                    ?>
                                    
                                    <?php                                     
                                    if ($this->uri->segment(6,0)==2) {
                                        $activos ="selected";
                                    } else {
                                        $activos ="";
                                    }  
                                    ?>
                                    <select class="select2 form-control custom-select" id="mySelect2" name="ano" >
                                        <option value="">--Seleccione año--</option>
                                        <?php 
                                        $query = $this->db->query("select * from do_ano");
                                        foreach ($query->result() as $xx ) {?>
                                            <option value="<?php echo $xx->ano;?>"><?php echo $xx->ano;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-2 control-label">Tipo Boleta</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-caret-square-down"></i></span></div>
                                    <select class="select2 form-control custom-select" id="mySelect2" name="numboleta" >
                                        <option value="">--seleccione --</option>
                                        <?php $lista_boleta_x_tuipo = $this->db->query("select * from do_tipo_boleta"); foreach ($lista_boleta_x_tuipo->result() as $xx): ?>
                                        <?php if ($xx->Id == $this->uri->segment(7,0)) {
                                            $active = "selected";
                                        } else {
                                            $active = "";
                                        } ?>
                                        <option value="<?php echo $xx->Id; ?>" <?php echo $active; ?>><?php echo $xx->nombre; ?></option>
                                            
                                        <?php endforeach ?>
                                    </select>                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-2 control-label">Mes</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="far fa-caret-square-down"></i></span>
                                </div>

                                <select class="select2 form-control custom-select" id="mySelect2" name="mes" >
                                    <option value="">--Seleccione--</option>
                                    <?php    
                                        $Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

                                        for ($i=1; $i<=12; $i++) {?>
                                                <option value="<?php echo $Meses[($i)-1] ?>" ><?php echo $Meses[($i)-1] ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-2 control-label">Estado</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="far fa-caret-square-down"></i></span>
                                </div>
                                <?php 
                                // Para que se muestre el estado que se esta viendo despues de cargar la pagina
                                if ($this->uri->segment(6,0)==1  ) {
                                        $activo ="selected";
                                }else{
                                    $activo ="";
                                } ?>
                                <?php if ($this->uri->segment(6,0)==2) {
                                    $activos ="selected";
                                }else{
                                    $activos ="";
                                }  ?>
                                <select class="select2 form-control custom-select" id="mySelect2" name="estado" >
                                    <option value="">--Seleccione--</option>
                                    <option value="1" <?php echo $activo; ?>>Nuevo</option>
                                    <option value="2" <?php echo $activos; ?>>Visualizados</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row m-b-0">
                    <div class="offset-sm-12 col-sm-12 text-center">
                        <button type="submit" class="btn btn-success waves-effect waves-light btn-lg "><i class=" fas fa-search"></i> Buscar</button>
                        <a href="javascript:void(0)" id="limpiar_datos" class="btn btn-dark  btn-lg"><i class=" fas fa-undo"></i> Limpiar</a>
                    </div>
                </div>
            </form>
        </div>

        
        <div class="card-body ">
            <h4 class="card-title">Mostrar Registros</h4>
            <div class='col-md-12 text-right'>
                <h4><b id="total"></b > </h4>
                </div>
            <div class="m-b-20">
                <button type="button" class="btn btn-dark" data-page-size="10">10</button>
                <button type="button" class="btn btn-dark" data-page-size="20">20</button>
                <button type="button" class="btn btn-dark" data-page-size="30">30</button>
            </div>
            <div class="card-header badge-success id_ocultar" >
                <h4 class="m-b-0 text-white">Resultados de Busqueda </h4>

            </div>
            <div class="table-responsive">
                <table id="demo-foo-pagination" class="table table-bordered toggle-arrow-tiny " data-sorting="true" data-paging="true" data-paging-size="5"><!--full-color-table full-success-table hover-table-->
                    <thead class="badge-success">
                        <tr>
                            <th>#</th>
                            <th>Tipo Boleta</th>
                            <th data-toggle="true"> Periodo </th>
                            <th data-hide="phone"> Empresa </th>
                            <th>Estado</th>
                            <th data-hide="all"> Acción </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista_escudero_by_boleta as $xx) {?>

                        <tr>
                            <td>--></td>
                            <td><?php $tipo_boleta=  $this->db->query("select * from do_tipo_boleta"); 
                            foreach ($tipo_boleta->result() as $x) {
                                if ($xx->tipo_boleta == $x->Id) {
                                    echo $x->nombre;
                                }
                            }; ?></td>
                            <td><?php echo $xx->mes.' '.$xx->ano;  ?></td>
                            <td><?php echo $xx->empresa; ?></td>
                            <td><?php if ($xx->view==1) {?>
                                <span class="label label-table label-info">Nuevo <?php echo $xx->fecha_enviado; ?></span>
                            <?php } elseif($xx->view==2 && $xx->conforme == 0){?>
                                <span class="label label-table label-warning">Visto == <?php echo $xx->fecha_recibido; ?></span>
                            <?php } elseif($xx->view==2 && $xx->conforme == 1) {?>
                                <span class="label label-table label-success">Visto y Confirmado == <?php echo $xx->fecha_recibido; ?></span>
                            <?php } else {?>
                                <span class="label label-table label-success">Sin informacion</span>
                            <?php }?></td>
                            <td>
                            <?php $sub = substr($xx->archivo, -3);  //Aqui extraigo los ultimos 3 caracteres de la cadena
                            
                            
                            //Validacion de imgen en png o jpeg
                            if($sub == "jpg" || $sub == "png" || $sub == "jpge" || $sub == "gif" ) { 
                                
                                if($xx->archivo=="" || $xx->archivo==null){
                                    $the_archivo = '9923e9ae4bc8a9c8da3e32943118ed89.png';
                                } else {
                                    $the_archivo = $xx->archivo;
                                }                                
                                ?>
                                
                                <a class="data_xx_ btn btn-outline-secondary" id="<?php echo $xx->Id; ?>" href="javascript:void(0)" onclick="return mostrarmodal('<?=$the_archivo?>')" class="btn btn-outline-dark btn-md"><?php if ($xx->view==1) {?>
                                <i class=" fas fa-eye-slash fa-1x" ></i>
                            <?php 
                            
                            } else {?>
                                <i class="fas fa-eye fa-1x" ></i>
                            <?php 
                            } 
                            ?>
                            </a>
                            <?php } else {?>
                                <a class="data_xx_ btn btn-outline-secondary" id="<?php echo $xx->Id; ?>" target="_blank" href="<?php echo base_url().'upload/boletas/'?><?php if($xx->archivo=="" || $xx->archivo==null){
                                echo "9923e9ae4bc8a9c8da3e32943118ed89.png";
                            }else{
                                echo $xx->archivo;
                            } ?>"  class="btn btn-outline-dark btn-md"><?php if ($xx->view==1) {?>
                                <i class=" fas fa-eye-slash fa-1x" ></i>
                            <?php }else{?>
                                <i class="fas fa-eye fa-1x" ></i>
                            <?php } ?></a>
                            <?php } ?>
                            <a  href="<?php echo base_url().'upload/boletas/';?><?php if($xx->archivo=="" || $xx->archivo==null){
                                echo "9923e9ae4bc8a9c8da3e32943118ed89.png";
                            }else{
                                echo $xx->archivo;
                            } ?>" download class="data_xx_ btn btn-outline-danger btn-md" id="<?php echo $xx->Id; ?>"><i class="fas  fas fa-download fa-1x"></i></a>
                            &nbsp;&nbsp;
                            <!--aqui validamos para que no valide su conformidad- checked-->
                            <?php if ($xx->conforme==1) {
                                
                            }else{?>
                                <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-info ">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input " value="1" id="1" >
                                        <label id="<?php echo $xx->Id;?>" class="custom-control-label agregar_estado_conforme" for="checkbox0">Conforme</label>
                                    </div>
                                </label>
                                
                            </div>

                            <?php } ?>

                        </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <div class="col-md-12 text-center badge-dark p-2 border rounded-top">
                <span><span class="p-md-3">Leido &nbsp;</span><i class="fas fa-eye fa-2x" ></i> &nbsp;|&nbsp; </span>
                <span><span  class="p-md-3">No leido</span><i class=" fas fa-eye-slash fa-2x" ></i>  &nbsp;|&nbsp; </span>
                <span><span  class="p-md-3"> Descargar</span><i class=" fas  fas fa-download fa-2x" ></i></span>                
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('submit', '#buscar_registro_por_orden_fecha', function(event) {

            event.preventDefault();

            $.ajax({
                url: '<?php echo base_url().'Boleta/Boleta/buscar/';?>',
                type: 'POST',
                data: $("form").serialize()
            })
            .done(function(data) {            
                var json = JSON.parse(data);        
                window.location.replace(json.retorno);                                    
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");

            });
            
        }); 

        $("#limpiar_datos").click(function(event) {
            event.preventDefault();
            $('#buscar_registro_por_orden_fecha')[0].reset();
            $("#limpiar").val("");
            $("#limpiarx").val("");
            $('#mySelect2').val(null).trigger('change');
        });


        demo = $('#demo-foo-pagination tbody tr:not(.footable-filtered)').length
        if (demo=="" || demo ==null) {

        } else {
            setTimeout(function() {
            $("#total").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span>Luego de visualizar sus boletas marcar en el recuadro en señal de recepción y conformidad con las boletas enviadas.</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>`);
            }, 1000);
        }

        //AGREGAMOS LAS VALIDACIONES PARA LA CONFORMIDAD
        $(document).on('click', '.agregar_estado_conforme', function(event) {
            event.preventDefault();

            var user_id = $(this).attr("id"); 
            $.ajax({
                url: '<?php echo base_url().'Boleta/Boleta/actualizar_estadode_conformidad/';?>',
                type: 'POST',
                data: {user_id: user_id },
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        });
    });

    function mostrarmodal(e) {        
        Swal.fire({
            title: 'Mi Boleta',
            text: 'Consulta de boletas de pago.',
            imageUrl: '<?php echo base_url().'upload/boletas/';?>'+e,
            imageWidth: 500,
            imageHeight: 300,
            imageAlt: 'Boleta',
        })
    }
</script>

<!-- Innomedic Zendesk Widget script -->
<!--<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=82749fb2-dc7d-4202-9b16-67546e8d59dd"> </script>-->
<div class="chat_rrhh">
    <a href="<?=base_url();?>/chat/chat" class="chat_rrhh_a">
        <span>Chat RRHH</span>
        <i class="fa fa-comment-dots"></i>    
    </a>
</div>

                            

<style type="text/css">
    .chat_rrhh {
        background-color: #1e76bd;
        position: fixed;
        bottom: 5px;
        right: 30px;
        border-radius: 50px;
        width:130px;
        color:white;
        text-align:center;
        padding: 10px;

    }

    .chat_rrhh_a {
        text-align: center;
        color: white;
    }

    .chat_rrhh_a:hover {
        color: white;
    }

    .redes-flotantes {
        position: fixed;
        right: 8px;
        top: 75%;
        z-index: 20;
    }
    .redes-flotantes img {
        float: right; clear: right;
            margin: 5px;
        -moz-transform: scale(.8) ;
        -webkit-transform: scale(.8) ;
        -o-transform: scale(.8) ;
        -ms-transform: scale(.8) ;
        transform: scale(.8) ;
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    .redes-flotantes img:hover {
        -moz-transform: scale(1.1) rotate(6deg);
        -webkit-transform: scale(1.1) rotate(6deg);
        -o-transform: scale(1.1) rotate(6deg);
        -ms-transform: scale(1.1) rotate(6deg);
        transform: scale(1.1) rotate(6deg);
    }
    .v {
        margin-top: 33px;
        margin-right: -10px;
        width: 210px;"
    }
    @media screen and (max-width: 600px) {
        .v{
            margin-top: 17px;
            margin-right: -35px;
            width: 30%;
        }
    }


</style>