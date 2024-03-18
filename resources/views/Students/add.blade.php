@extends('Layouts.default')

@section('title','添加学生页面')
@section('contents')


<div class="card">



    <div class="card-header"><h4>添加学生表单</h4></div>
    <div class="card-body">
      
      <form class="form-horizontal" id="add-student" >
        @csrf
        <div class="form-group">
          <label class="col-md-3 control-label" for="example-hf-email">学生备注：</label>
          <div class="col-md-7">
            <input class="form-control" type="text" id="example-hf-email" name="example-hf-student" placeholder="请输入备注..">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label" for="example-hf-number">学生编号：</label>
          <div class="col-md-7">
            <input class="form-control" type="text" id="example-hf-number" name="example-hf-number" placeholder="请输入编号..">
          </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-name">学生昵称：</label>
            <div class="col-md-7">
              <input class="form-control" type="text" id="example-hf-password" name="example-hf-name" placeholder="请输入昵称..">
            </div>
          </div>

        <div class="form-group">
          <div class="col-md-9 col-md-offset-3">
            <button class="btn btn-primary" type="submit">添加</button>
          </div>
        </div>
      </form>
      
    </div>
  </div>


@endsection

@section('scripts')

<script src="/shcode/js/add.js"></script>
@endsection