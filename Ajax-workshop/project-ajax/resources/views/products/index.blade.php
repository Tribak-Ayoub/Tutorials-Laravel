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

    $(document).on('submit','#addProduct', function(e) {
    e.preventDefault();

    let formData = new FormData($('#addProduct')[0]);

    $.ajax({
        type: 'POST',
        url: "{{ route('products.store') }}",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            // Assuming the response includes the newly created product's data
            // For example: res contains the product id and name in JSON format

            if(res.success) {
                // Append the new product to the table dynamically
                $('table tbody').append(`
                    <tr>
                        <td>${res.product.id}</td>
                        <td>${res.product.name}</td>
                    </tr>
                `);

                // Optionally close the modal after a successful submission
                bootbox.hideAll();

                // Optionally reset the form if needed
                $('#addProduct')[0].reset();
            } else {
                // Handle validation errors or failure (based on your response)
                alert('Error: ' + res.message);
            }
        },
        error: function(xhr, status, error) {
            // Handle any AJAX errors
            alert('Request failed: ' + error);
        }
     });
});

</script>
@endsection