@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Добавление пользователя</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <form action="{{ route('admin.user.store') }}" method="POST" class="w25 ml-2">
          @csrf
          <label for="inputText">Имя пользователя</label>
          <input type="text" name="name" class="form-control" id="inputText" placeholder="Имя пользователя">
          @error('name')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <label for="inputText">Email</label>
          <input type="text" name="email" class="form-control" id="inputText" placeholder="E-mail">
          @error('email')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <label for="inputText">Пароль</label>
          <input type="text" name="password" class="form-control" id="inputText" placeholder="Пароль">
          @error('password')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label>Выберите тип пользователя</label>
            <select class="form-control w-75" name="role">
              @foreach($roles as $id => $role )
              <option value="{{$id}}" {{ $id==old('role') ? 'selected' : '' }}>{{$role}}</option>
              @endforeach
            </select>
            @error('role')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <input type="submit" class="btn btn-primary mt-2" value="Добавить">
        </form>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection