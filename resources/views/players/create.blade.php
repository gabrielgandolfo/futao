@extends('layouts.app')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Jogadores
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form method="POST"
                    action="{{ isset($entity) ? route('players.update', $entity->id) : route('players.store') }}"
                    enctype="multipart/form-data" class="card needs-validation" novalidate>
                    @if (isset($entity))
                    <input type="hidden" name="_method" value="PUT" />
                    @endif
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Cadastro Jogador</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label required">Nome</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" placeholder="Nome Completo"
                                                value="{{ old('name', isset($entity->name) ? $entity->name : '') }}"
                                                required>
                                            @error('name')
                                            <div class="invalid-feedback">Campo obrigatório</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-label">Qualidade de jogo</div>
                                            <select class="form-select" name="level">
                                                <option value="1" @selected(isset($entity) ? $entity->
                                                    getRawOriginal('level') == 1 : '')>1 -
                                                    Bagre</option>
                                                <option value="2" @selected(isset($entity) ? $entity->
                                                    getRawOriginal('level') == 2 : '')>2 -
                                                    Ruim</option>
                                                <option value="3" @selected(isset($entity) ? $entity->
                                                    getRawOriginal('level') == 3 : '')>3 -
                                                    Regular</option>
                                                <option value="4" @selected(isset($entity) ? $entity->
                                                    getRawOriginal('level') == 4 : '')>4 -
                                                    Bom</option>
                                                <option value="5" @selected(isset($entity) ? $entity->
                                                    getRawOriginal('level') == 5 : '')>5 -
                                                    Craque</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-label">Goleiro</div>
                                            <select class="form-select" name="goalkeeper">
                                                <option value="0" @selected(isset($entity) ? $entity->
                                                    getRawOriginal('goalkeeper') == 0 : '')>Não</option>
                                                <option value="1" @selected(isset($entity) ? $entity->
                                                    getRawOriginal('goalkeeper') == 1 : '')>Sim</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-label">Confirmado</div>
                                            <select class="form-select" name="confirmed">
                                                <option value="1" @selected(isset($entity) ? $entity->
                                                    getRawOriginal('confirmed') == 1 : '')>Sim</option>
                                                <option value="0" @selected(isset($entity) ? $entity->
                                                    getRawOriginal('confirmed') == 0 : '')>Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('players.index') }}" class="btn btn-link">Cancelar</a>
                                <button type="submit" class="btn btn-primary ms-auto">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection