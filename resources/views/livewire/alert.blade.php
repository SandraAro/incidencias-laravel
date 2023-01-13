<div>
    <div class="toast-container position-fixed bottom-0  p-3">
        <div class="toast @if($show) d-block @endif" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            {{-- <img src="..." class="rounded me-2" alt="..."> --}}
            <strong class="me-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" wire:click="closeAlert"></button>
            </div>
            <div class="toast-body">
                {{ $msg }}
            </div>
        </div>
    </div>
</div>
