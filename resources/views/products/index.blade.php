@extends('layouts.app')
@section('main-panel')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Listă de Produse</h2>
                    <p>Lista cu stocul curent de produse</p>
                    <div class="row">
                        <div class="col-2">
                            <button class="btn btn-info" id="showAddProd"><i class="now-ui-icons design_app"></i> Adaugă </button>
                        </div>
                        <div class="col-12">
                            @include('components.errors')
                        </div>
                    </div>
                </div>
                <div class="card-body" id="prodContainer">
                    <form class="form" id="addProd" method="POST" action="{{route('add_product')}}" style="display:none">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Denumire Produs / Serviciu">
                                </div>
                            </div>
                            <div class="col-md-1 col-6">
                                <div class="form-group">
                                    <input type="text" name="sku" id="sku" class="form-control" placeholder="COD Produs">
                                </div>
                            </div>
                            <div class="col-md-1 col-6">
                                <div class="form-group">
                                    <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Cantitate">
                                </div>
                            </div>
                            <div class="col-md-1 col-6">
                                <div class="form-group">
                                    <select name="um" id="um" class="form-control">
                                        @foreach($data->units as $un)
                                            <option value="{{$un->name}}">{{$un->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 col-6">
                                <div class="form-group">
                                    <input type="text" name="price" id="price" class="form-control" placeholder="Pret">
                                </div>
                            </div>
                            <div class="col-md-1 col-6">
                                <div class="form-group">
                                    <button style="margin:0!important;" class="btn btn-success"><i class="now-ui-icons ui-1_simple-add"></i> Adauga</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <table class="table table-striped mt-5">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Denumire Articol / Serviciu</th>
                            <th scope="col">Cod</th>
                            <th scope="col">Cantitate</th>
                            <th scope="col">UM</th>
                            <th scope="col">Pret Unitar</th>
                            <th scope="col">Valoare Stoc</th>
                            <th scope="col">Actiuni</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data->products as $prod)
                            <tr>
                                <th scope="row">{{$prod->id}}</th>
                                <td>{{$prod->name}}</td>
                                <td>{{$prod->um}}</td>
                                <td>{{$prod->sku}}</td>
                                <td>{{$prod->quantity}}</td>
                                <td>{{$prod->price}}</td>
                                <td>{{$prod->price * $prod->quantity . ' lei'}}</td>
                                <td>
                                    <form action="{{route('delete_product',['id_prod' => $prod->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" title="Sterge"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        //ascundere buton de adauga in momentul in care cineva il apasa - afisam formularul de adauga in acelasi timp
        document.getElementById('showAddProd').addEventListener('click', function () {
            document.getElementById('addProd').style.display = 'block';
        })
    </script>
    @endsection
