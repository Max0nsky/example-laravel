@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Статьи</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Главная</a></li>
          <li class="breadcrumb-item active">Категории</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Таблица статей</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Добавить</a>
      @if($posts->count())
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Теги</th>
            <th>Дата</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->title }}</td>
            <td>{{ $post->tags->pluck('title')->join(', ') }}</td>
            <td>{{ $post->created_at }}</td>
            <td style="width: 220px">
              <div class="row">
                <div class="col-sm-6">
                  <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-info">Изменить</a>
                </div>
                <div class="col-sm-6">
                  <form method="POST" action="{{ route('posts.destroy', ['post'=> $post->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Подтвердите удаление')">Удалить</button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      @if($posts->count())
      {{ $posts->links() }}
      @endif
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection