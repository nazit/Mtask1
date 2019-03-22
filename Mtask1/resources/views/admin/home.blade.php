@extends('admin.index')
@section('content')
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>99</h3>

            <p>News Count</p>
          </div>
          <div class="icon">
            <i class="fa fa-file"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>99<sup style="font-size: 20px"></sup></h3>

            <p>Categories Count</p>
          </div>
          <div class="icon">
            <i class="fa fa-list"></i>
           
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      
    </div>
    

  </section>
@endsection