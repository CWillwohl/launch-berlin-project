<x-guest-layout title="Registre-se">
    <x-auth.card :action="route('register-user')">

        <h1 class="text-xl font-medium text-white">Faça seu registro na plataforma!</h1>

        <hr class="border-white/30">

        <div class="w-full flex flex-col md:flex-row divisor-x gap-4">

            <div class="w-full md:w-1/2 flex flex-col gap-4">
                <h2 class="w-full text-left text-base font-bold text-white">
                    Dados de Login:
                </h2>

                <div>
                    <x-utils.input name="user[name]" labelText="Insira seu Nome:" placeholder="Seu Nome" value="{{ old('user.name') }}" required error />
                </div>
                <div>
                    <x-utils.input name="user[email]" type="email" labelText="Insira seu e-mail:" placeholder="email@email.com" value="{{ old('user.email') }}" required error />
                </div>
                <div>
                    <x-utils.input name="user[password]" type="password" labelText="Insira sua senha:" placeholder="••••••••" required error />
                </div>
                <div>
                    <x-utils.input name="user[password_confirmation]" type="password" labelText="Confirme sua senha:" placeholder="••••••••" required error />
                </div>
            </div>

            <div class="w-full md:w-1/2 flex flex-col gap-4">
                <h2 class="w-full text-left text-base font-bold text-white">
                    Dados de Endereço:
                </h2>

                <div>
                    <x-utils.input name="address[postal_code]" id="postal_code" labelText="Insira seu CEP:" placeholder="XXXXX-XXX" value="{{ old('address.postal_code') }}" onblur="searchViaCEP()" x-data x-mask="99999-999" required error />
                </div>

                <div>
                    <x-utils.input name="address[city]" id="city" labelText="Insira sua cidade:" placeholder="Sua cidade" value="{{ old('address.city') }}" readonly required error />
                </div>

                <div>
                    <x-utils.input name="address[neighborhood]" id="neighborhood" labelText="Insira seu bairro:" placeholder="Seu Bairro" value="{{ old('address.neighborhood') }}" readonly required error />
                </div>

                <div class="h-full flex items-end justify-end">
                    <button
                    type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Finalizar Cadastro
                    </button>
                </div>

            </div>
        </div>

        <hr class="border-white/30">

        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            Já cadastrado? <a href="{{ route('login-form') }}" class="text-blue-700 hover:underline dark:text-blue-500">Faça sua autenticação!</a>
        </div>
    </x-auth.card>
</x-guest-layout>
