@php
    $open = $open ?? false;
    $hint = $hint ?? '';
    $text = $text ?? '';

    $class = $open ? 'show' : '';
@endphp

<div id="info" class="{{ $class }} we-modal modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <i class="fas fa-check-circle"></i>
            <div class="model-text">{{ $text }}</div>
            <span class="hint">{{ $hint }}</span>
        </div>
      </div>
    </div>
</div>