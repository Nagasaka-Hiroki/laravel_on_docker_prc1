@extends('layouts.helloapp')

@section('title','Person.index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <tr><th>Data</th></tr>
        @foreach ($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
        </tr>
        @endforeach
    </table>
    <hr size="1">
    <h2>Request</h2>
    <pre>{{$request}}</pre>
    <h2>Response</h2>
    <pre>{{$response}}</pre>
@endsection

@section('footer')
copyright 2020 tutano.
@endsection