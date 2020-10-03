@extends('layouts.app')
@section('main-panel')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Editeaza produsul : <span class="text-info">{{$product['name']}}</span>
                    </h3>
                    <h4>Detalii produs:</h4>
                    <form action="">
                        <div class="row">
                            <div class="col-3">
                                <input type="text" class="form-control" value="{{$product->id}}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" value="{{$product->name}}">
                            </div>
                            <div class="col-3">

                            </div>
                            <div class="col-3">

                            </div>
                            <div class="col-3">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
