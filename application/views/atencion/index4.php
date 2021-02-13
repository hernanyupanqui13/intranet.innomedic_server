


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
               <!-- <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#staticBackdrop">Agregar Nuevo Paciente</button>-->
               <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" onclick="myFunction()">Agregar Nuevo Paciente</button>

                    <!-- Add Contact Popup Model -->
                   

                <h4 class="card-title">Registro de Historial</h4>
                <h6 class="card-subtitle">Paciente - Hsitorial</h6>
              <!--  <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Person</button>-->
                     <button class="btn btn-success" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <div class="table-responsive">
                    <table id="table" class="table m-t-30 table-striped table-bordered table-hover no-wrap contact-list" cellspacing="0" width="100%">
                        <thead>
                            <tr> 
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Fecha</th>
                                <th>Paciente</th>
                                <th>DNI</th>
                                <th>Calidad</th>
                                <th>Estado</th>
                                <th>Empresa</th>
                                <th style="width:150px;">Opción</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>Paciente</th>
                            <th>DNI</th>
                            <th>Calidad</th>
                            <th>estado</th>
                            <th>Empresa</th>
                            <th>Opción</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Atencion/Historial/ajax_list/')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});





function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('person/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="firstName"]').val(data.firstName);
            $('[name="lastName"]').val(data.lastName);
            $('[name="gender"]').val(data.gender);
            $('[name="address"]').val(data.address);
            $('[name="dob"]').datepicker('update',data.dob);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal

            if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo

            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}


function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo base_url().'Atencion/Historial/Registrar_historial/';?>";
    } else {
        url = "<?php echo site_url('person/ajax_update')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('person/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>





<div class="modal fade bd-example-modal-lgsd" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="exampleModalLabel">Registro de nuevo Paciente </h3>                           
            </div>
            <div class="modal-body">
                <form autocomplete="on" method="post" id="registrar_historial_xx" class="form-horizontal form-material">

                    
                    <div class="row">
                        <div class="col-md-12 m-b-20">
                        <input type="text" name="codigo_id" id="codigo_idx" class="form-control" placeholder="Ingrese el 000642"> 
                    </div>
                        <div class="col-md-12 m-b-20">
                        <input type="text" name="paciente" id="pacientex" class="form-control" placeholder="Paciente"> 
                    </div>

                    <div class="col-md-12 m-b-20">
                        <input type="text" name="dni" id="dnix" class="form-control" placeholder="DNI"> 
                    </div>
                    <div class="col-md-12 m-b-20">
                        <h6 class="card-title">Paso calidad</h6>
                        <div class="btn-group mt-3" data-toggle="buttons" role="group">
                        <label class="btn btn-outline btn-info">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="checkx1" name="check" value="Si" class="custom-control-input">
                                <label class="custom-control-label" for="checkx1"> <i class="ti-check text-active" aria-hidden="false"></i> Si</label>
                            </div>
                        </label>
                        <label class="btn btn-outline btn-info">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="checkx2" name="check" value="No" class="custom-control-input">
                                <label class="custom-control-label" for="checkx2"> <i class="ti-check text-active" aria-hidden="true"></i> NO</label>
                            </div>
                        </label>
                        <label class="btn btn-outline btn-info active">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="checkx3" name="check" value="n/a" class="custom-control-input">
                                <label class="custom-control-label" for="checkx3"> <i class="ti-check text-active" aria-hidden="true"></i> N/A</label>
                            </div>
                        </label>
                    </div>
                    </div>

                    <div class="col-md-12 m-b-20">
                        <input type="text" name="empresa" id="empresax" class="form-control" placeholder="Buscar Empresa"> 
                    </div>
                    <div class="col-md-12 m-b-20">
                        <textarea name="observaciones" id="observacionesx" cols="30" rows="10" class="form-control" placeholder="Observaciones"></textarea>
                    </div>

                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="form-actions">
                               <input type="hidden" name="user_id" id="user_id" />
                                <button type="submit" class="btn btn-success btn-rounded" id="btnSave"> <i class="fa fa-check"></i> Agregar</button>
                                <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded"><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script>
    var save_method; //for save method string
    var table;

    function myFunction()
    {
        save_method = 'add';
        $('#registrar_historial_xx')[0].reset(); // reset form on modals
        $('#staticBackdrop').modal('show'); // show bootstrap modal
        $('.modal-title').text('Agregar nuevo paciente'); // Set Title to Bootstrap modal title
        $('.form-group').removeClass('has-error'); // clear error class

    }

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax 
    }


    $(document).ready(function(){
        
        
        $(document).on('submit', '#registrar_historial_xx', function(event){  
           event.preventDefault();  
           $('#btnSave').text('Guardando...'); //change button text
           $('#btnSave').attr('disabled',true); //set button disable 
       
            $.ajax({  
                 url:"<?php echo base_url().'Atencion/Historial/Registrar_historial/';?>",
                 method:'POST',  
                 data:new FormData(this),  
                 contentType:false,  
                 processData:false,  
                 success:function(data)  
                 {  
                    var json = JSON.parse(data);
                          const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        })

                        Toast.fire({
                          icon: 'success',
                          title: ''+json.mensaje+''
                        })  
                      $('#registrar_historial_xx')[0].reset();  
                      $('.bd-example-modal-lgsd').modal('hide');   
                      reload_table();
                    //  $("#cargar_id").load(location.href+" #cargar_id>*",""); 
                      // location.href= "<?php echo base_url().'Atencion/Historial/';?>";
                      
                      // $("#example23").load(location.href+" #example23>*","");
                   
                     
                 },statusCode:{
                      400: function(xhr){

                        var json = JSON.parse(xhr.responseText);
                        if (json.error) {
                          Swal.fire({
                              title: 'Lo siento mucho',
                              text: ""+json.error+"",
                              icon: 'warning',
                              showCancelButton: false,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'OK'
                            }).then((result) => {
                              if (result.value) {
                                
                              }
                            })
                            $('#btnSave').text('Reintentar'); //change button text
                            $('#btnSave').attr('disabled',false);
                         /* $("#alert").html('<div class="alert alert-success text-center" id="alerta" role="alert">'+json.alerta+'</div>'); */
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
    });

</script>




