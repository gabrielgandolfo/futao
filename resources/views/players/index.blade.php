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
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <span class="d-none d-sm-inline">
                        <a href="#" class="btn">
                            Gerar Times
                        </a>
                    </span>
                    <a href="{{ route('players.create') }}" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Novo Jogador
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                <div class="card">
                    <div class="table">
                        <table class="table table-vcenter table-mobile-md card-table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Nível</th>
                                    <th>Goleiro</th>
                                    <th>Presença Confirmada</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record)
                                <tr>
                                    <td data-label="Name">
                                        <div class="d-flex py-1 align-items-center">
                                            <div class="flex-fill">
                                                <div class="font-weight-medium">{{ $record->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Level">
                                        {{ $record->level }}
                                    </td>
                                    <td>
                                        {{ $record->goalkeeper }}
                                    </td>
                                    <td data-label="Confirmed">
                                        <div>{{ $record->confirmed }}</div>
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            @if($record->getRawOriginal('confirmed'))
                                            <a href="{{ route('confirm',['player_id' => $record->id, 'confirmed'=>0]) }}"
                                                class="btn btn-danger">
                                                Cancelar Presença
                                            </a>
                                            @else
                                            <a href="{{ route('confirm',['player_id' => $record->id, 'confirmed'=>1]) }}"
                                                class="btn">
                                                Confirmar Presença
                                            </a>
                                            @endif
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-toggle="dropdown">
                                                    Ações
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="{{ route('players.edit', $record->id) }}">
                                                        Editar
                                                    </a>
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal_{{$record->id}}" href="#">
                                                        Excluir
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal modal-blur fade" id="deleteModal_{{$record->id}}" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content bg-white">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="modal-status bg-danger"></div>
                                            <div class="modal-body text-center py-4">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon mb-2 text-danger icon-lg" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                    <path d="M12 9v4" />
                                                    <path d="M12 17h.01" />
                                                </svg>
                                                <h3>Tem certeza que deseja excluir esse registro ?</h3>
                                                <div class="text-muted">{{ $record->name }}.</div>
                                            </div>
                                            <form action="{{ route('players.destroy', $record->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-footer">
                                                    <div class="w-100">
                                                        <div class="row">
                                                            <div class="col"><a href="#" class="btn w-100"
                                                                    data-bs-dismiss="modal">
                                                                    Cancelar
                                                                </a></div>
                                                            <div class="col"><button type="submit"
                                                                    class="btn btn-danger w-100"
                                                                    data-bs-dismiss="modal">
                                                                    Sim, desejo excluir
                                                                </button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection