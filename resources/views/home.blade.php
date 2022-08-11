@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista de productos</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table className="table table-bordered">
                            <thead>
                            <tr>
                                <th width="20%">Nombre</th>
                                <th width="20%">Precio</th>
                                <th width="20%">Cantidad</th>
                                <th width="20%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td><strong>{{$product['name']}}</strong></td>
                                    <td>{{$product['price']}}</td>
                                    <td>
                                        <input type="number" placeholder="Cantidad" class="form-control" value="0" id="count-{{$product['id']}}"/>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-id="{{$product['id']}}" class="btn btn-primary purchase-product">Comprar</button>
                                        </div>
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
