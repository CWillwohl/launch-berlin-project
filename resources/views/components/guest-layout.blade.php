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
<body>
    <main class="w-full min-h-screen flex justify-center items-center bg-gradient-to-b from-slate-900 via-gray-800 to-slate-900">
        {{ $slot }}
    </main>
    @vite('resources/js/app.js')
    <script>
        function searchViaCEP() {
            let cep = document.getElementById('postal_code').value.replace(/\D/g, '');

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    document.getElementById('city').value = 'CEP Invalido';
                    document.getElementById('city').disabled = true;
                    document.getElementById('neighborhood').value = 'CEP Invalido';
                    document.getElementById('neighborhood').disabled = true;
                } else {
                    document.getElementById('city').value = data.localidade;
                    document.getElementById('city').disabled = false;
                    document.getElementById('neighborhood').value = data.bairro;
                    document.getElementById('neighborhood').disabled = false;
                }
            })
        }
    </script>
</body>
</html>
