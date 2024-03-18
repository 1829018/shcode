@extends('Layouts.default')

@section('title','删除学生页面')
@section('contents')

<div class="card">

<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>备注</th>
          <th>昵称</th>
          <th>编号</th>
          <th>操作</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($data as $da )
        <tr>
            @csrf
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $da['student'] }}</td>
          <td>{{ $da['name'] }}</td>
          <td>{{ $da['number'] }}</td>
          <td><button class="btn btn-label btn-danger"><label><i class="mdi mdi-close"></i></label> 删除</button></td>
        </tr>

@endforeach
        
      </tbody>
    </table>
  </div>
</div>   
@endsection

@section('scripts')
    <script src="/shcode/js/del.js"></script>
@endsection