@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar de productos</div>

                    <div class="card-body">
                        <form action="{{ route('products.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$product['name']}}"/>
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$product['id']}}"/>
                            </div>

                            <div class="mb-3">
                                <label for="prince">Precio</label>
                                <input type="number" id="prince" name="prince" placeholder="Precio" class="form-control" value="{{$product['price']}}"/>
                            </div>

                            <div class="mb-3">
                                <label for="tax">Impuesto</label>
                                <input type="number" class="form-control" id="tax" name="tax" value="{{$product['tax']}}"/>
                            </div>

                            <div class="btn-group">
                                <a href="{{ route('products.list') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
