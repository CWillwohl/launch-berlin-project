<x-guest-layout title="Login">
    <x-auth.card :action="route('login-user')">
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Entre na sua conta!</h5>
        <div>
            <x-utils.input name="email" labelText="Insira seu e-mail:" type="email" placeholder="email@email.com" value="{{ old('email') }}" required error />
        </div>
        <div>
            <x-utils.input name="password" labelText="Insira seu senha:" type="password" placeholder="••••••••" error />
        </div>

        <div class="flex items-start">
            <x-auth.remember />
        </div>

        <button
        type="submit"
        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Entrar na sua conta
        </button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            Não possuí cadastro? <a href="{{ route('register-form') }}" class="text-blue-700 hover:underline dark:text-blue-500">Realize o seu cadastro!</a>
        </div>
    </x-auth.card>
</x-guest-layout>
