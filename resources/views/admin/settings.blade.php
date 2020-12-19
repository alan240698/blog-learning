@extends('layouts.admin', [
  'page_header' => 'Cài đặt ',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => 'active'
])
@section('content')

  @php
    $setting = $settings[0];
  @endphp
  {!! Form::model($setting, ['method' => 'PATCH', 'action' => ['SettingController@update', $setting->id], 'files' => true]) !!}
  <div class="row">
    <div class="col-md-8">
      <div class="box">
        <div class="box-body settings-block">
          <div class="form-group{{ $errors->has('welcome_txt') ? ' has-error' : '' }}">
            {!! Form::label('welcome_txt', 'Quiz name') !!}
            <p class="label-desc">Nhập tên hệ thống trắc nghiệm của bạn</p>
            {!! Form::text('welcome_txt', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('welcome_txt') }}</small>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                {!! Form::label('logo', 'Logo Quiz') !!}
                <p class="label-desc">Chọn ảnh logo</p>
                {!! Form::file('logo') !!}
                <small class="text-danger">{{ $errors->first('logo') }}</small>
              </div>
              <div class="logo-block">
                <img src="{{asset('/images/logo/'. $setting->logo)}}" class="img-responsive"  alt="{{$setting->welcome_txt}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('favicon') ? ' has-error' : '' }}">
                {!! Form::label('favicon', 'Favicon') !!}
                <p class="label-desc">Chọn favicon</p>
                {!! Form::file('favicon') !!}
                <small class="text-danger">{{ $errors->first('favicon') }}</small>
              </div>
            </div>

            <div class="col-md-6">
               <div class="form-group{{ $errors->has('w_email') ? ' has-error' : '' }}">
                  {!! Form::label('w_email', 'Default Email') !!}
                   <p class="label-desc">Nhập địa chỉ email mặc định</p>
                  {!! Form::email('w_email', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com','required']) !!}
                  <small class="text-danger">{{ $errors->first('w_email') }}</small>
              </div>
            </div>
           
             <div class="col-md-6">
                <div class="form-group">
                   <label for="status">Right Click Disable:</label>
                    <input {{ $setting->right_setting == 1 ? "checked" : "" }} type="checkbox" class="toggle-input" name="rightclick" id="rightclick">
                    <label for="rightclick"></label>
                  </div>
               </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="status">Inspect Element Disable:</label>
                    <input {{ $setting->element_setting == 1 ? "checked" : "" }} type="checkbox" class="toggle-input" name="inspect" id="inspect">
                    <label for="inspect"></label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
               <label for="">Người dùng có thể làm lại bài kiểm tra?</label>
                <select name="userquiz" id="userquiz">
                       <option @if($setting->userquiz == 1) selected @endif value="1">Yes</option>
                       <option @if($setting->userquiz == 0) selected @endif value="0">No</option>
                </select>
             </div>
            </div>            
          </div>

          
          {!! Form::submit("Lưu lại", ['class' => 'btn btn-wave btn-block']) !!}
        </div>
       
       
      </div>
    </div>
  </div>
  {!! Form::close() !!}

@endsection
