<div class="container mt-5">
    <div class="card p-4">
        <!-- Success Message -->
        @if (session()->has('message'))
            <div class="alert alert-success my-3 text-center">
                {{ session('message') }}
            </div>
        @endif
        <h3 class="text-center mb-4">Create User Account</h3>

        <!-- Image Preview -->
        @if ($profilePic)
            <div class="mb-3 text-center">
                <img src="{{ $profilePic->temporaryUrl() }}" alt="Profile Picture Preview" class="img-thumbnail" style="width: 150px; height: 150px;">
            </div>
        @endif

        <!-- Form -->
        <form wire:submit.prevent="createUser" enctype="multipart/form-data">
            <!-- Name Input -->
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" wire:model="name" placeholder="Enter your name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Email Input -->
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" wire:model="email" placeholder="Enter your email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Password Input -->
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" wire:model="password" placeholder="Enter your password">
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Profile Picture Input -->
            <div class="form-group mb-4">
                <label for="profilePic">Profile Picture</label>
                <input type="file" accept="png, jpg, jpeg" class="form-control" wire:model="profilePic">
                @error('profilePic') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block">Create Account</button>
        </form>

    </div>
</div>
