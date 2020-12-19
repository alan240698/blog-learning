@extends('layouts.admin', [
  'page_header' => 'Quiz',
  'dash' => '',
  'quiz' => 'active',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => ''
])

@section('content')
  <div class="margin-bottom">
    <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#createModal">Add Quiz</button>
  </div>
  <!-- Create Modal -->
  <div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Quiz</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'TopicController@store']) !!}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                  {!! Form::label('title', 'Tiêu đề') !!}
                  <span class="required">*</span>
                  {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Nhập tiêu đề', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
                <div class="form-group{{ $errors->has('per_q_mark') ? ' has-error' : '' }}">
                  {!! Form::label('per_q_mark', 'Điểm số một câu hỏi') !!}
                  <span class="required">*</span>
                  {!! Form::number('per_q_mark', null, ['class' => 'form-control', 'placeholder' => 'Nhập điểm của câu hỏi', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('per_q_mark') }}</small>
                </div>
                <div class="form-group{{ $errors->has('timer') ? ' has-error' : '' }}">
                  {!! Form::label('timer', 'Thời gian (phút)') !!}
                  {!! Form::number('timer', null, ['class' => 'form-control', 'placeholder' => 'Nhập tổng thời gian (phút)']) !!}
                  <small class="text-danger">{{ $errors->first('timer') }}</small>
                </div>

               
                <br>






              <div class="form-group {{ $errors->has('show_ans') ? ' has-error' : '' }}">
                  <label for="">Hiển thị đáp án: </label>
                 <input type="checkbox" class="toggle-input" name="show_ans" id="toggle2">
                 <label for="toggle2"></label>
                <br>
              </div>
                
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                  {!! Form::label('description', 'Mô tả') !!}
                  {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Nhập mô tả', 'rows' => '8']) !!}
                  <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {!! Form::reset("Reset", ['class' => 'btn btn-default']) !!}
              {!! Form::submit("Add", ['class' => 'btn btn-wave']) !!}
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <div class="box">
    <div class="box-body table-responsive">
      <table id="search" class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Mô tả</th>
            <th>Điểm câu hỏi</th>
            <th>Thời gian</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          @if ($topics)
            @php($i = 1)
            @foreach ($topics as $topic)
              <tr>
                <td>
                  {{$i}}
                  @php($i++)
                </td>
                <td>{{$topic->title}}</td>
                <td title="{{$topic->description}}">{{str_limit($topic->description, 50)}}</td>
                <td>{{$topic->per_q_mark}}</td>
                <td>{{$topic->timer}} mins</td>
                <td>
                  <!-- Edit Button -->
                  <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$topic->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                  <!-- Delete Button -->
                  <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$topic->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                  <div id="{{$topic->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                    <!-- Delete Modal -->
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <div class="delete-icon"></div>
                        </div>
                        <div class="modal-body text-center">
                          <h4 class="modal-heading">Are You Sure ?</h4>
                          <p>Bạn có thật sự muốn xóa?</p>
                        </div>
                        <div class="modal-footer">
                          {!! Form::open(['method' => 'DELETE', 'action' => ['TopicController@destroy', $topic->id]]) !!}
                            {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                            {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <!-- edit model -->
              <div id="{{$topic->id}}EditModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit Quiz</h4>
                    </div>
                    {!! Form::model($topic, ['method' => 'PATCH', 'action' => ['TopicController@update', $topic->id]]) !!}
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              {!! Form::label('title', 'Tiêu đề') !!}
                              <span class="required">*</span>
                              {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Nhập tiêu đề', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('title') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('per_q_mark') ? ' has-error' : '' }}">
                              {!! Form::label('per_q_mark', 'Điểm số của một câu hỏi') !!}
                              <span class="required">*</span>
                              {!! Form::number('per_q_mark', null, ['class' => 'form-control', 'placeholder' => 'Nhập điểm số cho một câu hỏi', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('per_q_mark') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('timer') ? ' has-error' : '' }}">
                              {!! Form::label('timer', 'Thời gian (phút)') !!}
                              {!! Form::number('timer', null, ['class' => 'form-control', 'placeholder' => 'Nhập tổng thời gian (phút)']) !!}
                              <small class="text-danger">{{ $errors->first('timer') }}</small>
                            </div>

                             
                           <label for="">Hiển thị đáp án: </label>
                           <input {{ $topic->show_ans ==1 ? "checked" : "" }} type="checkbox" class="toggle-input" name="show_ans" id="toggle{{ $topic->id }}">
                           <label for="toggle{{ $topic->id }}"></label>
                          
                           
                          
                        </div>
               
                             
                            </div>
                            <div class="row">
                          <div class="col-md-6">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                              {!! Form::label('description', 'Mô tả') !!}
                              {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Nhập mô tả']) !!}
                              <small class="text-danger">{{ $errors->first('description') }}</small>
                            </div>
                          </div>
                        </div>
                        </div>

                        
                
                      <div class="modal-footer">
                        <div class="btn-group pull-right">
                          {!! Form::submit("Cập nhật", ['class' => 'btn btn-wave']) !!}
                        </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript">
  
 
  $(function() {
    $('#fb_check').change(function() {
      $('#fb').val(+ $(this).prop('checked'))
    })
  })

 
                  
                    $(document).ready(function(){

                        $('.quizfp').change(function(){

                          if ($('.quizfp').is(':checked')){
                              $('#doabox').show('fast');
                          }else{
                              $('#doabox').hide('fast');
                          }

                         
                        });

                    });
                                

                               
  $('#priceCheck').change(function(){
    alert('hi');
  });

  function showprice(id)
  {
    if ($('#toggle2'+id).is(':checked')){
      $('#doabox2'+id).show('fast');
    }else{

      $('#doabox2'+id).hide('fast');
    }
  }
                                   

  

</script>



@endsection

