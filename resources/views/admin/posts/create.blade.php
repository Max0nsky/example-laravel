@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Создание статьи</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Главная</a></li>
          <li class="breadcrumb-item active">Статьи</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Создание статьи</h3>
          </div>

          <form role="form" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="title">Название</label>
                <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Название">
              </div>
              <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control @error('description') is-invalid @enderror" rows="4" name="description" placeholder="Краткое описание"></textarea>
              </div>
              <div class="form-group">
                <label for="content">Контент</label>
                <textarea class="form-control @error('content') is-invalid @enderror" rows="4" name="content" placeholder="Контент статьи"></textarea>
              </div>
              <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                  @foreach($categories as $key => $value)
                    <option value={{$key}}>{{$value}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="tags">Теги</label>
                <select class="select2" multiple="multiple" name="tags[]" id="tags" data-placeholder="Выбор тегов" style="width: 100%;">
                  @foreach($tags as $key => $value)
                    <option value={{$key}}>{{$value}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
              <label for="thumbnail">Фото</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                  <label class="custom-file-label" for="thumbnail">Вабрать файл</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Загрузить</span>
                </div>
              </div>
            </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection