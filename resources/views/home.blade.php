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

                    <div class="row">
                        <div class="col-6">
                            <label>Codigo de rastreio</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-2">
                            <label><br><br></label>
                            <button type="button" onclick="buscaRastreio()" style="margin-top: 33px;" class="btn btn-primary">Verificar</button></div>
                        </div>
                        <div class="col-12" id="rastreio">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
