@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="/product/create" class="btn btn-primary">Crear</a>
                        Lista de productos
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="20%">Nombre</th>
                                <th width="20%">Precio</th>
                                <th width="20%">Impuesto</th>
                                <th width="20%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td><strong>{{$product['name']}}</strong></td>
                                    <td>{{$product['price']}}</td>
                                    <td>{{$product['tax']}}%</td>
                                    <td>
                                        <a href="/product/edit/{{$product['id']}}" class="btn-group"><button class="btn btn-primary">Editar</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
