@extends('layouts.base')
@section('title')
    Home - Ceres
@endsection

@section('content')

    <div class="col col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="container"
                    style="display: flex;
                            justify-content: space-between;
                            align-items: center;
                            text-align: center;">
                    <h4 class="card-title">Menú del día</h4>
                </div>
                <p class="card-text">
                    @if ($queryset->count() > 0)
                        @foreach ($queryset as $row)
                            @if ($row->status == 'Preparable' or $row->status == 'preparable')
                                <div class="alert alert-primary" role="alert">
                                    <h4 class="alert-heading">{{ $row->name }}</h4>
                                    <p>{{ $row->description }}</p>
                                </div>
                            @else
                                <div class="alert alert-warning" role="alert">
                                    <h4 class="alert-heading">{{ $row->name }}</h4>
                                    <p>{{ $row->description }}</p>
                                    <p>No disponible</p>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="alert alert-warning" role="alert">
                            No hay Platillos en el sistema
                        </div>
                    @endif
                </p>
            </div>
        </div>
    </div>

@endsection
