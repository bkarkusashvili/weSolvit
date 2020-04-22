<div id="ticket" class="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <img src="{{ url('images/close.svg') }}" alt="Close" />
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center mb-4">პრობლემის ატვირთვა</h3>
                <div class="ticket-message mb-4"><p></p></div>
                <h3 class="text-center mb-4">მოგვაწოდე საკონტაქტო ინფორმაცია</h3>
                <form method="POST" accept="{{ route('application.store') }}" class="ticket-form">
                    @csrf
                    <input type="hidden" name="message">
                    @include('components.input', [
                        'name' => 'firstname',
                        'type' => 'text',
                        'label' => 'სახელი',
                    ])
                    @include('components.input', [
                        'name' => 'lastname',
                        'type' => 'text',
                        'label' => 'გვარი',
                    ])
                    @include('components.input', [
                        'name' => 'company',
                        'type' => 'text',
                        'label' => 'კომპანია',
                    ])
                    @include('components.input', [
                        'name' => 'identity',
                        'type' => 'number',
                        'label' => 'საიდენტიფიკაციო კოდი',
                    ])
                    @include('components.input', [
                        'name' => 'employes',
                        'type' => 'number',
                        'label' => 'თანამშრომლების რაოდენობა',
                    ])
                    @include('components.input', [
                        'name' => 'email',
                        'type' => 'email',
                        'label' => 'ელ.ფოსტა',
                    ])
                    @include('components.input', [
                        'name' => 'phone',
                        'type' => 'number',
                        'label' => 'მობ.ნომერი',
                    ])
                    @include('components.input', [
                        'name' => 'type',
                        'type' => 'text',
                        'label' => 'საქმიანობის სფერო',
                    ])
                </form>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="we-btn we-arr-right">
                        <span>გაგზავნა</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>