@extends('layouts.admin', [
  'page_header' => "Top Sinh viên / {$topic->title}",
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => 'active',
  'sett' => ''
])

@section('content')
  <div class="content-block box">
    <div class="box-body table-responsive">
      <table id="topTable" class="table table-striped">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>SĐT</th>            
            <th>Chủ đề</th>
            <th>Điểm</th>
            <th>Tổng điểm</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          @if ($answers)
            @foreach ($filtStudents as $key => $student)
              <tr>
                <td>
                  {{$key+1}}
                </td>
                <td>{{$student->name}}</td>
                <td>{{$student->mobile}}</td>               
                <td>{{$topic->title}}</td>
                <td>
                  @php
                    $mark = 0;
                    $correct = collect();
                  @endphp
                  @foreach ($answers as $answer)
                    @if ($answer->user_id == $student->id && $answer->answer == $answer->user_answer)
                      @php
                       $mark++;
                      @endphp
                    @endif
                  @endforeach
                  @php
                    $correct = $mark*$topic->per_q_mark;
                  @endphp
                  {{$correct}}
                </td>
                <td>
                  {{$c_que*$topic->per_q_mark}}
                </td>
                <td>
                  <a data-toggle="modal" data-target="#delete{{ $topic->id }}" title="Xóa câu trả lời từ sinh viên" href="#" class="btn btn-sm btn-warning">
                    Reset Response
                  </a>

                  <div id="delete{{ $topic->id }}" class="delete-modal modal fade" role="dialog">
                      <!-- Delete Modal -->
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                            <h4 class="modal-heading">Are You Sure ?</h4>
                            <p>Bạn có chắc chắn muốn xóa bản ghi này?</p>
                          </div>
                          <div class="modal-footer">
                            {!! Form::open(['method' => 'DELETE', 'action' => ['AllReportController@delete', 'topicid' => $topic->id, 'userid' => $student->id] ]) !!}
                                {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                                {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </div>
                    </div>

                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
