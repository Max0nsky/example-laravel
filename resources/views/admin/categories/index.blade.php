@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Категории</h1>
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
        <h3 class="card-title">Таблица категорий</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Добавить</a>
        @if($categories->count())
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Название</th>
              <th>URL</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->title }}</td>
              <td>{{ $category->slug }}</td>
              <td style="width: 220px">
                <div class="row">
                  <div class="col-sm-6">
                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-info">Изменить</a>
                  </div>
                  <div class="col-sm-6">
                    <form action="{{ route('categories.destroy', ['category'=> $category->id]) }}">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-danger" onclick="return confirf('Подтвердите удаление')">Удалить</button>
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
        {{ $categories->link() }}
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@endsection