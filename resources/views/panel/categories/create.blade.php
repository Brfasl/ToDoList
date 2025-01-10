@extends('panel.layout.app')

@section('content')
<div class="card p-4">
    <div class="card-header">

        <h3>Kategori Oluştur</h3>
    </div>
    <div class="card-body">
        <form action="">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kategori Adı :</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Lütfen Kategori Adı Giriniz.">

                <label for="exampleFormControlInput1" class="form-label">Kategori Durumu :</label>
                <select name="" id="" class="form-control">
                    <option value="">Aktif</option>
                    <option value="">Pasif</option>
                </select>
            </div>
        </form>

    </div>
</div>


@endsection
