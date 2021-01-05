@extends('layouts.app_admin_panel')

{{-- Page title --}}
@section('title')
Devices
@parent
@stop
{{-- page level styles --}}
@section('header_styles')
<!--Plugin styles-->
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.css" />-->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<!--End of plugin styles-->
<!--Page level styles-->
<link type="text/css" rel="stylesheet" href="#" id="skin_change" />
<link type="text/css" rel="stylesheet" href="{{asset('public/vendors/Buttons/css/buttons.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('public/css/pages/buttons.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('public/vendors/hover/css/hover-min.css')}}" />


<!-- plugin styles-->
<link type="text/css" rel="stylesheet" href="{{asset('public/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('public/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" />
<!--end of page level css-->
<!-- end of page level styles -->
@stop

{{-- Page content --}}
@section('content')
<style>
    table.dataTable td.focus {
        outline: 1px solid #ac1212;
        outline-offset: -3px;
        /*background-color: #B0BED8 !important;*/
        background-color: #78c0ff !important;
    }

    table.dataTable tbody>tr.selected,
    table.dataTable tbody>tr>.selected {
        background-color: #78c0ff !important;
    }

    table.dataTable.display tbody>tr.selected:hover>.sorting_1,
    table.dataTable.order-column.hover tbody>tr.selected:hover>.sorting_1 {
        background-color: #78c0ff !important;
    }

    table.dataTable.order-column tbody>tr.selected>.sorting_1,
    table.dataTable.order-column tbody>tr.selected>.sorting_2,
    table.dataTable.order-column tbody>tr.selected>.sorting_3,
    table.dataTable.order-column tbody>tr>.selected,
    table.dataTable.display tbody>tr.selected>.sorting_1,
    table.dataTable.display tbody>tr.selected>.sorting_2,
    table.dataTable.display tbody>tr.selected>.sorting_3,
    table.dataTable.display tbody>tr>.selected {
        background-color: #78c0ff !important;
    }

    a.dt-button {
        font-size: 1em;
    }

    .botones {
        float: left
    }

    .btn-sm-menu {
        padding: 5px 5px;
        font-size: 17px;
        margin: 7px;
        background-color: #00c0ef;
        font-weight: bold;
        color: #ffffff;
    }

    .btn-sm-menu:hover {
        background-color: #0c88a7 !important;
    }

    .dt-button:hover {
        background-color: #00c0ef !important;
    }
</style>
<header class=" head">
    <div class="main-bar">
        <div class="row no-gutters">
            <div class="col-lg-6 col-sm-6">
                <h4 class="nav_top_align">
                    <i class="fa  fa-mobile-alt"></i>
                    Manage Devices
                </h4>
            </div>
            <!-- <div class="col-lg-6 col-sm-6 col-12">
                <ol class="breadcrumb float-right  nav_breadcrumb_top_align">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <i class="fa fa-home" data-pack="default" data-tags=""></i> Inicio
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Ciudades</a>
                    </li>
                </ol>
            </div> -->
        </div>
    </div>
</header>
<div class="outer">
    <div class="inner bg-container">
        <div class="card">
            <!-- <div class="card-header bg-white">
                City Manage
            </div> -->
            <div class="card-body m-t-35">
                <div class="table-toolbar">
                    <div class="btn btn-group" style="margin-bottom: 20px;">
                        <a id="editable_table_new" class="add btn btn-primary glow_button hvr-float-shadow" style="color:white; font-size:17px">
                            Add Device &nbsp;&nbsp;&nbsp; <i class="fa fa-plus-circle"></i>
                        </a>
                    </div>
                    <div class="btn-group float-right users_grid_tools">
                        <div class="tools"></div>
                    </div>
                </div>
                <div>
                    <div>
                        <table id="example3" class="display table table-stripped table-bordered" style="width:100%">
                            <thead>
                                <tr role="row">
                                    <th>
                                        No</th>
                                    <th>
                                        ID</th>
                                    <th>
                                        Name</th>
                                    <th>
                                        Type</th>
                                    <th>
                                        Room Name</th>
                                    <th>
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($devices as $key => $device)
                                <tr role="row" class="even">
                                    <td>{{ $devices->firstItem() + $key}}</td>
                                    <td>{{ $device->device_id }}</td>
                                    <td>{{ $device->device_name }}</td>
                                    <td>{{ $device->device_type == 0 ? '' : ($device->device_type == 1 ? 'Tv' : ($device->device_type == 2 ? 'Android Box' : ($device->device_type == 3 ? 'Phone' : 'Mag'))) }}</td>
                                    <td>{{ $device->room->name}}</td>
                                    <td>
                                        <div class="btn-group button_group_rounded btn_group_padding" role="group">
                                            <button type="button" class="btn btn-outline-secondary edit" data-toggle="tooltip" data-id="{{ $device->id }}" data-placement="top" title="Edit"><i style="font-size:x-large" class="fa fa-pencil text-warning"></i></button>
                                            <button type="button" class="btn btn-outline-secondary delete" data-toggle="tooltip" data-id="{{ $device->id }}" data-placement="top" title="Remove"><i style="font-size:x-large" class="fa fa-trash text-danger"></i></button>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <div class="clearfix">
                <div class="pull-right">
                    {{ $devices->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- /.inner -->
</div>
<!-- /.outer -->
<!-- Modal -->
<div class="modal fade" id="device_edit_modal" role="dialog" aria-labelledby="modalLabelprimary" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="modalLabelprimary">Add Device</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <form method="POST" action="{{ route('add_device') }}" enctype="multipart/form-data" onsubmit="return checkforblank()">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="hidden_id" name="hidden_id">
                    <input type="hidden" id="hidden_mode" name="hidden_mode">

                    <div class="col-lg input_field_sections">
                        <h4>Device Name</h4>
                        <input maxlength="50" type="text" class="form-control focused_input" name="device_name" id="device_name" required="required">
                    </div>

                    <div class="col-lg input_field_sections">
                        <h4>Device ID</h4>
                        <input maxlength="50" type="text" class="form-control focused_input" name="device_id" id="device_id" required="required">
                    </div>
                    
                    <div class="col-lg input_field_sections">
                        <h4>Type</h4>
                        <select class="form-control chzn-select" id="device_type" name="device_type" required>
                            <option value="1">TV</option>
                            <option value="2">Android Box</option>
                            <option value="3">Phone</option>
                            <option value="4">Mag</option>
                        </select>
                    </div>

                    <div class="col-lg input_field_sections">
                        <h4>Room Name</h4>
                        <select class="form-control chzn-select" id="device_room" name="device_room" required>
                            @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" id="btn_save_channel">&nbsp;&nbsp; Save &nbsp;&nbsp;</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
{{-- page level scripts --}}

@section('footer_scripts')
<script type="text/javascript" src="{{ url('public/js/pluginjs/jasny-bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ url('public/vendors/holderjs/js/holder.js') }}"></script>
<script type="text/javascript" src="{{ url('public/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"></script>
<script type="text/javascript" src="{{ url('public/js/pages/validation.js') }}"></script>

<script>
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    $(document).ready(function() {
    });

    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(document).on('click', '.delete', function() {

        row_id = $(this).attr('data-id');

        swal_confirm('Do you want to remove selected device?', function() {
            $.ajax({
                type: 'POST',
                url: "{{ url('/remove_device') }}",
                data: {
                    row_id: row_id
                },
                async: false,
                success: function(result) {
                    //console.log(result);
                    window.location.href = "{{ Route('device') }}";
                }
            });
        });

    });


    $(document).on('click', '.add', function() {
        $("#device_name").val("");
        $("#device_id").val("");
        $("#device_type").val(0);
        $("#device_room").val(0);

        $("#hidden_mode").val("add");
        $("#device_edit_modal").modal();
    });

    $(document).on('click', '.edit', function() {
        row_id = $(this).attr('data-id');

        $.ajax({
            type: 'GET',
            url: "{{ url('/get_device') }}",
            data: {
                row_id: row_id
            },
            async: false,
            success: function(result) {
                var obj = JSON.parse(result);

                $("#modalLabelprimary").html("Edit Device");
                $("#device_name").val(obj['device_name']);
                $("#device_id").val(obj['device_id']);
                $("#device_type").val(obj['device_type'] == null ? 0 : obj['device_type']);
                $("#device_room").val(obj['room_id'] == null ? 0 : obj['room_id']);

                $("#hidden_mode").val("edit");
                $("#hidden_id").val(row_id);

                $("#device_edit_modal").modal();
            }
        });
    });
</script>

@stop