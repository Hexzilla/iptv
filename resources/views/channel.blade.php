@extends('layouts.app_admin_panel')

{{-- Page title --}}
@section('title')
Channel
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
                    <i class="fa  fa-satellite-dish"></i>
                    Manage Channels
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
                            Add Channel &nbsp;&nbsp;&nbsp; <i class="fa fa-plus-circle"></i>
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
                                    <th width="3%">
                                        No</th>
                                    <th width="5%">
                                        Logo</th>
                                    <th width="5%">
                                        Name</th>
                                    <th width="5%">
                                        Stream</th>
                                    <th width="10%">
                                        URL</th>
                                    <th width="5%">
                                        Category</th>
                                    <th width="20%">
                                        Description</th>
                                    <th width="5%">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($channels as $key => $channel)
                                <tr role="row" class="even">
                                    <td>{{ $channels->firstItem() + $key }}</td>
                                    @if($channel->logo != null)
                                    <td>
                                        <img src="{{ url('public/img/chanellogo/'. $channel->logo) }}" data-src="{{ 'public/img/chanellogo/'. $channel->logo }}" onerror="this.src='public/favicon.png';" alt="Missing Image" style="width:60px; height:60px;" id="logo">
                                    </td>
                                    @else
                                    <td>
                                        <img src="{{ url('public/favicon.png') }}" data-src="{{ 'public/favicon.png'  }}" alt="Missing Image" style="width:60px; height:60px;" id="logo">
                                    </td>
                                    @endif
                                    <td>{{ $channel->name }}</td>
                                    <td>{{ $channel->stream->name }}</td>

                                    <td>
                                        <p style="word-break: break-all;">{{ $channel->url }}</p>
                                    </td>
                                    <td>{{ $channel->category->name }}</td>
                                    <td>{{ $channel->description }}</td>
                                    <td>
                                        <div class="btn-group button_group_rounded btn_group_padding" role="group">
                                            <button type="button" class="btn btn-outline-secondary edit" data-toggle="tooltip" data-id="{{ $channel->id }}" data-placement="top" title="Edit"><i style="font-size:x-large" class="fa fa-pencil text-warning"></i></button>
                                            <button type="button" class="btn btn-outline-secondary delete" data-toggle="tooltip" data-id="{{ $channel->id }}" data-placement="top" title="Remove"><i style="font-size:x-large" class="fa fa-trash text-danger"></i></button>
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
                    {{ $channels->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- /.inner -->
</div>
<!-- /.outer -->
<!-- Modal -->
<div class="modal fade" id="channel_edit_modal" role="dialog" aria-labelledby="modalLabelprimary" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="modalLabelprimary">Add Channel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <form method="POST" action="{{ route('add_channel') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="hidden_id" name="hidden_id">
                    <input type="hidden" id="hidden_mode" name="hidden_mode">
                    <!-- <div class="col-lg input_field_sections">
                    <h3 id="user_name" style="text-align: center;"></h3>
                    </div> -->
                    <div class="col-lg input_field_sections">
                        <h4>Channel Name</h4>
                        <input maxlength="50" type="text" class="form-control focused_input" name="channel_name" id="channel_name" required="required">
                    </div>

                    <div class="col-lg input_field_sections">
                        <h4>Category</h4>
                        <select class="form-control chzn-select" id="channel_category" name="channel_category" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg input_field_sections">
                        <h4>Stream Type</h4>
                        <select class="form-control chzn-select" id="stream_type" name="stream_type" required>
                            @foreach($streams as $stream)
                            <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg input_field_sections">
                        <h4>URL</h4>
                        <input maxlength="256" type="text" class="form-control focused_input" name="channel_url" id="channel_url" required="required">
                    </div>

                    <div class="col-lg input_field_sections">
                        <h4>Description</h4>
                        <input maxlength="500" type="text" class="form-control focused_input" name="channel_description" id="channel_description" required="required">
                    </div>
                    <div class="col-12 row" style="margin-top:20px;">
                        <div class="col-4 d-flex align-items-center">
                            <h3>LOGO</h3>
                        </div>
                        <div class="col-8 col-lg-6 text-center text-lg-left">

                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new img-thumbnail text-center">
                                    <img src="{{ url('public/favicon.png') }}" data-src="public/favicon.png" alt="Missing Image" style="width:120px; height:120px;" id="preview_logo"></div>
                                <div class="fileinput-preview fileinput-exists img-thumbnail"></div>
                                <div class="m-t-20 text-center">
                                    <span class="btn btn-primary btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="channel_logo">
                                    </span>
                                    <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
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

        swal_confirm('Do you want to remove selected channel?', function() {
            $.ajax({
                type: 'POST',
                url: "{{ url('/remove_channel') }}",
                data: {
                    row_id: row_id
                },
                async: false,
                success: function(result) {
                    //console.log(result);
                    window.location.href = "{{ Route('channel') }}";
                }
            });
        });

    });


    $(document).on('click', '.add', function() {
        $("#channel_name").val("");
        $("#channel_category").val(0);
        $("#channel_url").val("");
        $("#channel_description").val("");
        $("#preview_logo").attr('src', baseUrl + '/public/' + 'favicon.png');
        $("#preview_logo").attr('data-src', 'public/favicon.png');

        $("#hidden_mode").val("add");
        $("#channel_edit_modal").modal();
    });

    $(document).on('click', '.edit', function() {
        row_id = $(this).attr('data-id');

        $.ajax({
            type: 'GET',
            url: "{{ url('/get_channel') }}",
            data: {
                row_id: row_id
            },
            async: false,
            success: function(result) {
                var obj = JSON.parse(result);

                $("#modalLabelprimary").html("Edit Channel");
                $("#channel_name").val(obj['name']);
                $("#channel_category").val(obj['category_id']);
                $("#channel_url").val(obj['url']);
                $("#channel_description").val(obj['description']);



                if (obj['logo'] != null) {
                    $("#preview_logo").attr('src', baseUrl + '/public/img/chanellogo/' + obj['logo']);
                    $("#preview_logo").attr('data-src', 'public/img/chanellogo/' + obj['logo']);
                } else {
                    $("#preview_logo").attr('src', baseUrl + '/public/' + 'favicon.png');
                    $("#preview_logo").attr('data-src', 'public/favicon.png');
                }

                $("#hidden_mode").val("edit");
                $("#hidden_id").val(row_id);

                $("#channel_edit_modal").modal();
            }
        });
    });
</script>

@stop