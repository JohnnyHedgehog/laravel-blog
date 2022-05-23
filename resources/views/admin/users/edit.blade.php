@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Редактирование пользователя</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
            <li class="breadcrumb-item active">{{$user->name}}</li>
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
        <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="w25 ml-2">
          @csrf
          @method('PATCH')
          <label for="inputText">Имя пользователя</label>
          <input type="text" name="name" class="form-control" id="inputText" placeholder="Имя пользователя"
            value="{{$user->name}}">
          @error('name')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <label for="inputText">Email</label>
          <input type="text" name="email" class="form-control" id="inputText" placeholder="E-mail"
            value="{{$user->email}}">
          @error('email')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label>Выберите тип пользователя</label>
            <select class="form-control w-75" name="role">
              @foreach($roles as $id => $role )
              <option value="{{$id}}" {{ $id==$user->role ? 'selected' : '' }}>{{$role}}</option>
              @endforeach
            </select>
            @error('role')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
          </div>
          <input type="submit" class="btn btn-primary mt-2" value="Обновить">
        </form>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection