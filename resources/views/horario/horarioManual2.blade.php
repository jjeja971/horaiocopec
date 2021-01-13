<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



@extends('layout')
@section('content')

  <form id="demoform" action="#" method="post">
    <select multiple="multiple" size="10" name="duallistbox_demo1[]" title="duallistbox_demo1[]">
      @foreach ($atendedor as $item)
              <option value="{{$item->nombre_atendedor}}" name="{{$item->nombre_atendedor}}">{{$item->nombre_atendedor}}</option>
              @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-default btn-block">Submit data</button>
  </form>
  
  

@endsection


<script>
    window.onload = (function () {
  
      var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
  $("#demoform").submit(function() {
    alert($('[name="duallistbox_demo1[]"]').val());

    return false;
  });
  
    })
  </script>