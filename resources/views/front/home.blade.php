@extends('layouts.front')

@section('content')
    <section class="front-top-part">
        <div class="container">
            <div class="row flex-column flex-md-row">
                <div class="col-12 col-lg-8 front-top-part-info">
                    <h1>@lang('front.head.it')</h1>
                    <p>@lang('front.head.text')</p>
                    <ul>
                        <li>
                            <div>
                                <i class="circle"></i>
                                <i class="line"></i>
                            </div>
                            <span>@lang('front.head.list.0')</span>
                        </li>
                        <li>
                            <div>
                                <i class="circle"></i>
                                <i class="line"></i>
                            </div>
                            <span>@lang('front.head.list.1')</span>
                        </li>
                        <li>
                            <div>
                                <i class="circle"></i>
                            </div>
                            <span>@lang('front.head.list.2')</span>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-4 front-ticket">
                    <div class="we-block">
                        <div class="we-group mb-2">
                            <label>@lang('front.application.problem')</label>
                            <textarea class="we-control" placeholder="{{__('front.application.placeholder')}}">{{old('message') ?? ''}}</textarea>
                            <span class="we-alert we-hint">@lang('front.application.hint')</span>
                        </div>
                        <div class="we-group d-flex justify-content-end">
                            <button class="we-btn we-arr-right" {{old('message') ? '':'disabled'}} data-toggle="modal" data-target="#ticket">
                                <span>@lang('front.send')</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="front-partner container-fluid" id="partners">
        <div class="container">
            <div class="front-partner-header">
                <h3>@lang('front.partners.join')</h3>
                <nav class="d-flex d-md-none">
                    <a class="prev"></a>
                    <a class="next"></a>
                </nav>
            </div>
            <div class="list">
                @for ($i = 0; $i < (int)ceil($partners->count() / 2); $i++)
                    <div class="item-wrap">
                        <div class="item">
                            <div class="wrap">
                                <img src="{{ url($partners->get($i * 2)->logo) }}" alt="{{$partners->get($i * 2)->displayName}}">
                            </div>
                        </div>
                        @if ($partners->get($i * 2 + 1))
                        <div class="item">
                            <div class="wrap">
                                <img src="{{ url($partners->get($i * 2 + 1)->logo) }}" alt="{{$partners->get($i * 2 + 1)->displayName}}">
                            </div>
                        </div>
                        @endif
                    </div>
                @endfor
            </div>
            <p>@lang('front.partners.text')</p>
            <a href="{{ route('register', app()->getLocale()) }}" class="we-btn we-arr-right">
                <span>@lang('front.partners.button')</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>
    <section class="front-stats container-fluid">
        <div class="stat-item">
            <span class="text-red">{{$stats['total']}}</span>
            @lang('front.stat.total.long')
        </div>
        <div class="stat-item">
            <span class="text-yellow">{{$stats['progress']}}</span>
            @lang('front.stat.progress.long')
        </div>
        <div class="stat-item">
            <span class="text-green">{{$stats['solved']}}</span>
            @lang('front.stat.solved.long')
        </div>
    </section>
    <section class="front-solved container-fluid">
        <div class="container">
            <div class="front-solved-header">
                <h3>@lang('front.solved.title')</h3>
                <nav class="d-flex d-md-none">
                    <a class="prev"></a>
                    <a class="next"></a>
                </nav>
            </div>
            <div class="solved-list">
                @foreach ($solved as $item)
                <div class="item" data-toggle="modal" data-target="#solved">
                    <h4>@lang('front.solved.name')</h4>
                    <p>{{Str::limit($item->text, 200)}}</p>
                    <span>@lang('front.solved.solve') <strong>{{$item->user->displayName}}</strong>@lang('front.solved.by')</span>
                    <a class="solved-more">
                        @lang('front.more')
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="company">
                        <figure>
                            <img src="{{ url($item->user->logo) }}" alt="{{$item->user->displayName}}">
                        </figure>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="front-faq container-fluid" id="faqs">
        <div class="container">
            <div class="row list">
                <h3 class="col-12 text-center">@lang('front.faq.title')</h3>
                <div class="d-none d-lg-block col-12">
                    <div class="row">
                        <div class="col-6">
                            @for ($i = 0; $i < 6; $i = $i + 2)
                            <div class="item">
                                <div class="item-head">
                                    <h4>{{ __("faq.$i.title") }}</h4>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <p>{{ __("faq.$i.text") }}</p>
                            </div>
                            @endfor
                        </div>
                        <div class="col-6">
                            @for ($i = 1; $i < 6; $i = $i + 2)
                            <div class="item">
                                <div class="item-head">
                                    <h4>{{ __("faq.$i.title") }}</h4>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <p>{{ __("faq.$i.text") }}</p>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="d-block d-lg-none col-12">
                    @for ($i = 0; $i < 6; $i = $i + 1)
                    <div class="item">
                        <div class="item-head" onclick="">
                            <h4>{{ __("faq.$i.title") }}</h4>
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <p>{{ __("faq.$i.text") }}</p>
                    </div>
                    @endfor
                </div>
            </div>
        </div>  
    </section>
@endsection

@section('modal')
    @if(session()->has('send'))
    @include('modals.info', [
        'open' => true,
        'text' => __('front.ticket.sent'),
        'hint' => __('front.ticket.hint'),
    ])
    @endif
    @foreach ($solved as $item)
        @include('modals.solved', ['item' => $item])
    @endforeach
    @include('modals.ticket')
@endsection