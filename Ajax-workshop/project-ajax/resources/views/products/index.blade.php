@extends('layouts.app')

@section('content')
<a id="show" href="{{route('products.create')}}">
    <button>click</button>
</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>

      </tr>
    </thead>
    <tbody>

        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
            </tr>
        @endforeach

    </tbody>
  </table>

@endsection

@section('script')
<script>
    $(document).ready(function (){
        $(document).on('click','#show', function(e){
            e.preventDefault();
            $.ajax({
                type: 'GET',
                url: $(this).attr('href'),
                success: function(res){
                    bootbox.dialog({
                        title: "Create Producte",
                        message: "<div class='createForm'></div>",

                    });
                    $('.createForm').html(res);
                }
            })
        })
    })

    $(document).on('submite','#addProduct', function(e){
        e.preventDefault();


        let formData = new FormData($('#addProduct')[0]);

        $.ajax({
            type: 'POST',
            url: "{{route('products.store')}}",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {


            }
        })
    })
</script>
@endsection