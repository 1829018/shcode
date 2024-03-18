@extends('Layouts.default')

@section('contents')
 <!--页面主要内容-->

      
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card bg-primary">
            <div class="card-body clearfix">
              <div class="pull-right">
                <p class="h6 text-white m-t-0">今日收入</p>
                {{-- 随机收入 --}}
                <p class="h3 text-white m-b-0 fa-1-5x">${{ rand(100,999) }},{{ rand(100,999) }},{{ rand(100,999) }}</p>
              </div>
              <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-currency-cny fa-1-5x"></i></span> </div>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-lg-3">
          <div class="card bg-danger">
            <div class="card-body clearfix">
              <div class="pull-right">
                <p class="h6 text-white m-t-0">学生总数</p>
                <p class="h3 text-white m-b-0 fa-1-5x">{{ $counts }}人</p>
              </div>
              <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-account fa-1-5x"></i></span> </div>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-lg-3">
          <div class="card bg-success">
            <div class="card-body clearfix">
              <div class="pull-right">
                <p class="h6 text-white m-t-0">完成学习总数</p>
                <p class="h3 text-white m-b-0 fa-1-5x">{{ $study_num }}次</p>
              </div>
              <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-arrow-down-bold fa-1-5x"></i></span> </div>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-lg-3">
          <div class="card bg-purple">
            <div class="card-body clearfix">
              <div class="pull-right">
                {{-- 随机一言 --}}
                <p class="h6 text-white m-t-0">新增留言</p>
                <p class="h3 text-white m-b-0 fa-1-5x">{{ rand(0,1000000) }} 条</p>
              </div>
              <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-comment-outline fa-1-5x"></i></span> </div>
            </div>
          </div>
        </div>
      </div>

      

      

@endsection