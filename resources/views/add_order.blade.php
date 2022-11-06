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
                <section class="container">
                    <form id="form_add" action="" method="post" enctype="multipart/form-data" style="margin-right:100px;">
                        <input type="hidden" name="_token" value="v3VjtdkCifDB5iv7G9aUPYEhKveU18R1tnXop5am">
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2"></div>
                                <label class="col-md-2">Product <span style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" id="id" name="id" autocomplete="off" required="">
                                    <select name="prods" id="prods" class="form-control">
                                        <option value="" style="display: none;" selected="">- Choose Products -</option>
                                    </select>
                                </div>
                                <label class="col-md-2">Qty <span style="color: red;">*</span></label>
                                <div class="col-md-5">
                                    <input type="number" name="qty" id="qty" class="form-control"  step="1" required="" style="width:35%">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2"></div>
                                <label class="col-md-2">Entry Price <span style="color: red;">*</span></label>
                                <div class="col-md-4">
                                    <input type="number" name="entry_price" id="entry_price" class="form-control" autocomplete="off" required="" style="width:100%">
                                </div>
                                <label class="col-md-2">Base Price <span style="color: red;">*</span></label>
                                <div class="col-md-4">
                                    <input type="number" name="base_price" id="base_price" class="form-control" autocomplete="off" required="" style="width:100%">
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
                                        <option value="" style="display: none;" selected="">- Choose Sources -</option>
                                    </select>
                                </div>
                                <label class="col-md-2">Date Order <span style="color: red;">*</span></label>
                                <div class="col-md-4">
                                    <input type="text" name="date" id="date" class="form-control tgl_date" data-date="" data-date-format="DD/MM/YYYY" autocomplete="off" required="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2"></div>
                                <label class="col-md-2">Note</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="note" id="note" rows="5" cols="10" style="width:100%"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2"></div>
                                <label class="col-md-2">Calculation Tax</label>
                                <div class="col-md-4">
                                    <input type="number" name="cal_tax" id="cal_tax" class="form-control" autocomplete="off" required="">
                                </div>
                                <label class="col-md-2">Calculation Profit</span></label>
                                <div class="col-md-4">
                                    <input type="number" name="cal_profit" id="cal_profit" class="form-control" autocomplete="off" required="">
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
        </div>
    </div>
</body>
</html>
