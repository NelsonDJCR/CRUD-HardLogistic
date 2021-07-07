@extends('app')
@section('content')
    <div class="row">

        <div class="col-4 d-none d-lg-block">
            <img style="height: 120vh; object-fit: cover" class="w-100"
                src="https://images.pexels.com/photos/5881810/pexels-photo-5881810.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
        </div>



        <div class="col-sm-12  col-lg-8 ">
            <div class="mt-5 mb-5">

                <h1>Registro de usuarios</h1>
            </div>
            <form id="form-edit">
                @csrf
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre del usuario" name="name">
                </div>
                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" class="form-control" placeholder="Apellido del usuario" name="lastname">
                </div>
                <div class="form-group">
                    <label>DNI</label>
                    <input type="text" class="form-control" placeholder="Documento de identificación" name="dni">
                </div>
                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" class="form-control" placeholder="Dirección de recidencia" name="address">
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" class="form-control" placeholder="Teléfono" name="phone">
                </div>
                  <br><br>
                <button type="button" class="btn btn-primary btn-lg btn-block" id="btn-register">Registrar usuario</button>
                <button type="button" class="btn btn-secondary btn-lg btn-block">Cancelar y volver al listado</button>
            </form>
        </div>

    </div>
@endsection
