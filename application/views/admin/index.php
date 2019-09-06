<?php  $this->load->view('admin/header'); ?>
<body>
<div id="app">

    <!-- sidebar -->
    <?php $this->load->view('admin/nav-header'); ?>
    <!-- / sidebar -->
    <div class="app-content">
        <!-- start: TOP NAVBAR -->
        <header class="navbar navbar-default navbar-static-top">
            <!-- start: NAVBAR HEADER -->
            <div class="navbar-header">
                <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                    <i class="ti-align-justify"></i>
                </a>
                <a class="navbar-brand" href="#" style="text-align: center;">
                    <img src="<?php echo base_url(); ?>admintemp/assets/images/logo.png" style="width:109px; height:42px" alt="ExcelzWeb">
                </a>
                <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
                    <i class="ti-align-justify"></i>
                </a>
                <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href="<?php echo base_url();?>.navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="ti-view-grid"></i>
                </a>
            </div>
            <!-- end: NAVBAR HEADER -->
            <!-- start: NAVBAR COLLAPSE -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-right">
                    <!-- start: MESSAGES DROPDOWN -->

                    <!-- end: MESSAGES DROPDOWN -->
                    <!-- start: ACTIVITIES DROPDOWN -->

                    <!-- end: ACTIVITIES DROPDOWN -->
                    <!-- start: LANGUAGE SWITCHER -->

                    <!-- start: LANGUAGE SWITCHER -->
                    <!-- start: USER OPTIONS DROPDOWN -->
                    <?php  $this->load->view('admin/login_header'); ?>
                    <!-- end: USER OPTIONS DROPDOWN -->
                </ul>
                <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
                <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                    <div class="arrow-left"></div>
                    <div class="arrow-right"></div>
                </div>
                <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
            </div>

            <!-- end: NAVBAR COLLAPSE -->
        </header>
        <!-- end: TOP NAVBAR -->
        <div class="main-content" >
            <div class="wrap-content container" id="container">
                <!-- start: PAGE TITLE -->
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle">View All Events</h1>
                            <span class="mainDescription">Following section is for view Events. You can Approve pending Events details from here. </span>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Dashboard</span>
                            </li>
                            <li class="active">
                                <span>View Events</span>
                            </li>
                        </ol>
                    </div>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- start: FORM VALIDATION EXAMPLE 1 -->
                <div class="container">

                    </center>
                    <br />
                    <br />

                    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>

                            <th>Event Name</th>
                            <th>Venue</th>
                            <th>Creator Email</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th style="width:125px;">Action
                                </p></th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($events_all as $events){
                            if(empty($events)) { echo 'Please Add Listing </br> No listing found';
                                } else {

                                ?>
                                <tr>

                                    <td><?php echo $events['EventName'];?></td>
                                    <td><?php echo $events['Venue'];?></td>
                                    <td><?php echo $events['Email'];?></td>
                                    <td><?php
                                        $newDate = date("d-M-Y", strtotime($events['CreatedAt']));
                                        echo $newDate;
                                        ?>
                                    </td>
                                    <td><?php echo $events['StatusName'];  ?></td>
                                    <td>
                                        <button class="btn btn-warning" onclick="edit_book(<?php echo $events['id']; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                                        <button class="btn btn-danger" onclick="delete_book(<?php echo $events['id']; ?>)"><i class="glyphicon glyphicon-remove"></i></button>

                                    </td>

                                </tr>
                            <?php }  }?>


                        </tbody>


                    </table>

                </div>
                <!-- <div class="container-fluid container-fullw bg-white">


                 <!-- end: FORM VALIDATION EXAMPLE 2 -->
            </div>
        </div>
    </div>




    <script src="<?php echo base_url('admintemp/assests/jquery/jquery-3.1.0.min.js')?>"></script>
    <script src="<?php echo base_url('admintemp/assests/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('admintemp/assests/datatables/js/dataTables.bootstrap.js')?>"></script>





    <!-- start: FOOTER -->
    <?php  $this->load->view('user/footer'); ?>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
        var save_method; //for save method string
        var table;

        function edit_book(id)
        {

            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals

            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('admin/ajax_event_id_edit/')?>"+id,
                type: "GET",
                dataType: "JSON",


                success: function(data)
                {

                    var returnedData = JSON.stringify(data);

                   // console.log(data);
                    $('[name="Id"]').val(data.Id);
                    $('[name="EventName"]').val(data.EventName);
                    $('[name="Venue"]').val(data.Venue);
                    $('[name="StatusId"]').val(data.StatusId);
                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit'); // Set title to Bootstrap modal title




                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }


        function delete_book(id)
        {
            alert(id);
            if(confirm('Are you sure delete this data?'))
            {
                // ajax delete data from database
                $.ajax({
                    url : "<?php echo site_url('admin/specific_event_delete')?>/"+id,
                    type: "POST",
                    success: function(data, status, xhr) {
                        alert("success");
                        location.reload();

                    },
                    error: function(xhr, status, error) {

                        alert("error");
                        location.reload();
                    }

                });

            }
        }
    </script>


    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Edit</h3>
                </div>
                <div class="modal-body form">
                    <form action="update_event_status" id="form" method="post" class="form-horizontal">
                        <input type="hidden" value="" name="Id"/>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Event Name</label>
                                <div class="col-md-9">
                                    <input name="EventName" placeholder="Event Name" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Venue</label>
                                <div class="col-md-9">
                                    <input name="Venue" placeholder="Venue" class="form-control" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">

                                    <select id="StatusId" name="StatusId" class="form-control">
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="3">Blocked</option>
                                        <option value="4">Active</option>
                                    </select>

                                </div>
                            </div>



                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="document.getElementById('form').submit();" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Bootstrap modal -->