@extends('layouts.app')

@php
    $page = 'user';
    $title = 'პარტნიორები';
@endphp

@section('content')
<div class="head">
    <h1>{{ $title }}</h1>
</div>

<div class="filters mb-3">
    <form action="{{ route($page.'.index') }}" method="GET">
        <div class="row">
            <div class="form-group col-2 pr-1">
                <label>სტატუსი</label>
                <select name="status" class="filter-select">
                    <option value="0">ყველა</option>
                    @foreach (App\User::getStatus() as $key => $st)
                        <option value="{{$key}}" {{request()->get('status') == $key ? 'selected' : ''}}>
                            {{$st[0]}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-2 px-1">
                <label>როლი</label>
                <select name="role" class="filter-select">
                    <option value="">ყველა</option>
                    @foreach (App\User::getUserRoles() as $role)
                        <option value="{{$role}}" {{request()->get('role') == $role ? 'selected' : ''}}>
                            {{ucfirst($role)}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4 pl-2">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<table id="list">
    <thead>
        <tr>
            <th>სახელი</th>
            <th>სტატუსი</th>
            <th>როლი</th>
            <th>თარიღი</th>
            <th>მოქმედება</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $item)
            <tr>
                <td>{{ $item->displayName }}</td>
                <td>
                    <select class="status-select" style="width: 90px">
                        @foreach ($item->getStatus() as $key => $i)
                            <option value="{{$key}}" {{$key == $item->status ? 'selected':''}}>
                                {{ $i[0] }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <strong>{{ ucfirst($item->role) }}</strong>
                </td>
                <td>{{ $item->created_at->format('d.m.Y') }}</td>
                <td class="action">
                    <a class="left" href="{{ route($page.'.edit', $item->id) }}">
                        <i class="far fa-edit"></i>
                    </a>
                    <form action="{{ route($page.'.destroy', $item->id) }}">
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