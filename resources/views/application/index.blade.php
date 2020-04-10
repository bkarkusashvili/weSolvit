@extends('layouts.app')

@php
    $page = 'application';
    $title = 'განცხადებები';
@endphp

@section('content')
<div class="head">
    <h1>{{ $title }}</h1>
</div>

<table id="list">
    <thead>
        <tr>
            <th>ID</th>
            <th>სახელი</th>
            <th>კატეგორია</th>
            <th>სტატუსი</th>
            <th>პრიორიტეტი</th>
            <th>თარიღი</th>
            <th>მოქმედება</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->fullname }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{!! $item->status_html !!}</td>
                <td>{!! $item->priority_html !!}</td>
                <td>{{ $item->created_at->format('d.m.Y') }}</td>
                <td class="action">
                    <a class="left" href="{{ route($page.'.edit', $item) }}">
                        <i class="far fa-edit"></i>
                    </a>
                    <form action="{{ route($page.'.destroy', $item) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="right">
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