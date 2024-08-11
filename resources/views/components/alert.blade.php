@if (session()->has('success'))
        <div class="bg-green-100">
            {{ session('success') }}
        </div>
@endif
@if (session()->has('message'))
        <div class="bg-yellow-100">
            {{ session('message') }}
        </div>
@endif
@if (session()->has('error'))
        <div class="bg-red-100">
            {{ session('error') }}
        </div>
@endif
@if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif