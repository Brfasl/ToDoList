@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">📝 Bugünün Görevleri</h2>

        {{-- Görev Ekle Butonu --}}
        <a href="{{ route('panel.createTaskPage') }}" class="btn btn-primary mb-3">
            ➕ Yeni Görev Ekle
        </a>

        {{-- Görev Listesi --}}
        @if($tasks->count())
            <ul class="list-group">
                @foreach($tasks as $task)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <input type="checkbox" onchange="document.getElementById('complete-task-{{ $task->id }}').submit()" {{ $task->is_completed ? 'checked' : '' }}>
                            <span class="{{ $task->is_completed ? 'text-muted text-decoration-line-through' : '' }}">
                            {{ $task->title }}
                        </span>
                        </div>
                        <form id="delete-task-{{ $task->id }}" method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                        </form>
                    </li>

                    {{-- Tamamla Formu (Gizli) --}}
                    <form id="complete-task-{{ $task->id }}" method="POST" action="{{ route('tasks.toggle', $task->id) }}">
                        @csrf
                    </form>
                @endforeach
            </ul>
        @else
            <p>Bugün için hiç görev eklenmemiş. 🎉</p>
        @endif
    </div>
@endsection
