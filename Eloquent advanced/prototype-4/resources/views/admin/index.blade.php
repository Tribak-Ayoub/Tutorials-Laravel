@extends('layouts.app')

@section('content')
<div class="wrapper">
  <!-- Contenu principal -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Articles</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Liste des articles</h3>
          </div>
          <!-- Table -->
          <div class="card-body">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($articles as $article)
                <tr>
                  <td>{{$article->id}}</td>
                  <td>{{$article->title}}</td>
                  <td>{{$article->content}}</td>
                  <td>
                    <a href="#" class="btn btn-info btn-sm">Voir</a>
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Pagination -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection