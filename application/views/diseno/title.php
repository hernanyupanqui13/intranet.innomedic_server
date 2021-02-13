                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles row animated pulse">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"><?php echo $title[1];?></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url().'Sistema/';?>">Inicio</a></li>
                                <li class="breadcrumb-item active"><?php echo $title[1];?></li>
                            </ol>
                            <?php if ($title[2]=="") {
                               echo "";
                            }else{ ?>
                                <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>&nbsp;<?php echo $title[2];?></button>
                           <?php  } ?>
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <!-- Row -->