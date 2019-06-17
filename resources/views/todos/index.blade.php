
@extends('layouts.app')

@section('title')
Lista de tarefas
@endsection

@section('content')

  <h1 class="text-center my-3"><strong>Lista de tarefas</strong></h1>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-default">
        <div class="card-header">
          Tarefas
        </div>
        <div class="card-body">
            @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
          @endif

          <ul class="list-group">
            @foreach($todos as $todo)
              <li class="list-group-item">
               
                
                <div class="tarefa-item">
                    <div class="tarefa-texto">
                      {{ $todo->name }}
                    </div>

                    <div class="tarefa-delete">
                      <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger btn-sm float-right mr-2">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </div>

                    <a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-right mr-2">
                      <i class="fas fa-binoculars"></i>
                    </a>
                   
                    @if(!$todo->completed)
                      <a href="/todos/{{ $todo->id }}/complete" style="color: white;" class="btn btn-warning btn-sm float-right mr-2">
                        <i class="fas fa-check-circle"></i>
                      </a>
                    @endif
                    
              
                  </div>
             
                
            
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>    
  </div>
<br>
  <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header">
            Criar tarefa
          </div>
          <div class="card-body">
              @if($errors->any())
              <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                      <li class="list-group-item">
                        {{ $error }}
                      </li>
                    @endforeach
                </ul>
              </div>
            @endif
              <form action="/store-todos" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Name" name="name">
                </div>
                <div class="form-group">
                  <textarea name="description" placeholder="Description" cols="3" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-success"><strong>Criar Tarefa</strong></button>
                </div>
              </form>
          </div>
        </div>
      </div>    
    </div>
    <br>
@endsection
