<div class="container mt-5">
    <h3 class="text-center mb-4">User List</h3>

    <div class="row">
        @foreach ($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}'s Profile Picture" class="card-img-top img-thumbnail" style="width: 150px; height: 150px; margin: auto;">

                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Static Pagination -->
    {{-- {{$users->links()}} --}}
</div>
