<div class="d-block justify-content-center align-items-center m-5 text-center">
    <button class="btn btn-primary" wire:click="handleCreateUser">Create Random users</button>
    <h1 class="text-center">{{ count($users) }}</h1>
    <ul>
        @foreach ($users as $user)
            <p class="text-center text-success">{{ $user->name }}</p>
        @endforeach
    </ul>
</div>
