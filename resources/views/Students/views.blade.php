@extends('Layouts.default')
@section('title','查看学生页面')
@section('contents')


        
        
        <div class="row">

          {{-- {{ $data }} --}}
  
            {{-- @for ($i = 0; $i <100; $i++) --}}
            @foreach ($data as $da )
            
           
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="card-header bg-primary">
                <h4>学生信息：</h4>
                <ul class="card-actions">
                  <li>
                    <button type="button"><i class="mdi mdi-more"></i></button>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <p>姓名：{{ $da['student'] }}</p>
                <p>编号：{{ $da['number'] }}</p>

                <p>一言：<?php
                  $d = file_get_contents('https://api.shserve.cn/api/yiyan?code=json');
                  $j = json_decode($d, true);
                  $output = mb_substr($j['msg'], 0, 20, 'UTF-8');
  
                  // 添加省略号
                  if (mb_strlen($j['msg'], 'UTF-8') > 15) {
                      $output .= '...';
                  }
  
                  
                  echo $output;
                  ?></p>

              </div>
            </div>

          </div>
          @endforeach


{{-- @endfor --}}


        </div>


          




    
@endsection