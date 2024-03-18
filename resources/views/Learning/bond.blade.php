@extends('Layouts.default')

@section('title','一键青年大学习')
@section('contents')
    
<div class="col-md-12">

    <div class="card">
        <div class="card-header"><h4>一键大学习</h4></div>
        <div class="card-body">
          
          <form>
            @csrf
            <div class="form-group">
              <button class="btn btn-primary" type="submit">一键大学习</button>
            </div>
          </form>
          
        </div>
      </div>


</div>




<div class="col-md-12">

    <div class="card">
        <div class="card-header"><h4>学习详情</h4></div>
        <div class="card-body">
          <div class="list-group">
            
          </div>
        </div>
      </div>

</div>















@endsection

@section('scripts')

<script src="/shcode/js/one.js"></script>
    
@endsection