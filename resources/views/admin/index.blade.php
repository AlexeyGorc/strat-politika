<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-4">Админ-панель</h1>
                    <p class="text-gray-700 mb-6">Выберите раздел:</p>

                    <ul class="list-none space-y-3">
                        <li>
                            <a href="{{ route('admin.users.index') }}"
                               class="inline-flex items-center gap-2 rounded border border-gray-200 px-4 py-2 hover:bg-gray-50">
                                <span class="font-medium">Пользователи</span>
                                <span class="text-xs text-gray-500">— вывод всех пользователей</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.groups.index') }}"
                               class="inline-flex items-center gap-2 rounded border border-gray-200 px-4 py-2 hover:bg-gray-50">
                                <span class="font-medium">Группы</span>
                                <span class="text-xs text-gray-500">— управление группами</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
