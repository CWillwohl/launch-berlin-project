<x-app-layout>
    <x-utils.card title="Cadastrar - Fechaduras" size="w-full md:w-2/3">
        <form action="{{ route('locks.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="w-full flex flex-col md:flex-row gap-2">
                <div class="w-full md:w-1/2">
                    <x-utils.input name="hash" labelText="Hash do Disposito:" placeholder="49fd21bb-6bb0-4b26-b883-ce5f9a0c4d63" value="{{ old('hash') }}" required error />
                </div>
                <div class="w-full md:w-1/2">
                    <x-utils.select name="location_id" labelText="Selecione a localização do dispotivo:" baseOption="Selecione a localização do dispotivo..." required error>
                        @foreach ($locations as $item)
                            <option value="{{ $item->id }}" @if(old('location_id') == $item->id) selected @endif>{{ $item->complete_address }}</option>
                        @endforeach
                    </x-utils.select>
                </div>
            </div>

            <hr class="border-white/40">

            <div class="w-full flex items-center justify-end">
                <button
                type="submit"
                class="w-1/2 md:w-1/5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 items-center">
                    Cadastrar
                </button>
            </div>
        </form>
    </x-utils.card>
</x-app-layout>
