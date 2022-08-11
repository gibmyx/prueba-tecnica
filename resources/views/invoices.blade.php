@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listar facturas</div>

                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="20%">Codigo</th>
                                <th width="20%">Cliente</th>
                                <th width="20%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td><strong>{{$invoice['code']}}</strong></td>
                                    <td>{{$invoice['user']['name']}}</td>
                                    <td>
                                        <a href="/invoice/edit/{{$invoice['id']}}" class="btn-group"><button class="btn btn-primary">Ver detalle de la factura</button></a>
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
