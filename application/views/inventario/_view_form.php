 <!-- Column --><?php $total_product = $this->db->query("select count(*) as total from ta_productos"); foreach ($total_product->result() as $xx) {
                   $total_xx = $xx->total;
                } ?>
                <!--aqui agregamos de proveedor-->
                <?php $total_proveedor = $this->db->query("select count(*) as total from ta_proveedores"); foreach ($total_proveedor->result() as $xx) {
                   $total_proveedor = $xx->total;
                } ?>


                <!--aqui agregamos de pedidos entregados-->
                <?php $total_ventas = $this->db->query("select count(*) as total from ta_ventas"); foreach ($total_ventas->result() as $xx) {
                   $total_ventas_ = $xx->total;
                } ?>

                <!--aqui agregamos de total  compras-->
                <?php $total_compras_ = $this->db->query("select count(*) as total from ta_compras"); foreach ($total_compras_->result() as $xx) {
                   $total_compras = $xx->total;
                } ?>

                <!-- ============================================================== -->
                <div class="card-group">
                     <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-screen-desktop"></i></h3>
                                            <p class="text-muted"><a class="has-arrow waves-effect waves-dark text-info" href="<?php echo base_url().'Inventario/View_Inventario/';?>"  aria-expanded="false"><i class=" fab fa-wpforms"></i>&nbsp;MENU PRINCIPAL</a></p>
                                        </div>
                                        <div class="ml-auto">
                                            

                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class=" fas fa-box-open"></i></h3>
                                            <p class="text-muted"><a class="has-arrow waves-effect waves-dark" href="<?php echo base_url().'Inventario/Productos/';?>"  aria-expanded="false"><i class="fas fa-plus-circle"></i>&nbsp; PRODUCTO</a></p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-primary"><?php if ($total_xx=="" || $total_xx==null) {
                                                echo "0";
                                            }else{
                                                echo $total_xx;
                                            } ?></h2>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class=" fas fa-users"></i></h3>
                                            <p class="text-muted"><a class="has-arrow waves-effect waves-dark text-cyan" href="<?php echo base_url().'Inventario/Proveedores/';?>"  aria-expanded="false"><i class="fas fa-plus-circle"></i>&nbsp;PROVEEDORES</a></p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-cyan"><?php if ($total_proveedor=="" || $total_proveedor==null) {
                                                echo "0";
                                            }else{
                                                echo $total_proveedor;
                                            } ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-doc"></i></h3>
                                            <p class="text-muted"><a class="has-arrow waves-effect waves-dark text-purple" href="<?php echo base_url().'Inventario/Pedidos/';?>"  aria-expanded="false"><i class="fas fa-plus-circle"></i>&nbsp;PEDIDOS ENTREGADOS</a></p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-purple"><?php if ( $total_ventas_=="" ||  $total_ventas_==0) {
                                                echo "0";
                                            }else{
                                                echo  $total_ventas_;
                                            } ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted"><a class="has-arrow waves-effect waves-dark text-muted" href="<?php echo base_url().'Inventario/Compras/';?>"  aria-expanded="false"><i class="fas fa-plus-circle"></i>&nbsp;COMPRAS REALIZADAS</a></p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-success"><?php if ( $total_compras=="" ||  $total_compras==0) {
                                                echo "0";
                                            }else{
                                                echo  $total_compras;
                                            } ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>