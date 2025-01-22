<form action="{{route('products.store')}}" method="POST" id="addProduct">
    @csrf
    <div class="form-group py-3">
      <label for="exampleInputEmail1">product name</label>
      <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter product name" name="name">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>