   

                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                       
                                
                                 <div class="row">
                                    <!-- Column -->
                                    <div class="col-lg-12 col-md-20">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex m-b-40 align-items-center no-block">
                                                    <h5 class="card-title ">GRAFICOS ESTADISTICOS</h5>
                                                    <div class="ml-auto">
                                                        
                                                        <select name="year" id="year" class="form-control">
                                                            <?php foreach($years as $year):?>
                                                                <option value="<?php echo $year->year;?>">
                                                                    <?php echo $year->year;?>
                                                                </option>

                                                            <?php endforeach;?>
                                                        </select>
                                                    </div> 
                                                </div>
                                                <div id="grafico" style="margin: 0 auto"></div>
                                              <!--<div id="morris-area-chart" style="height: 340px;"></div>-->
                                            </div>
                                        </div>
                                    </div>

                                </div> 
                            </div>
                        </div>
                    </div>
                    <!-- column -->
             
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->


       




