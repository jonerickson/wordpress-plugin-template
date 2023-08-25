<link href="{{ asset('app.css') }}" rel="stylesheet">
<div class='my-5 mr-3 md:mr-5'>
    <h1 class='text-xl font-bold pb-4 text-black'>{{ $title ?? 'Settings' }}</h1>
    <div class='bg-white p-4 ring-1 ring-black ring-opacity-10 shadow-md rounded-md text-slate-600'>
        @yield('content')
    </div>
</div>
<script src="{{ asset('app.js') }}"></script>
