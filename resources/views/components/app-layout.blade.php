<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title ?? config('app.name') }}</title>
</head>
<body class="bg-gradient-to-b from-slate-900 via-gray-800 to-slate-900">
    <x-navbar />
        @if(session()->has('alert'))
        <div class="w-full flex justify-center items-center">
            <div class="w-2/3 mt-4">
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        {{ session('alert.message') }}
                    </div>
                </div>
            </div>
        </div>
        @endif
        <main class="w-full min-h-screen flex p-8 gap-4 justify-center items-start">
            {{ $slot }}
        </main>

    @vite('resources/js/app.js')
    @stack('scripts')
    <script>
        function searchViaCEP() {
            let cep = document.getElementById('postal_code').value.replace(/\D/g, '');

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    // state and street
                    document.getElementById('state').value = 'CEP Invalido';
                    document.getElementById('state').disabled = true;
                    document.getElementById('city').value = 'CEP Invalido';
                    document.getElementById('city').disabled = true;
                    document.getElementById('neighborhood').value = 'CEP Invalido';
                    document.getElementById('neighborhood').disabled = true;
                    document.getElementById('street').value = 'CEP Invalido';
                    document.getElementById('street').disabled = true;
                } else {
                    document.getElementById('state').value = data.uf;
                    document.getElementById('state').disabled = false;
                    document.getElementById('city').value = data.localidade;
                    document.getElementById('city').disabled = false;
                    document.getElementById('neighborhood').value = data.bairro;
                    document.getElementById('neighborhood').disabled = false;
                    document.getElementById('street').value = data.logradouro;
                    document.getElementById('street').disabled = false;
                }
            })
        }
    </script>
</body>
</html>
