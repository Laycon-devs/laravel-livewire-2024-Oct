<div class="d-flex justify-content-between align-items-center m-5">
    <button class="btn btn-success" wire:click="handleIncre">+</button>
    <h1>{{ $count }}</h1>
    <button class="btn btn-success" wire:click="handleDecre">-</button>
    <button class="btn btn-danger" wire:click="handleReset">Reset</button>
</div>
