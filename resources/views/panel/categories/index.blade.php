@extends('panel.layout.app')

@section('content')

    <div class="card p-3">
        <div class="card-header">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    Kategori Oluşturuldu.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        <h3>Kategoriler</h3>
            <a href="{{route('panel.categoryCreatePage')}}" class="btn btn-sm btn-success">Yeni Kategori Oluştur</a>


        </div>

        <div class="card-body">
            <div class="card">
                <h5 class="card-header">Kategori Listesi</h5>
                <p class="ms-5">Kategori listesi aşağıdaki tabloda bulunmaktadır.</p>
                <div class="table-responsive text-nowrap">
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
                                    {{$k->created_at}}
                                </td>
                                <td>
                                    <button>Güncelle</button>
                                    <button>Sil</button>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <table>

        </table>

    </div>
@endsection

