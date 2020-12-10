@extends('layouts.app')

@section('content')

<div class="g-signin2" style="display: none" data-onsuccess="callbackLogarPI"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="get" action="" class="row">
                        <div class="col-4" >
                            <label>Cep: </label>
                            <input name="cep" type="text" class="form-control" id="cep" value=""  maxlength="9"
                            onchange="pesquisacep(this,'rua','bairro','cidade','uf','ibge')" />

                        </div>

                        <div class="col-8" >
                            <label>Rua: </label>
                            <input name="rua" class="form-control" type="text" id="rua"  />

                        </div>

                        <div class="col-5" >

                            <label>Bairro: </label>
                            <input name="bairro" class="form-control" type="text" id="bairro"  />

                        </div>

                        <div class="col-5" >
                            <label>Cidade: </label>
                            <input name="cidade" class="form-control" type="text" id="cidade" />

                        </div>
                        <div class="col-2" >
                            <label>Estado: </label>
                            <input name="uf" class="form-control" type="text" id="uf" maxlength="2" />

                        </div>
                        <div class="col-4" >
                            <label>IBGE: </label>
                            <input name="ibge" class="form-control" type="text" id="ibge" />

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
