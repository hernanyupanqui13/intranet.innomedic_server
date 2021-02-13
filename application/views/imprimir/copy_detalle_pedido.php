<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            
            <div class="row">
             
             <div class='col-md-12'>
                 <a class="btn btn-danger waves-effect waves-light" href="<?php echo base_url().'Inventario/Pedidos/';?>">
                     <i class="fa fa-reply m-r-5"></i><span> Regresar </span>
                 </a>
                 
                 <?php if($estado==1){?>
                 
                 <?php
                     if($tipocomprobante==2){
                         $imprimir='comprobantefactura';
                     }else{
                         $imprimir='comprobante';
                     }
                 ?>
                    <a class="btn btn-info waves-effect waves-light text-white" data-toggle="tooltip" data-original-title="Imprimir" onclick="window.open('<?php echo base_url().'Inventario/Pedidos/'.$imprimir.'/'.$this->uri->segment(4,0);?>','targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=900,height=550');" target="_blank">
                         <i class="fa fa-print m-r-10"></i><span> Imprimir </span>
                     </a>

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

                <div class="col-md-2">
                    <div class="form-group">
                    <label><b>Tipo de Comprobante:</b></label>
                        <br>
                        
                         <?php foreach($listacomprobante as $x){ ?>
                                   <?php
                                       if($tipocomprobante==$x->Id){
                                           echo $x->nombre;
                                       }else{
                                           echo "";
                                       }
                                   ?>
                            <?php } ?>
                    </div>
                </div>
               
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b>Cliente:</b></label>
                           <br>
                            <?php foreach($listacombo1 as $x){ ?>
                                   <?php
                                       if($cliente==$x->Id){
                                           echo  $x->nombres.' '.$x->apellido_paterno.' '.$x->apellido_materno;
                                       }else{
                                           echo "";
                                       }
                                   ?>
                            <?php } ?>
                    </div>
                </div>
                
                <?php
                    if($tipocomprobante==1 ){
                ?>
                    <div class="col-md-2">
                       <div class="form-group">
                           <label class="control-label"><b>R.U.C: </b></label>
                           <br>
                           <?php echo $ruc;?>
                       </div>
                   </div>
               <?php }else{ ?>
                   <div class="col-md-2">
                       <div class="form-group">
                           <label class="control-label"><b>D.N.I: </b></label>
                           <br>
                           <?php echo $dni;?>
                       </div>
                   </div>
               <?php } ?>
               
               <div class="col-md-2">
                    <div class="form-group">
                           <label class="control-label"><b>Telefono:</b></label>
                           <br>
                           <?php if ($telefono=="" || $telefono== null) {
                            echo "--";
                           }else{
                            echo $telefono;
                           }?>
                       </div>
                </div>
               
                
            
           
            </div>
            
        </div>
        <div class="card-body">
          <div class="table-responsive ">
              <table id="myTable" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>CANTIDAD</th>
                          <th>DESCRIPCIÓN</th>
                          <th>FECHA</th>
                          <th>ENTREGADO</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($lista_detalle_pedido_general as $xx) {?>
                      <tr>
                        <td><?php echo $xx->cantidad; ?></td>
                        <td><?php $query = $this->db->query("select * from ta_productos");
                          foreach ($query->result() as $x) {
                            if ($x->Id == $xx->producto) {
                              echo $x->description;;
                            }
                          }
                          ?></td>
                          <td><?php echo $xx->fecha; ?></td>
                          <td><?php if($xx->estado==1){
                                            echo "<span class='label label-success'>Entregado</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Anulado</span>";
                                        } ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
              </table>
          </div>
        </div>
        <div class="text-center col-md-12">
                  <a class="text-danger" href="javascript:void(0)">ENTREGADO POR: <h3> <?php echo $entregado;?></h3></a>
               </div>
      </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
   $(document).on("click",".btn-view-venta",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "Movimientos/Ventas/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#myModal .modal-body").html(data);
            }
        });
    });
</script>-->