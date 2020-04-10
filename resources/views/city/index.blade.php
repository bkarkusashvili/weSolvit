@extends('layouts.app')

@php
    $page = 'city';
    $title = 'ქალაქები';
@endphp

@section('content')
<div class="head">
    <h1>{{ $title }}</h1>
    <a class="btn" href="{{ route($page.'.create') }}">ახლის დამატება</a>
</div>

<table id="list">
    <thead>
        <tr>
            <th>ID</th>
            <th>სახელი</th>
            <th>თარიღი</th>
            <th>მოქმედება</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at->format('d.m.Y') }}</td>
                <td class="action">
                    <a href="{{ route($page.'.edit', $item) }}">
                        <i class="far fa-edit"></i>
                    </a>
                    <form action="{{ route($page.'.destroy', $item) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="pagination">
    {{ $list->links() }}
</div>
@endsection