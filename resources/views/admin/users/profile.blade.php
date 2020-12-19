<style type="text/css">
  .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}
</style>
@extends('layouts.admin', [
  'page_header' => 'Thông tin tài khoản',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => ''
])
@section('content')
  @if ($auth)
    @if ($auth->role == 'A')
      <div class="box">
        <div class="box-body">
          {!! Form::model($auth, ['method' => 'PATCH', 'action' => ['UsersController@update', $auth->id]]) !!}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('name', 'Tên') !!}
                  <span class="required">*</span>
                  {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập họ tên']) !!}
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  {!! Form::label('email', 'Email') !!}
                  <span class="required">*</span>
                  {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: info@gmail.com', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  {!! Form::label('password', 'Mật khẩu') !!}
                  <span class="required">*</span>
                  {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Nhập mật khẩu mới','id'=>'password-field']) !!}
                  <small class="text-danger">{{ $errors->first('password') }}</small>
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                  {!! Form::label('role', 'Quyền người dùng') !!}
                  <span class="required">*</span>
                  {!! Form::select('role', ['S' => 'Sinh viên', 'A'=>'Admin'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('role') }}</small>
                </div>
              </div>
              <div class="col-md-6 margin-bottom">
                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                  {!! Form::label('mobile', 'SĐT') !!}
                  {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'eg: +84 ***********']) !!}
                  <small class="text-danger">{{ $errors->first('mobile') }}</small>
                </div>
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                  {!! Form::label('city', 'Thành phố') !!}
                  {!! Form::text('city', null, ['class' => 'form-control', 'placeholder'=>'Nhập thành phố']) !!}
                  <small class="text-danger">{{ $errors->first('city') }}</small>
                </div>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                  {!! Form::label('address', 'Địa chỉ') !!}
                  {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'placeholder' => 'Nhập địa chỉ cụ thể']) !!}
                  <small class="text-danger">{{ $errors->first('address') }}</small>
                </div>
              </div>
              <div class="col-md-offset-3 col-md-6">
                {!! Form::submit('Cập nhật', ['class' => 'btn btn-wave btn-block']) !!}
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    @elseif ($auth->role == 'S')
      <div class="box">
        <div class="box-body">
          {!! Form::model($auth, ['method' => 'PATCH', 'action' => ['UsersController@update', $auth->id]]) !!}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('name', 'Tên') !!}
                  {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập họ tên']) !!}
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  {!! Form::label('email', 'Email') !!}
                  {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: info@gmail.com', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>


                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  {!! Form::label('password', 'Mật khẩu') !!}
                  {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Nhập mật khẩu mới','id'=>'password-field']) !!}
                  <small class="text-danger">{{ $errors->first('password') }}</small>
                   <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>


                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                  {!! Form::label('mobile', 'SĐT') !!}
                  {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'eg: +84 ***********']) !!}
                  <small class="text-danger">{{ $errors->first('mobile') }}</small>
                </div>
              </div>
              <div class="col-md-6 margin-bottom">
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                  {!! Form::label('city', 'Thành phố') !!}
                  {!! Form::text('city', null, ['class' => 'form-control', 'placeholder'=>'Nhập thành phố']) !!}
                  <small class="text-danger">{{ $errors->first('city') }}</small>
                </div>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                  {!! Form::label('address', 'Địa chỉ') !!}
                  {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'8', 'placeholder' => 'Nhập địa chỉ cụ thể']) !!}
                  <small class="text-danger">{{ $errors->first('address') }}</small>
                </div>
              </div>
              <div class="col-md-offset-3 col-md-6">
                {!! Form::submit('Cập nhật', ['class' => 'btn btn-wave btn-block']) !!}
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    @endif
  @endif
@endsection
@section('scripts')
<script type="text/javascript">
  
  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

</script>

@endsection
