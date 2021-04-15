@extends('layout.app')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">{{Session::get('error')}}</div>
@endif

<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Konten</th>
        </tr>
    </thead>
    <tbody>
        <p><a href="{{route('article.create')}}">Tambah Artikel</a></p>
        @forelse ($articles as $index=> $item)      
        <tr>
            <td scope="row">{{$index+1}}</td>
            <td><a href="{{route('article.show', $item->id)}}">{{$item->title}}</a></td>
            <td>{{Str::limit($item->content, 50)}}</td>
            <td><a href="{{route('article.edit', $item->id)}}">Ubah Data</a> |
                <form action="{{route('article.destroy',$item->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-link p-0 m-0 d-inline align-baseline">Hapus Data</button>
                    
                </form>
            </td>
        </tr> 
        @empty
            <p>Belum ada Data Artikel</p>
        @endforelse
    </tbody>
</table>
<br/>
	Halaman : {{ $articles->currentPage() }} <br/>
	Jumlah Data : {{ $articles->total() }} <br/>
	Data Per Halaman : {{ $articles->perPage() }} <br/> 

	{{ $articles->links() }}
@endsection