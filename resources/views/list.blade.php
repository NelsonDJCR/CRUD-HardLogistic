@extends('app')
@section('content')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script> --}}

    <div class="mt-5 mb-5">
        <h1>Lista de usuario</h1>
    </div>

    <form id="form-filter">
        <div class="row mb-5">
            <div class="col-3">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>DNI</label>
                    <input type="text" class="form-control" name="dni">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>&nbsp;</label><br>
                    <button class="btn btn-primary w-100 " id="btn-filter" type="button">
                        Buscar
                    </button>
                </div>
            </div>
        </div>
        @csrf
    </form>

    <table class="table table-hover ">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th style="width: 150px">Acciones</th>
            </tr>
        </thead>
        <tbody id="table">
        </tbody>
    </table>


    <div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos del usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-edit">
                        @csrf
                        <input type="hidden" name="id" class="input-id">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control input-name" placeholder="Nombre del usuario" name="name">
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" class="form-control input-lastname" placeholder="Apellido del usuario" name="lastname">
                        </div>
                        
                        <div class="form-group">
                            <label>DNI</label>
                            <input type="text" class="form-control input-dni" placeholder="Documento de identificación" name="dni">
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control input-address" placeholder="Dirección de recidencia" name="address">
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" class="form-control input-phone" placeholder="Teléfono" name="phone">
                        </div>
                        <br><br>
                        <button type="button" class="btn btn-primary btn-lg btn-block" id="btn-edit">Editar</button>
                        <button type="button" data-dismiss="modal"
                            class="btn btn-secondary btn-lg btn-block">Cancelar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
