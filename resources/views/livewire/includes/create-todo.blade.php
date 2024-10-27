<div class="container mt-5">

    @if (session('failed'))
    <p class="text-center display-6 text-danger fw-bold">{{ session('failed') }}</p>
    @endif
    @if (session('msg'))
    <p class="text-center display-5 text-success fw-bold">{{ session('msg') }}</p>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Create a To-Do</h5>
                    <form wire:submit.prevent="handleCreateTodo">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" wire:model="newTodo" list="datalistOptions"
                                placeholder="Enter your to-do" aria-label="To-Do" aria-describedby="button-addon2">
                            @foreach ($todos as $todo)
                            <datalist id="datalistOptions">
                                <option value="{{$todo->name}}">
                            </datalist>
                            @endforeach
                            <br>
                            <button class="btn btn-primary" type="submit" id="button-addon2">Add To-Do</button>
                        </div>
                        @error('newTodo')
                        <p class="text-center text-danger">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>