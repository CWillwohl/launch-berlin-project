<nav class="border-b-2 border-slate-700 bg-slate-900">
    <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4">
        <a href="#" class="flex items-center">
            <span class="self-center whitespace-nowrap rounded border border-slate-700 p-4 text-2xl font-semibold dark:text-white">
                Berlin
            </span>
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-slate-500 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200 dark:text-slate-400 dark:hover:bg-slate-700 dark:focus:ring-slate-600 md:hidden"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="mt-4 flex flex-col rounded-lg border border-slate-100 bg-slate-50 p-4 gap-4 font-medium dark:border-slate-700 dark:bg-slate-800 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:p-0 md:dark:bg-slate-900">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="block rounded py-2 pl-3 pr-4 bg-transparent md:p-0 @if(request()->routeIs('dashboard')) text-blue-500 @else text-white @endif"
                        aria-current="page">
                        Home
                    </a>
                </li>
                @can('admin')
                    <li>
                        <a href="{{ route('locks.index') }}"
                            class="block rounded py-2 pl-3 pr-4 bg-transparent md:p-0 @if(request()->routeIs('locks.*')) text-blue-500 @else text-white @endif"
                            aria-current="page">
                            Fechadura
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('users.index') }}"
                            class="block rounded py-2 pl-3 pr-4 bg-transparent md:p-0 @if(request()->routeIs('users.*')) text-blue-500 @else text-white @endif"
                            aria-current="page">
                            Usuários
                        </a>
                    </li>
                @endcan
                <li>
                    <button
                    id="dropdownNavbarLink"
                    data-dropdown-toggle="dropdownNavbar"
                    class="flex w-full items-center justify-between rounded py-2 pl-3 pr-4 text-slate-900 hover:bg-slate-100 dark:border-slate-700 dark:text-white dark:hover:bg-slate-700 dark:focus:text-white md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                    >
                        {{ Auth::user()->formatted_name }}
                        <svg class="ml-2.5 h-2.5 w-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div
                        id="dropdownNavbar"
                        class="z-10 hidden w-44 divide-y divide-slate-100 rounded-lg bg-white font-normal shadow dark:divide-slate-600 dark:bg-slate-700"
                    >
                        <div class="py-1">
                            <form action="{{ route('logout') }}" method="POST" class="w-full">
                            @csrf
                                <button
                                    type="submit"
                                    class="w-full text-left rounded-b-lg block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-600 dark:hover:text-white"
                                    >
                                    Desconectar
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
