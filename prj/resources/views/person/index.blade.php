@extends('layouts.helloapp')

@section('title','Person.index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <tr><th>Person</th><th>Board</th></tr>
        @foreach ($hasItems as $item)
        <tr>
            <td>{{$item->getData()}}</td>
            <td>
                @if ($item->boards != null)
                    <table width="100%">
                        @foreach ($item->boards as $obj)
                            <tr><td>{{$obj->getData()}}</td></tr>
                        @endforeach
                    </table>
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    <div style="margin:10px;"></div>
    <table>
        <tr><th>Person</th></tr>
        @foreach ($noItems as $item)
            <tr>
                <td>{{$item->getData()}}</td>
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