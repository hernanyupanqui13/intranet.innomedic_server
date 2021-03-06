<?php
    foreach ($dato as $x)
    {
        $razon_social   =   $x->usuario;
        $dni            =   $x->dni;
        $ruc            =   $x->ruc;
        $telefono       =   $x->telefono;
        $numboleta      =   $x->numcomprobante;
        $tipocomprobante=   $x->tipocomprobante;
        $direccion      =   $x->direccion;
        $tipo           =   $x->tipopago;
        $tipoventa      =   $x->tipoventa;
        $estado         =   $x->estado;
    }
?>

<style>
    /*
    option:nth-child(1), option:nth-child(4) {
        font-weight:bold;
    }
    */
    .negrita{
        font-weight:bold;
        color:#c11717;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card card-body">
            
            <div class="row">
             
             <div class='col-md-12'>
                 <a class="btn btn-danger waves-effect waves-light" href="javascript: window.history.go(-1)">
                     <i class="fa fa-reply m-r-5"></i><span> Regresar </span>
                 </a>
                 
                 <?php if($estado==2){?>
                 
                     <a href="javascript:void(0)" Id="<?php echo $x->url_view; ?>" class="btn-outline-success btn btn_imprimir_data"><i class="fa fa-print m-r-10"></i> Imprimir </a>
                         
                     
                 <?php }?>
             </div>
             
             <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
              
                <div class="col-md-2">
                   <div class="form-group">
                       <label class="control-label"><b>Numero de comprobante:</b></label>
                       <br>
                       <?php echo $x->seriecomprobante." ".correlativo($numboleta);?>
                   </div>
                </div>


               
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b>Cliente:</b></label>
                           <br>
                            <?php foreach($listacombo1 as $x){ ?>
                                   <?php
                                       if($razon_social==$x->Id){
                                           echo $x->nombres.' '. $x->apellido_paterno .' '.$x->apellido_materno;
                                       }else{
                                           echo "";
                                       }
                                   ?>
                            <?php } ?>
                    </div>
                </div>
                
                   <div class="col-md-2">
                       <div class="form-group">
                           <label class="control-label"><b>D.N.I: </b></label>
                           <br>
                           <?php echo $dni;?>
                       </div>
                   </div>
             
               
               <div class="col-md-2">
                    <div class="form-group">
                           <label class="control-label"><b>Telefono:</b></label>
                           <br>
                           <?php echo $telefono;?>
                       </div>
                </div>
           
            </div>
            
        </div>
    </div>
</div>

<!--- lista de productos --->

 <div class="row">
           <?php 
            if($estado==2){
                $classs='col-md-12';
            }else{
                if($tipo<=3){
                    $classs='col-md-12';
                }else{
                    $classs='col-md-10';
                }
            }
            ?>
           
            <div class="<?php echo $classs;?>">
                <div class="card card-body">
                      
                      <div class="row">
                          
                            
                      </div>
                      
                       <form action="<?php echo base_url().'Inventario/Pedidos/calcular/';?>" onsubmit="return validar(1);" method="post" autocomplete="off" id="formulario" name="formulario">
                        <input type="hidden" value="<?php echo $this->uri->segment(4,0);?>" name="pagina">
                        <input type="hidden" name="pagomixto" id="pagomixto">
                        <input type="hidden" name='boton' id='boton'>
                        
                        <?php
                            if($estado<2){  ?> 


                                <div class="row">
                                    <div class="col-md-2">
                               <div class="form-group">
                                   <label class="control-label"><b>Codigo de barra</b></label>
                                   <input type="text" name="inserta" id="inserta" class="form-control" placeholder="0" value="" onkeypress="vistaprevia(event)" autofocus autocomplete="off">  
                                        <!--- onchange="sumar(this.value);"  --->
                                        <input id="vuelto" name="vuelto" type="hidden" onkeyup='cambiosimbolo();'>
                               </div>
                           </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                   <label><b>Producto:</b></label>
                                    <select class="form-control select2" name="producto" id="producto" style="width: 100%;">
                                        <option>Seleccionar</option>
                                        <?php foreach($producto as $x){ ?>
                                            <?php
                                                if($x->stock==0){
                                                    $act01="disabled";
                                                    $text="PRODUCTO AGOTADO";
                                                    $negrita="negrita";
                                                }else{
                                                    $act01="";
                                                    $text="";
                                                    $negrita="";
                                                }
                                            ?>                                        
                                            <option value="<?php echo $x->Id;?>" <?php echo $act01;?> class="<?php echo $negrita;?>"><?php echo $x->nombre." (".$x->description.") ".$text;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12" >
                                
                                  <div class="form-group">
                                    <label  for="">Seleccione UNI/CAJA/CANTIDADES</label>
                                  <select name="unidad" id="unidad" class="form-control select2 btn btn-rounded"  style="width: 100%; height: 50px;">
                                  <option value="">--Seleccione-- </option>
                                    <?php $lista_unidad_medida = $this->db->query("select * from ts_unidad");
                                     foreach ($lista_unidad_medida->result() as $xx) {?>
                                                <option value="<?php echo $xx->Id;?>"><?php echo $xx->nombre?></option>
                                              <?php } ?>
                                              
                                            </select>
                                            
                                          </div>
                              
                              </div>
                            <div class="col-md-2">
                                   <div class="form-group m-4">
                                
                                    <form>
                                        <button class="btn btn-info waves-effect waves-light" onclick="return listaproducto()">
                                            <span> Agregar Producto </span>
                                        </button>
                                    </form>
                                    </div>
                                    
                            </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-danger waves-effect waves-light" type="submit">
                        <i class="fa fa-spin fa-refresh m-r-5"></i><span> Calcular </span>

                        </button>&nbsp;
                        <?php
                            if($this->uri->segment(5,0)=="" || $this->uri->segment(5)=="1" ){
                                $desb="disabled";
                            }else{
                                $desb="";
                            }
                                /* href="<?php echo base_url().'venta/finalizar/'.$this->uri->segment(3,0);?>" */
                                
                        ?>
                        <a onclick="return validar(2);" class="btn btn-success waves-effect waves-light <?php echo  $desb;?>" > Finalizar venta</a>
                      
                        <?php
                            }
                        ?>
                                </div>
                        
                       
                          
                        
                                          
                        <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" ><b>CANTIDAD</b></th>
                                        <th class="text-center"><b>DESCRIPCION</b></th>
                                        <th>UNIDAD MEDIDA</th>
                                        <th class="text-center"><b>STOCK MAXIMO</b></th>
                                        <th class="text-right"><b>OPCIONES</b></th>
                                    </tr>
                                </thead> 
                                <tbody>
                                   <?php 
                                    $importe_total = 0;
                                    foreach($listaprevia as $x_p){ ?>
                                       <tr>
                                        <td><input type='hidden' name='id[]' value="<?php echo $x_p->producto;?>">
                                        
                                        <?php
                                            if($estado<2){    
                                        ?>
                                                                                
                                        <?php 
                                        if($x_p->stock<$x_p->cantidad){    
                                        ?>
                                            <div class="form-group row has-danger">
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-danger requerido" id="inputHorizontalDnger" name='cantidad[]' placeholder="" value='<?php echo $x_p->cantidad;?>' >
                                                </div>
                                            </div>
                                        <?php }else{ ?>
                                            <input value='<?php echo $x_p->cantidad;?>' name='cantidad[]' class='form-control requerido' >
                                        <?php } ?>
                                        
                                        <?php }else{?>
                                        <?php echo $x_p->cantidad;?>
                                        <?php }?>
                                        </td>
                                        <td class="text-center">
                                        <?php 
                                        $queryx = $this->db->query("select * from ta_productos where Id='".$x_p->producto."'");
                                        foreach ($queryx->result() as $xx)
                                        {
                                            echo $xx->nombre." (".$xx->description.")";
                                        }
                                        ?>
                                        </td>
                                         <td><?php $query = $this->db->query("select * from ts_unidad");
                                            foreach ($query->result() as $x) {
                                              if ($x->Id == $x_p->unidad) {
                                                echo $x->nombre;
                                              }
                                            }
                                            ?></td>
                                        <td>
                                          <?php $queryx = $this->db->query("select * from ta_almacen where producto='".$x_p->producto."'");
                                        foreach ($queryx->result() as $xx)
                                        {
                                            echo $xx->total;
                                        }
                                         ?>
                                        </td>
                                   
                                       
                                        <td>    
                                           <?php 
                                            if($estado<2){
                                            ?>
                                            <a class='btn btn-danger waves-effect  ' data-toggle='tooltip' data-original-title='Eliminar' href='<?php echo base_url().'Inventario/Pedidos/eliminar_temporal/'.$this->uri->segment(4,0)."/".$x_p->producto;?>'><i class='fas fa-times-circle'></i>
                                            </a> 
                                            <?php } ?>
                                        </td>
                                    </tr>
                                   <?php 
                                        $importe_total +=$x_p->importe;                             
                                    } 
                                    ?>
                                   
                                </tbody>
                            </table>
                    
                        </div>
                        </form>

                </div>
            </div>
            
           
</div>           

<script>
// vuelto en tiempo real
window.onload = function() { 
    $('#vuelto_previo').val("0.00");
}

window.setInterval(function() {
    $("#pagomixto").val(document.getElementById("monto").value);
},1000);
    
function sumar(valor,e) {
    var totalx = 0;
    var totalx2 = 0;
    var totalx3 = 0;
    totalx = (parseFloat(valor)-parseFloat(e)).toFixed(2);
    if(valor==''){
       totalx = 0;
    }
    $('#vuelto_previo').val(Math.abs(totalx).toFixed(2));
}     
    
// Buscamos si un input esta vacio o tiene 0 y que obligatoriamente te pida un numero mayor
function validar(e){
    var error = 0;
	$('.requerido').each(function(i, elem){
		if($(elem).val() == '' || $(elem).val() == 0){
			$(elem).css({'border':'1px solid red'});
			error++;
        }else{
            $(elem).css({'border':'1px solid green'});
        }
    });
	if(error > 0){
		event.preventDefault();
		Swal.fire("Error!", "Ingresar datos en los campos vacios...", "error", {
		    button: "ok",
		});
        return false;
    }
    
    $('#boton').val(e);
    
    if(e==2){
        document.formulario.action = '<?php echo base_url().'Inventario/Pedidos/finalizar/'.$this->uri->segment(4,0);?>/'+document.getElementById("pagomixto").value;
    }
    document.formulario.submit();
}
    
<?php
    if($this->uri->segment(5,0)==1){
?>
    window.onload = function() { 
        Swal.fire("Error verificar almacen!", "La cantidad de un producto supera el stock.", "error", {
            button: "ok",
        });
    }
<?php
    }
?>
    
/* Codigo de barra */
function vistaprevia(e) {
    if (e.keyCode === 13 && !e.shiftKey) {

        $('#vuelto').val(document.getElementById("inserta").value);
        
        // transforma un codigo de barra ejemplo: 03'123 por 03-123 (reemplaza la comilla simple por guion)
        var str = document.getElementById("vuelto").value;
        var res = str.replace("'", "-");
        // transforma un codigo de barra ejemplo: 03'123 por 03-123 (reemplaza la comilla simple por guion)
        
        $.ajax({                        
        type: "POST",                 
        url: "<?php echo base_url()."Inventario/Pedidos/temporalvistaprevia/";?>",                    
        data: {codigo:res,registro:<?php echo $this->uri->segment(3,0)?>},
        dataType:"JSON",
        success: function(data)            
            {
                if(data.mensaje==1){
                   swal("Error!", "Producto Agotado | Verificar en almacen", "error", {
                       button: "ok",
                   });
                }else{
                    $("#table").append("<tr><td><input type='hidden' name='id[]' value='"+data.codigo+"'><input value='' name='cantidad[]' placeholder='0' class='form-control requerido' ></td><td>"+data.producto+"</td><td class='text-right'><input type='text' class='form-control form-control-danger requerido' id='inputHorizontalDnger' name='venta[]' placeholder='' value='"+data.precioventa+"' ></td><td class='text-right'>"+data.importe+"</td><td><a class='btn btn-danger waves-effect waves-light' data-toggle='tooltip' data-original-title='Eliminar' href='<?php echo base_url().'venta/eliminar_temporal/'.$this->uri->segment(3,0)."/";?>"+data.codigo+"'><i class='fa fa-close m-r-5'></i><span> Eliminar </span></a></td></tr>");
                }
                
           return false;
            }
        });

        $('#inserta').val("");
    } 
}
               
/* combobox de producto */
function listaproducto(){
    var producto = document.getElementById("producto").value;


    if(producto=='Seleccionar'){
         Swal.fire("Error!", "Selecciona un producto", "error", {
             icon: "ok!",
         });
        return false;
    };

    unidad = $("#unidad").val();
    unidadx = $('select[name="unidad"] option:selected').text();

      if (unidad=="" || unidad==0) {
    Swal.fire(
      'Unidad Medida',
      'Debes seleccionar la unidad Medida',
      'info'
      )
      return false;
    }

    $.ajax({                        
        type: "POST",                 
        url: "<?php echo base_url()."Inventario/Pedidos/listadatos";?>",                    
        data: {productox:producto,registro:<?php echo $this->uri->segment(4,0)?>,unidad:unidad}, /*id:1,id:2*/
        dataType:"JSON",
        success: function(data)            
       {
           $("#table").append(`<tr>
              <td><input type='hidden' name='id[]' value='`+data.codigo+`'>
              <input value='' name='cantidad[]' placeholder='0' class='form-control requerido' ></td>
              <td class='text-center'>`+data.producto+`</td>
              <td><input type="hidden" name="nombre[]" value="`+unidad+`" />`+unidadx+`</td>
              <td><input type="hidden" name="stock[]" value="`+data.stock+`" /><p>`+data.stock+`</p></td>
              <td><a class='btn btn-danger waves-effect waves-light'  href='<?php echo base_url().'Inventario/Pedidos/eliminar_temporal/'.$this->uri->segment(4,0)."/";?>`+data.codigo+`'><i class='fas fa-times-circle'></i></a>
              </td>
            </tr>`);
           return false;
       }
     });
    return false;
    //<?php echo base_url().'venta/eliminar_temporal/'.$this->uri->segment(3,0)."/";?>`+producto+`
}


</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


                <script>$(document).on("click",".btn_imprimir_data",function(){

        valor_id =  $(this).attr("Id"); 
        window.open("<?php echo base_url().'Inventario/Pedidos/comprobantefactura/'?>"+valor_id,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=900,height=750');

    });</script>
