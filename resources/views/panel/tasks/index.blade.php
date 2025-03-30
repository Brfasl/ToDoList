@extends('panel.layout.app')

@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h3>Tasklar</h3>
            <a href="{{ route('panel.createTaskPage') }}" class="btn btn-sm btn-success">Yeni Task Oluştur</a>
        </div>

        <div class="card-body">
            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Error Message -->
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Task Table -->
            <div class="card">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Task İçeriği</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $t)
                        <tr>
                            <td>{{ $t->content }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
