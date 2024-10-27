<div>
    @include('livewire.includes.create-todo')
    {{-- SEARCH BAR --}}
    <div class="my-2 mx-auto">
        <label for="exampleDataList" class="form-label">Search My Todo</label>
        <div class="d-flex justify-content-center align-items-center">
            <input class="form-control w-25" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." wire:model.debounce.500ms='searchTodo' >
        </div>
        @foreach ($todos as $todo)
        <datalist id="datalistOptions">
            <option value="{{$todo->name}}">
        </datalist>
        @endforeach
    </div>

    @include('livewire.includes.list-todo')
</div>
