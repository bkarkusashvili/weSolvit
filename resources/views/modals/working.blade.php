@php
    $options = [];
    for ($i=0; $i < 24; $i++) { 
      $options[$i] = $i >= 10 ? $i . ':00' : '0' .$i. ':00';
    }
@endphp

<div id="working" class="modal we-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="model-text">{{ __('front.popup.hours') }}</div>
            <div class="working-wrap">
              @include('components.select', ['label' => __('front.popup.from'), 'name' => 'from', 'options' => $options])
              @include('components.select', ['label' => __('front.popup.to'), 'name' => 'to', 'options' => $options])
            </div>
            <button class="we-btn we-arr-right submit-working">
              <span>@lang('front.continue')</span>
              <i class="fas fa-arrow-right"></i>
            </button>
        </div>
      </div>
    </div>
</div>