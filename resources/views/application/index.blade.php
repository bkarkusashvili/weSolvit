@extends('layouts.app')

@php
    $page = 'application';
    $title = 'განცხადებები';
    $isAdmin = Auth::user()->isAdmin();
@endphp

@section('content')
<div class="head">
    <h1>{{ $title }}</h1>
</div>

<div class="filters mb-2">
    <form action="{{ route($page.'.index') }}" method="GET">
        <div class="row">
            @if ($isAdmin)
            <div class="form-group col-2 pr-1">
                <label>პარტნიორი</label>
                <select name="partner" class="filter-select-search">
                    <option value="0">ყვველა</option>
                    <optgroup label="კომპანიები">
                        @foreach ($companies as $partner)
                            <option value="{{$partner->id}}" {{$partner->id == request()->get('partner') ? 'selected':''}}>{{ $partner->displayName }}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Freelancers">
                        @foreach ($freelances as $partner)
                            <option value="{{$partner->id}}" {{$partner->id == request()->get('partner') ? 'selected':''}}>{{ $partner->displayName }}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
            @endif
            <div class="form-group col-2 px-1">
                <label>სტატუსი</label>
                <select name="status" class="filter-select">
                    <option value="0">ყველა</option>
                    @foreach (App\Application::getStatus() as $key => $st)
                        <option value="{{$key}}" {{request()->get('status') == $key ? 'selected' : ''}}>
                            {{$st[0]}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-2 px-1">
                <label>პრიორიტეტი</label>
                <select name="priority" class="filter-select">
                    <option value="">ყველა</option>
                    @foreach (App\Application::getPriority() as $key => $i)
                        <option value="{{$key}}" {{request()->get('priority') == $key ? 'selected' : ''}}>
                            {{$i[0]}}
                        </option>
                    @endforeach
                </select>
            </div>
            @if ($isAdmin)
            <div class="form-group col-2 px-1">
                <label>კატეგორია</label>
                <select name="category" class="filter-select-search">
                    <option value="">ყველა</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{request()->get('category') == $category->id ? 'selected' : ''}}>
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            @endif
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
            @if ($isAdmin)
            <th>მეილი</th>
            <th>კატეგორია</th>
            <th>კომპანია</th>
            @endif
            <th>სტატუსი</th>
            <th>პრიორიტეტი</th>
            <th>მოქმედება</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $item)
            <tr>
                @if ($isAdmin)
                <td>{{$item->email}}</td>
                <td>
                    <select class="filter-select-search" name="category_id" data-action="{{ route($page.'.category', $item->id) }}">
                        <option value="">ცარიელი</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $item->category_id ? 'selected' : ''}}>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="partner-select" style=" width: 150px" name="user_id" data-action="{{ route($page.'.partner', $item->id) }}">
                        <option value="0">ცარიელი</option>
                        <optgroup label="კომპანიები">
                            @foreach ($companies as $partner)
                                <option value="{{$partner->id}}" {{$partner->id == $item->user_id ? 'selected':''}}>{{ $partner->displayName }}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Freelancers">
                            @foreach ($freelances as $partner)
                                <option value="{{$partner->id}}" {{$partner->id == $item->user_id ? 'selected':''}}>{{ $partner->displayName }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </td>
                @endif
                <td>
                    @if (!$isAdmin && $item->status == 4)
                    {!! $item->status_html !!}
                    @else
                    <select class="status-select" name="status" data-action="{{ route($page.'.status', $item->id) }}">
                        @foreach ($item->getStatus() as $key => $i)
                            <option value="{{$key}}" {{$key == $item->status ? 'selected':''}} {{!$isAdmin && $key == 4 ? 'disabled':''}}>
                                {{ $i[0] }}
                            </option>
                        @endforeach
                    </select>
                    @endif
                </td>
                <td>
                    @if ($isAdmin)
                        <select class="priority-select" name="priority" data-action="{{ route($page.'.priority', $item->id) }}">
                            @foreach ($item->getPriority() as $key => $i)
                            <option value="{{$key}}" {{$key == $item->priority ? 'selected':''}}>{{ $i[0] }}</option>
                            @endforeach
                        </select>
                    @else
                        {!! $item->priority_html !!}
                    @endif
                </td>
                <td class="action">
                    @if (Auth::user()->isAdmin())
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
                    @else
                    <a class="left right" href="{{ route($page.'.edit', $item) }}">
                        <i class="far fa-eye"></i>
                    </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="pagination">
    {{ $list->links() }}
</div>
@endsection