<?php
@extends('panel.layout.app')

@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h3>Ana Sayfa</h3>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="row">
            <!-- Kategoriler -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Kategoriler</h4>
                        <a href="{{ route('panel.createCategoryPage') }}" class="btn btn-sm btn-primary">Yeni Kategori Oluştur</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tasklar -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tasklar</h4>
                        <a href="{{ route('panel.createTaskPage') }}" class="btn btn-sm btn-success">Yeni Task Oluştur</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>İçerik</th>
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
        </div>
    </div>
@endsection
