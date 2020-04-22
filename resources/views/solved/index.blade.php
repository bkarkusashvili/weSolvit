@extends('layouts.app')

@php
    $page = 'solved';
    $title = 'გადაჭრილი';
@endphp

@section('content')
<div class="head">
    <h1>{{ $title }}</h1>
</div>

<table id="list">
    <thead>
        <tr>
            <th>NUM</th>
            <th>მოაგვარა</th>
            <th>თარიღი</th>
            <th>მოქმედება</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->user->displayName }}</td>
                <td>{{ $item->created_at->format('d.m.Y') }}</td>
                <td class="action">
                    <a class="left right" href="{{ route($page.'.edit', $item) }}">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection