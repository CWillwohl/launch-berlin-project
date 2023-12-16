<x-app-layout>
    <div class="w-full items-start justify-center">
        <div class="w-full flex flex-col xl:flex-row gap-4">
            <x-utils.card title="Editar - Usuário" size="w-full">
                <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="w-full flex flex-col md:flex-row justify-between gap-4">
                        <div class="w-full md:w-1/2 flex flex-col gap-4">
                            <h1 class="w-full text-lg font-semibold">Dados de Cadastro:</h1>

                            <div class="w-full flex flex-col md:flex-row gap-4">
                                <div class="w-full md:w-1/2 flex-col">
                                    <x-utils.input name="user[name]" labelText="Insira seu Nome:" placeholder="Nome:" value="{{ old('name') ?? $user->name }}" required error />
                                </div>

                                <div class="w-full md:w-1/2 flex-col">
                                    <x-utils.input name="user[email]" type="email" labelText="E-mail:" placeholder="email@email.com" value="{{ old('email') ?? $user->email }}" required error />
                                </div>
                            </div>

                            <div class="w-full">
                                <x-utils.select name="user[role_id]" labelText="Nível de Acesso:" baseOption="Selecione o Nível de Acesso..." required error>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->id }}" @if ($user->role_id == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </x-utils.select>
                            </div>

                        </div>

                        <div class="w-full md:w-1/2 flex flex-col gap-4">
                            <h1 class="w-full text-lg font-semibold">Dados de Endereço:</h1>

                            <div class="w-full">
                                <x-utils.input name="address[postal_code]" id="postal_code" labelText="CEP:" placeholder="CEP do Usuário:" value="{{ old('postal_code') ?? $user->address->postal_code }}" onblur="searchViaCEP()" x-data x-mask="99999-999" required error />
                            </div>

                            <div class="w-full flex flex-col md:flex-row gap-4">
                                <div class="w-full md:w-1/2 flex-col">
                                    <x-utils.input name="address[city]" id="city" labelText="Cidade:" placeholder="Cidade do Usuário:" value="{{ old('city') ?? $user->address->city }}" readonly required error />
                                </div>
                                <div class="w-full md:w-1/2 flex-col">
                                    <x-utils.input name="address[neighborhood]" id="neighborhood" labelText="Bairro:" placeholder="Bairro do Usuário:" value="{{ old('neighborhood') ?? $user->address->neighborhood }}" readonly required error />
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-white/40">

                    <div class="w-full flex items-center justify-end">
                        <button
                        type="submit"
                        class="w-1/5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 items-center">
                            Atualizar dados
                        </button>
                    </div>
                </form>
            </x-utils.card>
        </div>
    </div>
    {{-- User locks --}}
</x-app-layout>
