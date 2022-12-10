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
                                <h2 class="text-white pb-2 fw-bold">{{ $title }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="container">
                    <form id="form_add" action="{{ route('order.' . $url) }}" method="POST" enctype="multipart/form-data"
                        style="margin-right:100px;">
                        {{ csrf_field() }}
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2"></div>
                                <label class="col-md-2">Product <span style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" id="id" name="id"
                                        autocomplete="off" required="">
                                    <select name="prods" id="prods" onchange="getProds()" class="form-control"
                                        @if (isset($orders)) @endisset>
                                        <option value="" style="display: none;" selected="">- Choose Products -
                                        </option>
                                        @foreach ($products as $prod)
                                            <option @if (isset($orders))
                                            <?php if ($orders->product_id == $prod->id) {
                                                echo 'selected';
                                            } ?> @endisset
                                            value="{{ $prod->id }}">{{ $prod->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 mt-1">Qty <span style="color: red;">*</span></label>
                            <div class="col-md-5">
                                <input type="number" name="qty" id="qty" class="form-control"
                                    step="1" required="" style="width:35%">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="col-md-2"></div>
                            <label class="col-md-2">Entry Price <span style="color: red;">*</span></label>
                            <div class="col-md-4">
                                <input type="text" name="entry_price" id="entry_price"
                                    class="form-control numeric" autocomplete="off" required=""
                                    style="width:100%">
                            </div>
                            <label class="col-md-2 mt-1">Base Price <span style="color: red;">*</span></label>
                            <div class="col-md-4">
                                <input type="text" name="base_price" id="base_price" class="form-control numeric"
                                    autocomplete="off" required="" style="width:100%">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="col-md-2"></div>
                            <label class="col-md-2">Source Payment <span style="color: red;">*</span></label>
                            <div class="col-md-4">
                                <select name="source_pay" id="source_pay" class="form-control">
                                    <option value="" style="display: none;" selected="">- Choose Sources -
                                    </option>
                                    @foreach ($sources as $source)
                                        <option @if (isset($orders))
                                        <?php if ($orders->source_id == $source->id) {
                                            echo 'selected';
                                        } ?> @endisset
                                        value="{{ $source->id }}">{{ $source->source }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-md-2 mt-1">Date Order <span style="color: red;">*</span></label>
                        <div class="col-md-4">
                            <input type="date" name="tgl" id="tgl" class="form-control tgl_date"
                                autocomplete="off" data-date="" data-date-format="DD/MM/YYYY"
                                @isset($orders) value="{{ $orders->date }}" @endisset
                                required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-10">
                        <div class="col-md-2"></div>
                        <label class="col-md-2">Note </label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="note" id="note" rows="5" cols="10" style="width:100%"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-10">
                        <div class="col-md-2"></div>
                        <label class="col-md-2">Calculation Tax </label>
                        <div class="col-md-4">
                            <input type="text" name="cal_tax" id="cal_tax" class="form-control numeric"
                                autocomplete="off" required="">
                        </div>
                        <label class="col-md-2">Calculation Profit </span></label>
                        <div class="col-md-4">
                            <input type="text" name="cal_profit" id="cal_profit"
                                class="form-control numeric" autocomplete="off" required="">
                        </div>
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                    <div style="float:right;">
                        <div class="col-md-10" style="margin-right: 20px;">
                            <a href="/order/list" type="button" class="btn btn-danger">
                                <i class="fa fa-arrow-left"></i>&nbsp;
                                Back
                            </a>
                            <button type="submit" class="btn btn-primary" style="margin-left:10px;">
                                <i class="fa fa-check"></i>&nbsp;
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
    @include('layouts.footer')
    <script>
        var sell_price = 0;
        var base_price = 0;

        function getProds() {
            var token = $('meta[name="csrf-token"]').attr('content');
            var id_prods = document.getElementById("prods").value;
            $.ajax({
                type: 'GET',
                url: "{{ route('order.getDetailProds') }}",
                data: {
                    'id_prod': id_prods
                },
                success: function(data) {

                    $("#base_price").val(data["base_price"])
                    base_price = data["base_price"];
                    sell_price = data["selling_price"];
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {

            $('#qty').on('keyup textInput input', function() {
                var qty = $("#qty").val();

                //Calculation
                var result_base = base_price * qty;

                $("#base_price").val(result_base);
            });

            $('#entry_price').on('keyup textInput input', function() {
                var entry_price = $("#entry_price").val();
                var base_price = $("#base_price").val();
                var entry = entry_price.split('.').join('').replace(/^Rp/, '');
                var base = base_price.split('.').join('').replace(/^Rp/, '');
                var qty = $("#qty").val();

                //Calculation
                var profit = entry - base;
                var sell_total = sell_price * qty;
                var tax = sell_total - entry;

                $("#cal_tax").val(tax);
                $("#cal_profit").val(profit);
            });

            $("#tgl_date").on("change", function() {
                if (this.value == "") {
                    this.setAttribute("data-date", "DD-MM-YYYY")
                } else {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "dd/mm/yyyy")
                        .format(this.getAttribute("data-date-format"))
                    )
                }
            }).trigger("change");
        });
    </script>
</div>
</div>
</body>

</html>
