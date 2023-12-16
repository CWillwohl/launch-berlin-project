<div class="w-3/4 md:w-2/3 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="w-full flex flex-col md:flex-row md:divide-x divide-white/30">
        @if($lock)
            <div class="w-full md:w-1/2 flex flex-col p-4">
                <p class="text-lg text-white text-center font-bold">Gerenciar a fechadura: </p>
                <hr class="border-white/30 my-4">
                <button type="button" wire:model="lock" wire:click="toggleLockStatus" class="space-y-4">
                    @if($lock->status)
                        <p class="text-white">Clique para abrir a fechadura: </p>
                        <i class="fa-solid fa-lock-open text-white bg-black/30 md:w-32 md:h-32 text-6xl p-8 rounded-full"></i>
                    @else
                        <p class="text-white">Clique para fechar a fechadura: </p>
                        <i class="fa-solid fa-lock text-white bg-black/30 md:w-32 md:h-32 text-6xl p-8 rounded-full"></i>
                    @endif
                </button>
            </div>
            <div class="w-full md:w-1/2 flex flex-col p-4">
                <p class="text-lg text-white text-center font-bold">Status da Fechadura: </p>

                <hr class="border-white/30 my-4">

                <div class="w-full flex flex-col gap-4">
                    <div>
                        <x-utils.input type="text" labelText="Localização:" value="{{ $lock->location->complete_address }}" disabled required />
                    </div>
                    <div>
                        <x-utils.input type="text" labelText="Última atualização:" value="{{ $lock->last_status_changed_at }}" disabled required />
                    </div>
                </div>
            </div>
        @else
            <div class="w-full md:w-1/2 flex flex-col p-4">
                <p class="text-lg text-white text-center font-bold">Nenhuma fechadura vinculada ao seu usuário.</p>
                <hr class="border-white/30 my-4">
                <p class="text-white text-center">Vá até um de nossos containers para poder guardar sua bicicleta em segurança.</p>
            </div>
            <div class="w-full md:w-1/2 flex flex-col p-4">
                <p class="text-lg text-white text-center font-bold">Localização de nossos containers: </p>
                <hr class="border-white/30 my-4">
                <div class="w-full flex flex-col gap-4">
                    @foreach ($locations as $key => $location)
                        <div>
                            <x-utils.input type="text" labelText="Container {{ $key + 1 }}:" value="{{ $location->complete_address }}" disabled required />
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
