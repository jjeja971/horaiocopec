<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



@extends('layout')
@section('content')
<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Bootstrap Duallistbox</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label>Multiple</label>
            <select class="duallistbox"  multiple="multiple">
              <option selected>Alabama</option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>

  </div>

@endsection



<script>
    window.onload = (function () {
  
      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()
  
    })
  </script>