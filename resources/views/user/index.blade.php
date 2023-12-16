<x-app-layout>
    <x-utils.card title="Tabela - Usuários" size="w-2/3">
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="text-xs bg-gradient-to-b from-blue-500/50 to-blue-500/30 text-white uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nivel de Acesso
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fechadura
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                        <tr class="text-xs bg-gradient-to-b from-blue-500/70 to-blue-500/50 text-white uppercase">
                            <th class="px-6 py-4">
                                {{ $item->formatted_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->is_admin ? 'Administrador' : 'Usuario Comum' }}
                            </td>
                            <td class="px-6 py-4">
                                Vinculado à uma fechadura: <strong>{{ $item->lock ? 'Sim' : 'Não' }}.</strong>
                            </td>
                            <td class="flex px-6 py-4 gap-2">
                                <a href="{{ route('users.edit', $item) }}" type="button" class="text-white focus:ring ring-white focus:outline-none bg-black/30 shadow-lg duration-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('users.destroy', $item) }}" method="POST">
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
