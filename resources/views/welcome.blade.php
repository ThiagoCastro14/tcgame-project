<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TC Games</title>
    <style>
        body {
            margin: 20%;
            padding: 1%;
            background-image: url('{{ asset('image/tcgames-inicial.jpg') }}');
            background-size: cover; 
            background-position: center;
            font-family: Arial, sans-serif;
        }

        /* Estilo para telas maiores, como tablets e desktops */
        @media screen and (min-width: 768px) {
            .fixed-top-right {
                position: fixed;
                top: 0;
                right: 0;
                padding: 1rem;
            }

            .fixed-top-right a {
                font-size: 26px;
                font-weight: bold;
                margin-left: 1rem; /* Adicione margem entre os links */
            }
        }
    </style>    
</head>
<body>
    <div class="fixed-top-right">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrar</a>
                @endif
            @endauth
        @endif
    </div>
</body>
</html>
