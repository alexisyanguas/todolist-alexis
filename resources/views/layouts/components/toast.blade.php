<div class="absolute top-0 right-0 p-8 z-50">
    @if (Session::has('message'))
        <div id="toast"
            class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 gap-1"
            role="alert">
            @include('layouts.components.toast-components.icons', [
                'alertType' => Session::get('alert-type'),
            ])
            <div class="ms-3 text-sm font-normal">
                {!! Session::get('message') !!}
            </div>
            @include('layouts.components.toast-components.close-btn', [
                'onClick' => "document.getElementById('toast').remove()",
            ])
        </div>
    @endif

</div>
