@extends('layout.app')
@section('content')
    {{$articles->title}} || {{date('d M Y',strtotime($articles->created_at))}}<br>
    {{$articles->content}}<br>
    
@endsection