<div id="solved" class="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-check"></i>
                <button type="button" class="close" data-dismiss="modal">
                    <img src="{{ url('images/close.svg') }}" alt="Close" />
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-block">
                    <h3>@lang('front.solved.name')</h3>
                    <p>{{$item->text}}</p>
                </div>
                <div class="modal-block">
                    <h3>@lang('front.solved.comment')</h3>
                    <p>{{$item->comment}}</p>
                </div>
                <div class="modal-company">
                    <span>@lang('front.solved.solve') <strong>{{$item->user->displayName}}</strong>@lang('front.solved.by')</span>
                    <figure>
                        <img src="{{ url($item->user->logo) }}" alt="{{$item->user->displayName}}">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>