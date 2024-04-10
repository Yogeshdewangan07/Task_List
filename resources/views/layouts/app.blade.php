<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }

        .link{
            @apply font-medium text-gray-700 underline decoration-pink-500
        }

        label{
            @apply block uppercase text-slate-700 mb-2
        }

        input, textarea, select{
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error{
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade-formatter-enable --}}
</head>
<body>
    <div class="container mx-auto mt-10 mb-10 max-w-lg">
        <h1 class="mb-4 text-2xl">@yield('title')</h1>

        @if(session()->has('success'))
            <div class="flex justify-between bg-green-100 border border-green-400 text-lg text-green-700 px-4 py-3 mb-4 rounded relative alert" role="alert">
                <div>
                    <strong class="font-bold">Success!</strong>
                    <div>{{ session('success') }}</div>
                </div>
                <i class="fa-solid fa-xmark fa-xl pt-2 cursor-pointer"></i>
            </div>
        @endif
        @yield('content')
    </div>

        <script src="{{ asset('js/app.js') }}">
        </script>
</body>
</html>