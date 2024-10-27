<div class="card-body">
    <ul class="list-group w-50 m-auto">
        @foreach ($todos as $todo)
        <li class="list-group-item d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input type="checkbox" wire:click='handleCheckTodo({{$todo->id}})' class="form-check-input me-2"
                    {{!$todo->completed ? 'checked' : ''}}>
                @if ($editingTodoId === $todo->id)
                <div class="d-flex align-items-center">
                    <input type="text" wire:model='editingTodoName' class="form-control me-2">
                    <button class="btn btn-sm btn-outline-success me-2"
                        wire:click="updateTodo({{ $todo->id }})">Save</button>
                    <button class="btn btn-sm btn-outline-danger me-2" wire:click="cancel">Cancel</button>
                    <br>
                </div>
                <div class="d-flex">
                    @error('editingTodoName')
                <i class="text-center text-danger fw-bold small mt-2">{{$message}}</i>
                @enderror
                </div>
                @else
                <label class="form-check-label {{ !$todo->completed ? 'text-decoration-line-through text-muted' : '' }}"
                    for="todo">
                    {{ $todo->name }}
                </label>
                @endif
            </div>
            <div>
                <!-- Edit and Delete icons -->
                <button class="btn btn-sm btn-outline-primary me-2"
                    wire:click="editTodo({{ $todo->id }}, '{{ $todo->name }}')">
                    <i class="bi bi-pencil-square"></i> <!-- Edit Icon -->
                </button>
                <button class="btn btn-sm btn-outline-danger" wire:confirm="Are you sure you want to delete this post?" wire:click="deleteTodo({{ $todo->id }})">
                    <i class="bi bi-trash"></i> <!-- Delete Icon -->
                </button>
            </div>
        </li>
        @endforeach

        @if ($errorMsg)
        <p class="text-center display-6 text-danger fw-bold">{{ $errorMsg }}</p>
        @endif
    </ul>

    <div class="d-flex justify-content-center mt-2">
        {{$todos->links('vendor.livewire.bootstrap')}}
    </div>
</div>