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
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <span class="d-none d-sm-inline">
                    <a href="{{ route('teams.index') }}" class="btn">
                        Gerar Novamente
                    </a>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            @foreach ($teams as $team)

            <div class="col-4">
                <div class="card">
                    <div class="table">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Goleiro</th>
                                    <th>Qualidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($team as $player)
                                <tr>
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->goalkeeper }}</td>
                                    <td>{{ $player->level }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection