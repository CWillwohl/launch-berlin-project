<x-app-layout>
    <x-utils.card title="Tabela - Fechaduras" size="w-2/3">
        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="p-2 w-full flex justify-between items-center gap-4">
                <div class="w-full md:w-1/2 flex flex-row gap-4">
                    <a
                    href="{{ route('locks.create') }}"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 items-center">
                        <i class="fa-solid fa-plus"></i>
                        Nova fechadura
                    </a>
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="text-xs bg-gradient-to-b from-blue-500/50 to-blue-500/30 text-white uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Fechadura
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Usuário vinculado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Localização
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($locks as $item)
                        <tr class="text-xs bg-gradient-to-b from-blue-500/70 to-blue-500/50 text-white uppercase">
                            <th class="px-6 py-4">
                                {{ $item->hash }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->status ? 'Travada' : 'Aberta' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->user->formatted_name ?? 'Não vinculado.' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->location->complete_address ?? 'Não vinculado.' }}
                            </td>
                            <td class="flex px-6 py-4 gap-2">
                                <a href="{{ route('locks.edit', $item) }}" type="button" class="text-white focus:ring ring-white focus:outline-none bg-black/30 shadow-lg duration-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('locks.destroy', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white focus:ring ring-white focus:outline-none bg-black/30 shadow-lg duration-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr class="text-xs bg-gradient-to-b from-blue-500/70 to-blue-500/50 text-white uppercase">
                        <th class="px-6 py-4" colspan="5">
                            Nenhum item localizado.
                        </th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-utils.card>
</x-app-layout>
