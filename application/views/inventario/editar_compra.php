<?php
    foreach ($dato as $x)
    {
        $razon_social   =   $x->proveedor;
        $ruc            =   $x->ruc;
        $telefono       =   $x->telefono;
        $serie          =   $x->seriecomprobante;
        $numboleta      =   $x->numcomprobante;
        $tipocomprobante=   $x->tipocomprobante;
        $direccion      =   $x->direccion;
        $tipo           =   $x->moneda;
        $txt_cambio     =   $x->cambio;
        $estado         =   $x->estado;
        $igv            =   $x->igv;
    }
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
             
             <a class="btn btn-danger waves-effect waves-light" href="<?php echo base_url().'Inventario/Compras/';?>">
                 <i class="fa fa-reply m-r-5"></i><span> Regresar </span>
             </a>
             
             <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
              
                <div class="col-md-2">
                   <div class="form-group">
                       <label class="control-label"><b>Numero de comprobante:</b></label>
                       <br>
                       <?php echo $serie;?> - <?php echo correlativo($numboleta);?>
                   </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                    <label><b>Tipo de Comprobante:</b></label>
                        <br>
                        
                         <?php foreach($listacomprobante as $x){ ?>
                                   <?php
                                       if($tipocomprobante==$x->Id){
                                           echo $x->tipocomprobante;
                                       }else{
                                           echo "";
                                       }
                                   ?>
                            <?php } ?>
                    </div>
                </div>
               
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b>Proveedor:</b></label>
                           <br>
                            <?php foreach($listacombo1 as $x){ ?>
                                   <?php
                                       if($razon_social==$x->Id){
                                           echo $x->nombre;
                                       }else{
                                           echo "";
                                       }
    
                                        $id_ruc = $x->Id;
                                   ?>
                            <?php } ?>
                    </div>
                </div>
                
                <div class="col-md-2">
                   <div class="form-group">
                       <label class="control-label"><b>R.U.C. / DNI:</b></label>
                       <br>
                       <?php 
                        $queryruc = $this->db->query("select * from ta_proveedores where id='".$razon_social."'");
                        foreach ($queryruc->result() as $xruc)
                        {
                            echo $xruc->ruc;
                        }
                       ?>
                   </div>
               </div>
               
               <div class="col-md-2">
                    <div class="form-group">
                           <label class="control-label"><b>Telefono:</b></label>
                           <br>
                           <?php echo $telefono;?>
                       </div>
                </div>
                
                <div class="col-md-4">
                   <div class="form-group">
                       <label class="control-label"><b>Direccion:</b></label>
                       <br>
                       <?php echo $direccion;?>
                   </div>
               </div>
               
                <div class="col-md-3">
                        <div class="form-group">
                            <label><b>Tipo de moneda:</b></label>
                            <br>
                            <?php foreach($listamoneda as $x){ ?>
                               <?php
                                   if($tipo==$x->Id){
                                       echo $x->tipo;
                                   }else{
                                       echo "";
                                   }
                               ?>
                            <?php } ?>
                        </div>
                </div>
                <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label"><b>Tipo de Cambio:</b></label>
                            <br>
                            <?php echo $txt_cambio;?>
                        </div>
                </div>
           
            </div>
           
            
        </div>
        </div>
        
    </div>
</div>

<!--- lista de productos --->

 <div class="row">
            <div class="col-md-12">
                <div class="card">
                      <div class="card-body">
                        <div class="row">
                    
                           <?php
                                if($estado<2){
                            ?>
                            
                           <div class="col-md-2 ">
                               <div class="form-group">
                                   <label class="control-label"><b>Codigo de barra</b></label>
                                   <input type="text" name="inserta" id="inserta" class="form-control" placeholder="0" value="" onkeypress="vistaprevia(event)" autofocus autocomplete="off">  
                                        <!--- onchange="sumar(this.value);"  --->
                                        <input id="vuelto" name="vuelto" type="hidden" onkeyup='cambiosimbolo();'>
                               </div>
                           </div>

                            <div class="col-md-7">
                                <div class="form-group">
                                   <label><b>Producto:</b></label>
                                    <select class="form-control select2" name="producto" id="producto" style="width:100%">
                                        <option>Seleccionar</option>
                                        <?php foreach($producto as $x){ ?>
                                            <option value="<?php echo $x->Id;?>"><?php echo $x->nombre." (".$x->description.")";?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                               <div class="form-group">
                               <br>
                            
                                <!--<button class="btn btn-info waves-effect waves-light" onclick="listaproducto()">
                                    <span> Agregar Producto </span>
                                </button>-->
                                 <button class="btn btn-info waves-effect waves-light" id="registrar_por_id">
                                     Agregar Producto 
                                </button>

                                
                               
                                </div>
                                    
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                            <?php } ?>
                            
                      </div>
                      
                       <form action="<?php echo base_url().'Inventario/Compras/calcular/';?>" onsubmit="return validar(1);" method="post" autocomplete="off" id="formulario" name="formulario">
                        <input type="hidden" value="<?php echo $this->uri->segment(4,0);?>" name="pagina">
                        <input type="hidden" name='boton' id='boton'>
                                   
                         <div class="row">
                           <div class='col-md-5'>
                             <?php
                                if($estado<2){  ?>


                                <button class="btn btn-danger waves-effect waves-light" type="submit"  data-toggle="tooltip" data-original-title="Calcular la cantidad y el precio">
                                <i class="fa fa-spin fa-refresh m-r-5"></i><span> Calcular </span>
                                </button>

                                <?php
                                    if($estado==0){
                                        $desb="disabled";
                                    }else{
                                        $desb="";
                                    }

                                ?>
                                <a href="javascript:void(0)" onclick="return validar(2)" class="btn btn-success waves-effect waves-light <?php echo $desb;?>"> Finalizar compra</a>



                                <?php }  ?>
                            </div>
                             <?php
                                 if($igv==1){
                                       $c01   =   "checked";
                                       $c02   =   "";
                                       $text_igv  ="Incluye IGV";
                                   }else{
                                       $c01   =   "";
                                       $c02   =   "checked";
                                       $text_igv  ="No Incluye IGV";
                                   }
                                 if($estado<2){
                               ?>

                            <div class="col-md-1">

                                <div class="radio radio-success">
                                    <input type="radio" name="radio" id="radio3" value="1" onclick="return incluyeigv(this.value);" <?php echo $c01;?>>
                                    <label for="radio3">  Incluye IGV </label>
                                </div>
                                
                            </div>
                            <div class="col-md-2">
                               <div class="radio radio-danger">
                                        <input type="radio" name="radio" id="radio4" value="0" onclick="return incluyeigv(this.value);" <?php echo $c02;?>>
                                        <label for="radio4"> No Incluye IGV </label>
                                    </div>
                            </div>
                         </div>
                         
                        
                            
                         <?php }else{ ?>
                                <div class='col-md-2'>
                                    <?php echo $text_igv;?>
                                </div>
 
                        <?php }?>
                                          
                      <hr>
                        <div class="table-responsive">
                            <table id="show_date" class="table table-bordered table-striped table-hover aplica_data" cellspacing="0" width="100%"  >
                                <thead>
                                    <tr>
                                        <th class="text-center" >CANTIDAD</th>
                                        <th class="text-center">DESCRIPCION</th>
                                        
                                        <?php
                                            if($tipo==1){
                                        ?>
                                        <th class="text-center" >PRECIO UNI. (Dolares)</th>
                                        <th class="text-center">IMPORTE (Dolares)</th>
                                        <th class="text-center" >PRECIO UNI. (Soles)</th>
                                        <th class="text-center" >IMPORTE (Soles)</th>
                                        <?php }else{ ?>
                                        <th class="text-center" >PRECIO UNI. (Soles)</th>
                                        <th class="text-center" >IMPORTE (Soles)</th>
                                        <?php }?>
                                        
                                        <th class="text-center" >OPCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                    $subtotal=0;
                                    foreach($listaprevia as $x_p){ ?>
                                       <tr>
                                        <td><input type='hidden' name='id[]' value="<?php echo $x_p->producto;?>">
                                        
                                        <?php
                                            if($estado<2){
                                        ?>
                                        <input value='<?php echo $x_p->cantidad;?>' name='cantidad[]' class='form-control requerido'>
                                        <?php }else{?>
                                        <?php echo $x_p->cantidad;?>
                                        <?php }?>
                                        
                                        </td>
                                        <td>
                                        <?php 
                                        $queryx = $this->db->query("select * from ta_productos where Id='".$x_p->producto."'");
                                        foreach ($queryx->result() as $xx)
                                        {
                                            echo $xx->nombre." (".$xx->description.")";
                                        }
                                        ?>
                                        </td>
                                        
                                        <?php
                                            if($tipo==1){
                                        ?>
                                        <td class="text-right">
                                            <?php if($estado<2){ ?>
                                                <input type="text" name="venta[]" value="<?php echo $x_p->precio;?>" class="form-control requerido" >
                                            <?php }else{ ?>
                                                <?php echo $x_p->precio;?>
                                            <?php }?>
                                        </td>
                                        <td class="text-right"><?php echo $x_p->importe;?></td>
                                        
                                        <td class="text-right"><?php echo $x_p->precio_soles;?></td>
                                        <td class="text-right"><?php echo $x_p->importe_soles;?></td>
                                        
                                        <?php
                                            }else{
                                        ?>
                                        
                                        <td class="text-right">
                                            <?php if($estado<2){ ?>
                                                <input type="text" name="venta[]" value="<?php echo $x_p->precio_soles;?>" class="form-control requerido" >
                                            <?php }else{ ?>
                                                <?php echo $x_p->precio_soles;?>
                                            <?php }?>                                        
                                        </td>
                                        <td class="text-right"><?php echo $x_p->importe_soles;?></td>
                                        
                                        <?php } ?>
                                        
                                        <td class="text-right" width='105px'>    
                                           <?php 
                                            if($estado<2){
                                            ?>
                                            <a class='btn btn-danger waves-effect waves-light' data-toggle='tooltip' data-original-title='Eliminar' href='<?php echo base_url().'Inventario/Compras/eliminar_temporal/'.$this->uri->segment(4,0)."/".$x_p->producto;?>'><i class='fas fa-times-circle'></i>
                                            </a> 
                                            
                                            <?php } ?>
                                        </td>
                                    </tr>
                                   <?php 
                                        $subtotal+= $x_p->importe_soles;
                                    } 
                                    
                                    if($igv==1){
                                        $a1=$subtotal-(($subtotal/1.18)*0.18);
                                        $a2=($subtotal/1.18)*0.18;
                                        $a3=$subtotal;
                                    }else{
                                        $a1=$subtotal;
                                        $a2=($subtotal*0.18);
                                        $a3=($subtotal*0.18)+$subtotal;
                                    }
                                    ?>
                                </tbody>
                            </table>


                            
                            <div class="row">
                              <div class='col-md-9'>
                                
                            </div>
                            <div class="col md-3">
                               <div class="table-responsive">
                                      <table class="table table-bordered">
                                          <tbody>
                                              <tr>
                                                  <td class="text-right" width='105px'><b>Sub-Total</b></td>
                                                  <td class="text-right"><?php echo moneda($a1);?></td>
                                                  <td width='105px'></td>
                                              </tr>
                                              <tr>
                                                  <td class="text-right"><b>I.G.V:</b></td>
                                                  <td class="text-right"><?php echo number_format($a2,2);?></td>
                                                  <td width='105px'></td>
                                              </tr>
                                              <tr>
                                                  <td class="text-right"><b>Total:</b></td>
                                                  <td class="text-right"><?php echo moneda($a3);?></td>
                                                  <td width='105px'></td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                            </div>
                            </div>
                            
                            </div>
                            
                        </div>
                        </form>
                      </div>
                      

                </div>
            </div>
       </div>   
       <script>
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
    document.formulario.submit();
}
       </script>
       <script>
  
function incluyeigv(e){
    Swal.fire("Cambio realizado", "Para ver cambios, Presiona CALCULAR", "success", {
        button: "ok",
    });
    
    $.ajax({
        type: "POST",                 
        url: "<?php echo base_url()."Inventario/Compras/igv";?>",                    
        data: {id:e,pagina:<?php echo $this->uri->segment(4,0)?>},
        dataType:"JSON",
        success: function(data)            
            {
                
            }
        });
}
</script>

<script>


    
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
        url: "<?php echo base_url()."Inventario/Compras/temporalvistaprevia";?>",                    
        data: {codigo:res,registro:<?php echo $this->uri->segment(4,0)?>},
        dataType:"JSON",
        success: function(data)            
            {
                
                <?php
                if($tipo==1){
                ?>
                /* dolares */
                $("#table").append("<tr><td><input type='hidden' name='id[]' value='"+data.codigo+"'><input value='' name='cantidad[]' placeholder='0' class='form-control requerido' ></td><td>"+data.producto+"</td><td class='text-right'><input type='text' value='' placeholder='0' name='venta[]' class='form-control requerido' ></td><td class='text-right'>"+data.importe+"</td><td class='text-right'>0</td><td class='text-right'>0</td><td><a class='btn btn-danger waves-effect waves-light' data-toggle='tooltip' data-original-title='Eliminar' href='<?php echo base_url().'Inventario/Compras/eliminar_temporal/'.$this->uri->segment(4,0)."/";?>"+data.codigo+"'><i class='fas fa-times-circle'></i></a></td></tr>");
                <?php }else { ?>
                
                /* soles */    
                $("#table").append("<tr><td><input type='hidden' name='id[]' value='"+data.codigo+"'><input value='' name='cantidad[]' placeholder='0' class='form-control requerido' ></td><td>"+data.producto+"</td><td class='text-right'><input type='text' value='' placeholder='0' name='venta[]' class='form-control requerido' onkeypress="numero_(event)"></td><td class='text-right'>"+data.importe+"</td><td><a class='btn btn-danger waves-effect waves-light' data-toggle='tooltip' data-original-title='Eliminar' href='<?php echo base_url().'Inventario/Compras/eliminar_temporal/'.$this->uri->segment(4,0)."/";?>"+data.codigo+"'><i class='fas fa-times-circle'></i></a></td></tr>");
                <?php } ?>
                
           return false;
            }
        });

        $('#inserta').val("");
    } 
}
               
/* combobox de producto */



/*
function listaproducto(){
    var producto = document.getElementById("producto").value;

    if(producto=='Seleccionar'){
         swal("Error!", "Selecciona un producto", "error", {
             button: "ok!",
         });
        return false;
    };
    $.ajax({                        
        type: "POST",                 
        url: "<?php echo base_url()."Inventario/Compras/listadatos";?>",                    
        data: {productox:producto,registro:<?php echo $this->uri->segment(4,0)?>}, /*id:1,id:2
        dataType:"JSON",
        success: function(data)            
       {
           <?php
                if($tipo==1){
                ?>
                /* dolares 
                $("#table").append("<tr><td><input type='hidden' name='id[]' value='"+data.codigo+"'><input value='' name='cantidad[]' placeholder='0' class='form-control requerido'></td><td>"+data.producto+"</td><td class='text-right'><input type='text' value='' placeholder='0' name='venta[]' class='form-control requerido' ></td><td class='text-right'>"+data.importe+"</td><td class='text-right'>0</td><td class='text-right'>0</td><td><a class='btn btn-danger waves-effect waves-light' data-toggle='tooltip' data-original-title='Eliminar' href='<?php echo base_url().'compra/eliminar_temporal/'.$this->uri->segment(3,0)."/";?>"+data.codigo+"'><i class='fa fa-close m-r-5'></i><span> Eliminar </span></a></td></tr>");
                <?php }else { ?>
                
                /* soles  
                $("#table").append("<tr><td><input type='hidden' name='id[]' value='"+data.codigo+"'><input value='' name='cantidad[]' placeholder='0' class='form-control requerido' ></td><td>"+data.producto+"</td><td class='text-right'><input type='text' value='' placeholder='0' name='venta[]' class='form-control requerido' ></td><td class='text-right'>"+data.importe+"</td><td><a class='btn btn-danger waves-effect waves-light' data-toggle='tooltip' data-original-title='Eliminar' href='<?php echo base_url().'compra/eliminar_temporal/'.$this->uri->segment(3,0)."/";?>"+data.codigo+"'><i class='fa fa-close m-r-5'></i><span> Eliminar </span></a></td></tr>");
                <?php } ?>
           
           return false;
       }
     });
    return false;
}*/
</script>

          
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  $(document).ready(function() {
  $(document).on('click', '#registrar_por_id', function(event) {
    event.preventDefault();
    /* Act on the event */
     var producto = document.getElementById("producto").value;
     if(producto=='Seleccionar'){
         Swal.fire("Error!", "Selecciona un producto", "error", {
             button: "ok!",
         });
        return false;
    };
    $.ajax({                        
        type: "POST",                 
        url: "<?php echo base_url()."Inventario/Compras/listadatos";?>",                    
        data: {productox:producto,registro:<?php echo $this->uri->segment(4,0)?>}, /*id:1,id:2*/
        dataType:"JSON",
        success: function(data)            
       {
           <?php
                if($tipo==1){
                ?>
                /* dolares */
                $("#show_date").append("<tr><td><input type='hidden' name='id[]' value='"+data.codigo+"'><input value='' name='cantidad[]' placeholder='0' class='form-control requerido'></td><td>"+data.producto+"</td><td class='text-right'><input type='text' value='' placeholder='0' name='venta[]' class='form-control requerido' ></td><td class='text-right'>"+data.importe+"</td><td class='text-right'>0</td><td class='text-right'>0</td><td><a class='btn btn-danger waves-effect waves-light' data-toggle='tooltip' data-original-title='Eliminar' href='<?php echo base_url().'Inventario/Compras/eliminar_temporal/'.$this->uri->segment(4,0)."/";?>"+data.codigo+"'><i class='fas fa-times-circle'></i></a></td></tr>");
                <?php }else { ?>
                
                /* soles */    
                $("#show_date").append("<tr><td><input type='hidden' name='id[]' value='"+data.codigo+"'><input value='' name='cantidad[]' placeholder='0' class='form-control requerido' ></td><td>"+data.producto+"</td><td class='text-right'><input type='text' value='' placeholder='0' name='venta[]' class='form-control requerido' ></td><td class='text-right'>"+data.importe+"</td><td><a class='btn btn-danger waves-effect waves-light' data-toggle='tooltip' data-original-title='Eliminar' href='<?php echo base_url().'Inventario/Compras/eliminar_temporal/'.$this->uri->segment(4,0)."/";?>"+data.codigo+"'><i class='fas fa-times-circle'></i></a></td></tr>");
                <?php } ?>
           
           return false;
       }
     });
    return false;
  });
});

</script>

