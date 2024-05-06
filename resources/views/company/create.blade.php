@extends('layouts.app')
@section('page_title')
    {{(!empty($page_title) && isset($page_title)) ? $page_title : ''}}
@endsection
@push('head-scripts')

@endpush
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            {{-- Start: Page Content --}}
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="card-title mb-0">{{(!empty($p_title) && isset($p_title)) ? $p_title : ''}}</h4>
                    <div class="small text-medium-emphasis">{{(!empty($p_summary) && isset($p_summary)) ? $p_summary : ''}}</div>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">

                        <a href="{{(!empty($url) && isset($url)) ? $url : ''}}" class="btn btn-sm btn-primary">{{(!empty($url_text) && isset($url_text)) ? $url_text : ''}}</a>

                </div>
            </div>
            <hr>
            {{-- Start: Form --}}
            <form method="{{$method}}" action="{{$action}}" enctype="{{$enctype}}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" onkeyup="listingslug(this.value)" placeholder="Name" value="{{old('name')}}">
                    @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                    @error('email')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Logo *</label>
                    <input type="file"
                           class="form-control rounded-0 @error('logo') is-invalid @enderror"
                           name="logo"
                           accept=".png, .jpg, .jpeg">
                    @error('logo')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-success">Submit</button>
            </form>
            {{-- End: Form --}}
            {{-- Page Description : Start --}}
            @if(!empty($p_description) && isset($p_description))
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 mb-sm-2 mb-0">
                            <p>{{(!empty($p_description) && isset($p_description)) ? $p_description : ''}}</p>
                        </div>
                    </div>
                </div>
            @endif
            {{-- Page Description : End --}}
            {{-- End: Page Content --}}
        </div>
    </div>
@endsection
@push('footer-scripts')

    {{-- Toastr : Script : Start --}}
    @if(Session::has('messages'))
        <script>
            noti({!! json_encode((Session::get('messages'))) !!});
        </script>
    @endif
    {{-- Toastr : Script : End --}}
@endpush
