<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-semibold">Группы</h1>
                        <a href="{{ route('admin.groups.create') }}"
                           class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                            Добавить группу
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-left text-sm font-medium text-gray-600 border-b">ID</th>
                                <th class="px-3 py-2 text-left text-sm font-medium text-gray-600 border-b">Название</th>
                                <th class="px-3 py-2 text-left text-sm font-medium text-gray-600 border-b">Slug</th>
                                <th class="px-3 py-2 text-left text-sm font-medium text-gray-600 border-b">Создана</th>
                                <th class="px-3 py-2 text-left text-sm font-medium text-gray-600 border-b w-40">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($groups as $g)
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="px-3 py-2 border-b">{{ $g->id }}</td>
                                    <td class="px-3 py-2 border-b font-medium">{{ $g->name }}</td>
                                    <td class="px-3 py-2 border-b text-gray-700">{{ $g->slug }}</td>
                                    <td class="px-3 py-2 border-b text-gray-600">{{ $g->created_at }}</td>
                                    <td class="px-3 py-2 border-b">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.groups.edit', $g) }}"
                                               class="inline-flex items-center rounded border border-gray-200 px-3 py-1 text-sm hover:bg-gray-50">
                                                Редактировать
                                            </a>

                                            <form action="{{ route('admin.groups.destroy', $g) }}" method="POST"
                                                  onsubmit="return confirm('Удалить группу «{{ $g->name }}»?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="inline-flex items-center rounded border border-red-200 px-3 py-1 text-sm text-red-700 hover:bg-red-50">
                                                    Удалить
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-3 py-6 text-center text-gray-500">
                                        Нет данных о группах
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $groups->links() }}
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.index') }}" class="text-blue-600 hover:underline">
                            ← Назад в админку
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
