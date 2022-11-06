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
                    <form id="form_add" action="/master/payment/store" method="gwt" enctype="multipart/form-data" style="margin-right:100px;">
                    {{ csrf_field() }}
                        <input type="hidden" name="_token" value="v3VjtdkCifDB5iv7G9aUPYEhKveU18R1tnXop5am">
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2"></div>
                                <label class="col-md-2">Source Payment <span style="color: red;">*</span></label>
                                <div class="col-md-10">
                                    <input type="hidden" class="form-control" id="id" name="id" autocomplete="off" required="">
                                    <input type="text" name="sumber" id="sumber" class="form-control"  step="1" required="" style="width:100%;">
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
