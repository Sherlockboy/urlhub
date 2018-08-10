@extends('layouts.home')

@section('content')
<div class="container home">
  <div class="row justify-content-md-center mt-5">
    <h1 class="col-lg-8 text-center d-block"><mark>We will provide a shortened link for the page you're on.</mark></h1>
  </div>

  <div class="row mt-5 justify-content-md-center">
    <div class="col-lg-7">
      <form action="{{ url('/create') }}" method="post" class="mt-5">
      @csrf
        <div class="input-group input-group-lg">
          <input name="long_url" placeholder="Paste a link to be shortened" class="form-control" id="inputSourceLink" type="text">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="actProcess">Shorten</button>
          </div>
        </div>

        <br>
        Custom URL (optional) <br>
        <h2 class="site-url-field" style="display: inline;">{{$_SERVER['SERVER_NAME']}}/</h2>
        <input class="form-control custom-url-field" name="short_url_custom" type="text" style="display: inline; width: auto;">
      </form>

      @if ($errors->has('long_url'))
      <div class="alert alert-warning mt-3" role="alert">
        {{ $errors->first('long_url') }}
      </div>
      @endif

      @if (session('cst_exist'))
      <div class="alert alert-warning mt-3" role="alert">
        {{ session('cst_exist') }}
      </div>
      @endif

      {{-- @if (session('msgDomainBlocked'))
      <div class="alert alert-warning mt-3" role="alert">
        {{ session('msgDomainBlocked') }}
      </div>
      @endif --}}

    </div>
  </div>
</div>
@endsection
