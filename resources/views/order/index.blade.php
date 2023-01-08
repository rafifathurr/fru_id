<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    <div class="wrapper">
        <div class="main-header">
            @include('layouts.navbar')
            @include('layouts.sidebar')
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">{{($title)}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <!-- Button -->
                    <div class="d-flex">
                    @if(Auth::guard('admin')->check())
                        <button id="export" class="btn btn-primary btn-round ml-auto mb-3" style="background-color:green !important;" href="">
                            <i class="fa fa-file-excel"></i>
                            Export Excel
                        </button>
                        <a class="btn btn-primary btn-round mb-3" style="margin-left:10px;" href="{{route('admin.order.create')}}">
                            <i class="fa fa-plus"></i>
                            Add Order
                        </a>
                    @else
                        <a class="btn btn-primary btn-round ml-auto mb-3" href="{{route('user.order.create')}}">
                            <i class="fa fa-plus"></i>
                            Add Order
                        </a>
                    @endif
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="add-row_length"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="add-row_filter"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="add-row" class="display table table-striped table-hover dataTable"
                                        cellspacing="0" width="100%" role="grid" aria-describedby="add-row_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="add-row"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">
                                                    <center>No</center>
                                                </th>
                                                <th width:"25%" class="sorting" tabindex="0" aria-controls="add-row"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="font-weight:900;">
                                                    <center>Date</center>
                                                </th>
                                                <th width:"25%" class="sorting" tabindex="0" aria-controls="add-row"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="font-weight:900;">
                                                    <center>Product</center>
                                                </th>
                                                <th width:"25%" class="sorting" tabindex="0" aria-controls="add-row"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 15%; font-weight:900;">
                                                    <center>Code</center>
                                                </th>
                                                <th width:"25%" class="sorting" tabindex="0" aria-controls="add-row"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 15%; font-weight:900;">
                                                    <center>Source Payment</center>
                                                </th>
                                                <th width:"25%" class="sorting" tabindex="0" aria-controls="add-row"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="font-weight:900;">
                                                    <center>Qty</center>
                                                </th>
                                                <th width:"25%" class="sorting" tabindex="0" aria-controls="add-row"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="font-weight:900;">
                                                    <center>Profit</center>
                                                </th>
                                                <th width="15%" class="sorting" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending"
                                                    style="font-weight:900;">
                                                    <center>Action</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $num = 0; ?>
                                        @foreach($orders as $order)
                                            <tr role="row" class="odd">
                                                <td>
                                                    <center>{{$num=$num+1}}</center>
                                                </td>
                                                <td class="sorting_1">
                                                    <center>{{$order->date}}</center>
                                                </td>
                                                <td class="sorting_1">
                                                    <center>{{$order->product->product_name}}</center>
                                                </td>
                                                <td class="sorting_1">
                                                    <center>{{$order->product->code}}</center>
                                                </td>
                                                <td class="sorting_1">
                                                    <center>{{$order->source->source}}</center>
                                                </td>
                                                <td class="sorting_1">
                                                   <center>{{$order->qty}}</center>
                                                </td>
                                                <td class="sorting_1">
                                                    <center>Rp. {{number_format($order->profit,0,',','.')}}</center>
                                                 </td>
                                                <td>
                                                    <center>
                                                        <div class="form-button-action">
                                                        @if(Auth::guard('admin')->check())
                                                            <a href="{{route('admin.order.detail', $order->id) }}" data-toggle="tooltip" title="Detail"
                                                                class="btn btn-link btn-simple-primary btn-lg"
                                                                data-original-title="Detail" control-id="ControlID-16">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="{{route('admin.order.edit', $order->id) }}" data-toggle="tooltip" title="Edit"
                                                                class="btn btn-link btn-simple-primary btn-lg"
                                                                data-original-title="Edit" control-id="ControlID-16">
                                                                <i class="fa fa-edit" style="color:grey;"></i>
                                                            </a>
                                                            <button type="submit" onclick="destroy({{$order->id}})" data-toggle="tooltip" title="Delete"
                                                                class="btn btn-link btn-simple-danger"
                                                                data-original-title="Delete" control-id="ControlID-17">
                                                                <i class="fa fa-trash" style="color:red;"></i>
                                                            </button>
                                                        @else
                                                            <a href="{{route('user.order.detail', $order->id) }}" data-toggle="tooltip" title="Detail"
                                                                class="btn btn-link btn-simple-primary btn-lg"
                                                                data-original-title="Detail" control-id="ControlID-16">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="{{route('user.order.edit', $order->id) }}" data-toggle="tooltip" title="Edit"
                                                                class="btn btn-link btn-simple-primary btn-lg"
                                                                data-original-title="Edit" control-id="ControlID-16">
                                                                <i class="fa fa-edit" style="color:grey;"></i>
                                                            </a>
                                                            <button type="submit" onclick="destroy({{$order->id}})" data-toggle="tooltip" title="Delete"
                                                                class="btn btn-link btn-simple-danger"
                                                                data-original-title="Delete" control-id="ControlID-17">
                                                                <i class="fa fa-trash" style="color:red;"></i>
                                                            </button>
                                                        @endif
                                                        </div>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="add-row_info"></div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
                <script src="{{ asset('js/app/table.js') }}"></script>
            </div>
        </div>
    </div>
</body>
<script>
$(document).ready(function() {
    $('#export').on('click', function(){
        const div = document.createElement("form");
        div.method='POST';
        div.action='{{route("admin.order.export")}}';
        $(div).html(
            "<select id='tahun' name='tahun' onchange='getMonth()' class='form-control'>"+
            "<option value='' style='display: none;' selected=''>- Choose Year -</option>"+
            "@foreach($years as $year)" +
            "<option value='{{$year->tahun}}'>{{ $year->tahun }}</option>"+
            "@endforeach"+
            "</select><br><br>"+
            "<select id='bulan' name='bulan' class='form-control'>"+
            "<option value='' style='display: none;' selected=''>- Choose Month -</option>"+
            "</select><br><br>"
        );
        swal({
            title: "Export Report Order",
            content: div,
            buttons: [true, "Export"]
        }).then(value => {
            div.submit();
        });
    })
})

    function getMonth(){
        var tahun = document.getElementById("tahun").value;
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('admin.order.getMonth') }}",
            type: "POST",
            data: {
                '_token': token,
                'tahun': tahun
            },
        }).done(function(result){
            $('#bulan').empty();
            $('#bulan').append($('<option>', { 
                value: '0',
                text : 'All' 
            }));
            $.each(JSON.parse(result), function(i, item) {
                $('#bulan').append($('<option>', { 
                    value: item.bulan,
                    text : item.nama_bulan 
                }));
            });
        });
    }
    
    function destroy(id) {
    var token = $('meta[name="csrf-token"]').attr('content');

    swal({
          title: "",
          text: "Are you sure want to delete this record?",
          icon: "warning",
          buttons: ['Cancel', 'OK'],
          // dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
            @if(Auth::guard('admin')->check())
                $.post("{{route('admin.order.delete')}}",{ id:id,_token:token},function(data){
                    location.reload();
                })
            @else
                $.post("{{route('user.order.delete')}}",{ id:id,_token:token},function(data){
                    location.reload();
                })
            @endif
          } else {
            return false;
          }
      });
  }
</script>

@include('layouts.swal')
</html>
