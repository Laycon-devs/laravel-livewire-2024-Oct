<div class="">
    @if (session('message'))
        <p class="text-center text-success">
            {{session('message')}}
        </p>
    @endif
    <div class="row">
        <div class="col">
            <div class="container mt-5 card">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h3 class="text-center mb-4">Sign Up</h3>
                        <form wire:submit.prevent="handleCreateUser">
                            <div class="form-group mb-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" wire:model="name" placeholder="Enter your name">
                                @error('name')
                                    <p class="text-center text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" wire:model="email"
                                    placeholder="Enter your email">
                                    @error('email')
                                    <p class="text-center text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" wire:model="password"
                                    placeholder="Enter your password">
                                    @error('password')
                                    <p class="text-center text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mt-5">
            <ul>
                @foreach ($users as $user)
                    <p class="text-center fw-bold text-success">{{ $user->name }} <span class="text-primary ms-5">Email: {{ $user->email }}</span></p>
                @endforeach
            </ul>
        </div>
    </div>

</div>
