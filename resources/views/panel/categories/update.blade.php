@extends('panel.layout.app')

@section('content')
    <div class="card p-4">
        <div class="card-header">

        </div>
        <div class="card-body">

            <h3>Kategori Güncelle</h3>

        </div>

        <form action="{{route('panel.updateCategoryTest',$category->id)}}"  method="POST">
            @csrf

            <!--<input type="hidden" value="{{$category->id}}" name="catID">
            -->
            <label for="">Kategori Adı :</label>
            <input type="text" class="form-control" name="catName" value="{{$category->name}}">

            <label for="">Kategori Durumu :</label>
            <select name="catStatus" id="" class="form-control">
            <option value="1" @if($category->is_active==1)selected @endif>Aktif</option>
            <option value="0" @if($category->is_active==0)selected @endif>Pasif</option>

            </select>

            <button type="submit" class="btn btn-success mt-3">Güncelle</button>
        </form>
    </div>


@endsection
