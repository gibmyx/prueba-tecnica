@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>FACTURA: {{$invoice['code']}}</strong></div>
                    <div class="card-body">

                        <h3>Cliente: <strong>{{$invoice['user']['name']}}</strong></h3>

                        <h5>Total Facturado: <strong> {{$invoice['total_invoice']}}$ </strong></h5>
                        <h5>Total Impuesto: <strong> {{$invoice['total_tax']}}%
                                ({{  ((float) $invoice['total_invoice'] / 100) * $invoice['total_tax'] }}$)</strong>
                        </h5>

                        <h3>Productos</h3>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="20%">Nombre</th>
                                <th width="20%">Precio</th>
                                <th width="20%">Impuesto</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoice['purchase'] as $purchase)
                                <tr>
                                    <td><strong>{{$purchase['product']['name']}}</strong></td>
                                    <td>{{$purchase['price']}}$</td>
                                    <td>{{$purchase['tax']}}% ({{  ((float) $purchase['price'] / 100) * $purchase['tax'] }}$)</td>
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
