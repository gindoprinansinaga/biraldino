@extends('layout.app')
@section('content')
    
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Konten</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $item)      
        <tr>
            <td scope="row">{{$index+1}}</td>
            <td>{{$item->title}}</td>
            <td>{{Str::limit($item->content, 191)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection