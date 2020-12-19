@extends('layouts.app')

@section('head')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script>
    window.Laravel =  <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
  </script>
@endsection

@section('content')
<div class="">
  <div class="container">
    <div class="login-page">
      <div class="logo">
        @if ($setting)
          <a href="{{url('/')}}" title="{{$setting->welcome_txt}}"><img src="{{asset('/images/logo/'.$setting->logo)}}" class="img-responsive login-logo" width="100" alt="{{$setting->welcome_txt}}"></a>
        @endif
      </div>
      <h3 class="user-register-heading text-center">Đăng ký</h3>
      <form class="form login-form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::label('name', 'Name') !!}
          {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập tên người dùng']) !!}
          <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          {!! Form::label('email', 'Email address') !!}
          {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: ctu@gmail.com']) !!}
          <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>
        <!-- <div class="form-group{{ $errors->has('Hinh') ? ' has-error' : '' }}">
          {!! Form::label('Avartar', 'ảnh') !!}
          {!! Form::file('Hinh',['class' => 'form-control', 'enctype' => 'multipart/form-data', 'placeholder' => 'png/jpg']) !!}
          <small class="text-danger">{{ $errors->first('Hinh') }}</small>
        </div> -->
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          {!! Form::label('password', 'Password') !!}
          {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Nhập Password']) !!}
          <small class="text-danger" style="color: red; background-color: #FFF;">{{ $errors->first('password') }}</small>
        </div>
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
          {!! Form::label('password_confirmation', 'Confirm Password') !!}
          {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Xác nhận mật khẩu']) !!}
          <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
        </div>
        <div class="mr-t-20">
          <button type="submit" class="btn btn-wave">Tạo tài khoản</button>
          <a href="{{url('/login')}}" class="text-center btn-block" title="Bạn đã có tài khoản?">Bạn đã có tài khoản ?</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
