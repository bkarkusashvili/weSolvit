<div id="ticket" class="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-left mb-0 d-block d-lg-none">@lang('front.ticket.title')</h3>
                <button type="button" class="close" data-dismiss="modal">
                    <img src="{{ url('images/close_black.svg') }}" alt="Close" />
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center mb-4 d-none d-lg-block">@lang('front.ticket.title')</h3>
                <div class="ticket-message mb-4">
                    <p></p>
                </div>
                <h3 class="text-center mb-4">@lang('front.ticket.info')</h3>
                <form method="POST" action="{{ route('application.store') }}">
                @csrf
                    <div class="ticket-form">
                        <input type="hidden" name="message">
                        @include('components.input', [
                            'name' => 'firstname',
                            'type' => 'text',
                            'label' => __('front.label.fisrtname'),
                        ])
                        @include('components.input', [
                            'name' => 'lastname',
                            'type' => 'text',
                            'label' => __('front.label.lastname'),
                        ])
                        @include('components.input', [
                            'name' => 'company',
                            'type' => 'text',
                            'label' => __('front.label.company'),
                        ])
                        @include('components.input', [
                            'name' => 'identity',
                            'type' => 'number',
                            'label' => __('front.label.identity'),
                        ])
                        @include('components.input', [
                            'name' => 'employes',
                            'type' => 'number',
                            'label' => __('front.label.employes'),
                        ])
                        @include('components.input', [
                            'name' => 'email',
                            'type' => 'email',
                            'label' => __('front.label.email'),
                        ])
                        @include('components.input', [
                            'name' => 'phone',
                            'type' => 'number',
                            'label' => __('front.label.phone'),
                        ])
                        @include('components.input', [
                            'name' => 'type',
                            'type' => 'text',
                            'label' => __('front.label.type'),
                        ])
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="we-btn we-arr-right">
                            <span>@lang('front.send')</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="ticket-error" value="{{!$errors->isEmpty()}}">