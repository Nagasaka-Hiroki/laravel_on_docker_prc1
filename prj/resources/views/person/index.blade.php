@extends('layouts.helloapp')

@section('title','Person.index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <tr><th>Person</th><th>Board</th></tr>
        @foreach ($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
            <td>
                @if ($item->board != null)
                    {{$item->board->getData()}}
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    <hr size="1">
    <h2>Request</h2>
    <pre>{{$request}}</pre>
    <h2>$request->all() list</h2>
    @foreach ($request->all() as $key=>$data)
        <pre>{{$key}}: {{$data}}</pre>
    @endforeach
    <h2>Response</h2>
    <pre>{{$response}}</pre>
@endsection

@section('footer')
copyright 2020 tutano.
@endsection