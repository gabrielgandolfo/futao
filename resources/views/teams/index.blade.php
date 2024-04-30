@extends('layouts.app')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Times
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form method="POST" action="{{ route('teams.generateTeams') }}" enctype="multipart/form-data"
                    class="card needs-validation" novalidate>
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Gerar Time</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label">Total de Jogadores Confirmados</label>
                                            <input type="text" class="form-control bg-gray-600" name="totalPlayers"
                                                readonly value="{{ $totalPlayers }}" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Goleiros Confirmados</label>
                                            <input type="text" class="form-control bg-gray-600"
                                                name="totalPlayersGoalkeeper" readonly
                                                value="{{ $totalPlayersGoalkeeper }}" />
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-label">Jogadores por time</div>
                                            <select class="form-select" name="players">
                                                @for ($i=$totalPlayersAllowed; $i>=1; $i--) <option value="{{ $i }}">
                                                    {{ $i }}
                                                </option>
                                                @endfor
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('players.index') }}" class="btn btn-link">Cancelar</a>
                                <button type="submit" class="btn btn-primary ms-auto">Gerar Times</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection