@extends('panel.layout.app')

@section('content')

    <div class="card p-3">
        <div class="card-header">




            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <h3>Tasklar</h3>
                <a href="{{route('panel.createTaskPage')}}" class="btn btn-sm btn-success">Yeni Task Oluştur</a>
            </div>



            <div class="card-body">
                <div class="card">
                    <table>
                        <thead>

                        </thead>

                        <tbody>
                        @foreach($tasks as $t)
                            <tr>
                                <td>
                                    {{$t->content}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
        <table>

        </table>

    </div>

@endsection

