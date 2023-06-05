@extends('layouts.plantilla-admin')

@section('title', 'Usuarios')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center display-4">Post</h3> 
        </div>
    </div> 
    {{--  tabla   --}}
    <div class="row mt-5 mb-5">
        <div class="col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-footer">
                    <div class="w-100 table-responsive">
                            <table class= "table table-striped table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th><button type="button" class="btn w-100 btn-info btn-sm" data-toggle="modal" data-target="#modalCrearCliente"><i class="fas fa-plus"></i></button></th>
                                        <th colspan="11">
                                            <form method="POST" action="{{route('postfiltroname')}}">
                                                @csrf
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" placeholder="Ingrese titulo del post" name="title" autocomplete="off" id="nameFiltro">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <a href="#" class="btn btn-primary" type="button" onclick="$('#nameFiltro').val('')"><i class="fas fa-eraser"></i></a>
                                                    </div>
                                                </div> 
                                            </form>                                        
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Categoria</th>
                                        <th class="text-center">Titulo</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Autor</th>
                                        <th class="text-center">Fecha Creacion</th>
                                        <th class="text-center">Fecha Actualizacion</th>
                                        <th class="text-center">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                        @forelse($post as $usu)
                                    <tr>
                                        <td class="text-center">{{$usu->id}}</td>
                                        @if ($usu->CATEGORIA != null)
                                        <td class="text-center">{{$usu->CATEGORIA->name}}</td>
                                        @else
                                        <td></td>
                                        @endif
                                        <td class="text-center">{{$usu->title}}</td>
                                        <td class="text-center">{{$usu->body}}</td>
                                        <td class="text-center">{{$usu->author}}</td>
                                        <td class="text-center">{{$usu->created_at}}</td>
                                        <td class="text-center">{{$usu->updated_at}}</td>
                                        <td class="d-flex justify-content-center">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal1{{$usu->id}}"><i class="fas fa-user-edit"></i></button>
                                                <form action="{{ route('post.destroy',$usu->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                            </div>
                                        </td>
                                        {{--  editar   --}}
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{--  <!-- Modal -->  --}}
                                                    <div class="modal fade" id="myModal1{{$usu->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        {{--  <!-- Modal content-->  --}}
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar Post</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                                <form class="col-12" method="POST" action="{{route('postactualizar')}}">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <input value="{{$usu->id}}" type="hidden" class="form-control" name="id">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="category_id">Categoria</label>
                                                                        <select class="custom-select" name="category_id" id="category_id">
                                                                            <option value="" selected disabled>Seleccione una opción...</option>
                                                                            @php
                                                                            $dduuee = App\Models\Category::all();
                                                                            @endphp   
                                                                            @foreach($dduuee as $ddd)
                                                                            <option value="{{ $ddd->id }}"  @if($ddd->id == $usu->category_id ) selected @endif>{{ $ddd->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Titulo</label>
                                                                        <input type="text" class="form-control" name="title" value="{{$usu->title}}" aria-describedby="emailHelp">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Desripcion</label>
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3" required>{{$usu->body}}</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Autor</label>
                                                                        <input type="text" class="form-control" name="author" value="{{$usu->author}}" aria-describedby="emailHelp">
                                                                    </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Editar Post</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--  editar   --}}
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="11" class="text-center">No hay registros</td>
                                    </tr>
                        @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="11">
                                            @if($post != null)
                                                {{$post->links()}}
                                                {{--  {{$clientes->appends(['busqueda'=>$busqueda])}}  --}}
                                            @endif
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   {{--  tabla   --}}

    {{--  <!-- Modal -->  --}}
    <div class="modal fade" id="modalCrearCliente" role="dialog">
        <div class="modal-dialog">
                {{--  <!-- Modal content-->  --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Post</h4>
                    </div>
                    <div class="modal-body">
                            <form class="col-12" method="POST"  action="{{route('post.insertar')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="category_id">Dueño</label>
                                    <select class="custom-select" name="category_id" id="category_id">
                                        <option value="" selected disabled>Seleccione una opción...</option>
                                        @php
                                        $cate = App\Models\Category::all();
                                        @endphp   
                                        @foreach($cate as $du)
                                        <option value="{{ $du->id }}">{{ $du->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo</label>
                                    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Ingresar nombre completo" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descripcion</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Autor</label>
                                    <input type="text" class="form-control" name="author" aria-describedby="emailHelp" placeholder="Ingrese direccion" required>
                                </div>
                    </div>
                    <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Registrar post</button>
                            </form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection