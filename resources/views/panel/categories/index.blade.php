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


                <h3>Kategoriler</h3>
                <a href="{{route('panel.categoryCreatePage')}}" class="btn btn-sm btn-success">Yeni Kategori Oluştur</a>
        </div>



                <div class="card-body">
                <h5 class="card">Kategori Listesi</h5>
                <p class="ms-5">Kategori listesi aşağıdaki tabloda bulunmaktadır.</p>
                <div class="table-responsive text-nowrap">
                    @if($categories->first())

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Kategori Adı</th>
                            <th>Durum</th>
                            <th>Oluşturma Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($categories as $k)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$k->name}}</strong></td>
                                <td>
                                    @if($k->is_active == 1)
                                        Aktif
                                    @else
                                        Pasif
                                    @endif
                                </td>
                                <td>
                                    {{$k->created_at->diffForHumans()}}
                                </td>
                                <td>
                                    <a href="{{route('panel.categoryUpdatePage',$k->id)}}" class="btn btn-info">Güncelle</a>
                                    <a href="{{route('panel.categoryDelete',$k->id)}}" class="btn btn-danger">Sil</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Henüz hiç kategori oluşturmadınız.</p>
                    @endif


                </div>
            </div>
        </div>
        <table>

        </table>

    </div>

@endsection

