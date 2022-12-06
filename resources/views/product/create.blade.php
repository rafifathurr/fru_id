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
                    <form id="form_add" action="{{ route('product.' . $url) }}" method="post"
                        enctype="multipart/form-data" style="margin-right:100px;">
                        {{ csrf_field() }}
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2"></div>
                                <label class="col-md-2">Name <span style="color: red;">*</span></label>
                                <div class="col-md-10">
                                    {{-- <input type="hidden" class="form-control" id="id" name="id" autocomplete="off" @isset($users) value="{{ $users->id }}" readonly @endisset required> --}}
                                    <input type="text" name="username" id="username" class="form-control"
                                        step="1" {{-- @if (isset($users)) value="{{ $users->username }}" @endisset --}} autocomplete="off" required
                                        {{ $disabled_ }} style="width:100%;">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2"></div>
                                <label class="col-md-2">Status <span style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" class="form-control"
                                        step="1" {{-- @if (isset($users)) value="{{ $users->name }}" @endisset --}} autocomplete="off" required
                                        {{ $disabled_ }} style="width:100%;">
                                </div>
                                <label class="col-md-1 mt-1">Stock <span style="color: red;">*</span></label>
                                <div class="col-md-3">
                                    <input type="number" name="name" id="name" class="form-control"
                                        step="1" {{-- @if (isset($users)) value="{{ $users->name }}" @endisset --}} autocomplete="off" required
                                        {{ $disabled_ }} style="width:100%;">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2"></div>
                                <label class="col-md-2">Base Price <span style="color: red;">*</span></label>
                                <div class="col-md-4">
                                    <input type="number" name="name" id="name" class="form-control"
                                        step="1" {{-- @if (isset($users)) value="{{ $users->name }}" @endisset --}} autocomplete="off" required
                                        {{ $disabled_ }} style="width:100%;">
                                </div>
                                <label class="col-md-2 mt-1">Selling Price <span style="color: red;">*</span></label>
                                <div class="col-md-4">
                                    <input type="number" name="name" id="name" class="form-control"
                                        step="1" {{-- @if (isset($users)) value="{{ $users->name }}" @endisset --}} autocomplete="off" required
                                        {{ $disabled_ }} style="width:100%;">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2"></div>
                                <label class="col-md-2">Description <span style="color: red;">*</span></label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="address" id="address" rows="5" cols="10" autocomplete="off" required
                                        {{ $disabled_ }} style="width:100%">{{-- @if (isset($users)) {{ $users->address }} @endisset --}}</textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2"></div>
                                <label class="col-md-2">Category <span style="color: red;">*</span></label>
                                <div class="col-md-4">
                                    <select class="form-control selectpicker" id="communityServiceSchemeId"
                                        name="communityServiceSchemeId" data-size="8" data-show-subtext="true"
                                        data-live-search="true">
                                        <option value="">-Please Select-</option>
                                    </select>
                                </div>
                                <label class="col-md-2 mt-1">Supplier <span style="color: red;">*</span></label>
                                <div class="col-md-4">
                                    <select class="form-control selectpicker" id="communityServiceSchemeId"
                                        name="communityServiceSchemeId" data-size="8" data-show-subtext="true"
                                        data-live-search="true">
                                        <option value="">-Please Select-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                                <div class="col-md-10">
                                    <div class="col-md-2"></div>
                                    <label class="col-md-2">Attachment <span style="color: red;">*</span></label>
                                    <div class="col-md-10">
                                        <input type="file" id="fileAttachment" name="fileAttachment"
                                            accept="application/pdf">
                                    </div>
                                </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <div style="float:right;">
                                @if ($title == 'Add Products')
                                    <div class="col-md-10" style="margin-right: 20px;">
                                        <a href="{{ route('users.index') }}" type="button" class="btn btn-danger">
                                            <i class="fa fa-arrow-left"></i>&nbsp;
                                            Back
                                        </a>
                                        <button type="submit" class="btn btn-primary" style="margin-left:10px;">
                                            <i class="fa fa-check"></i>&nbsp;
                                            Save
                                        </button>
                                    </div>
                                @elseif ($title == 'Edit Products')
                                    <div class="col-md-10" style="margin-right: 20px;">
                                        <a href="{{ route('users.index') }}" type="button" class="btn btn-danger">
                                            <i class="fa fa-arrow-left"></i>&nbsp;
                                            Back
                                        </a>
                                        <button type="submit" class="btn btn-primary" style="margin-left:10px;">
                                            <i class="fa fa-check"></i>&nbsp;
                                            Save
                                        </button>
                                    </div>
                                @else
                                    <div class="col-md-10" style="margin-right: 20px;">
                                        <a href="{{ route('users.index') }}" type="button" class="btn btn-danger">
                                            <i class="fa fa-arrow-left"></i>&nbsp;
                                            Back
                                        </a>
                                    </div>
                                @endif
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
