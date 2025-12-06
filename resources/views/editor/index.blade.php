<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            @if (session('success'))
                <div class="bg-green-50 text-green-800 border border-green-200 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-6">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-semibold">Материалы</h1>
                        <a href="{{ route('editor.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700">
                            Добавить материал
                        </a>
                    </div>

                    {{-- Таблица --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead class="bg-gray-50 text-gray-600">
                            <tr>
                                <th class="px-4 py-3 text-left font-medium">ID</th>
                                <th class="px-4 py-3 text-left font-medium">Заголовок / Slug</th>
                                <th class="px-4 py-3 text-left font-medium">Тип</th>
                                <th class="px-4 py-3 text-left font-medium">Теги</th>
                                <th class="px-4 py-3 text-left font-medium">Автор</th>
                                <th class="px-4 py-3 text-left font-medium">Создано</th>
                                <th class="px-4 py-3 text-left font-medium">Редактирование</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                            @forelse ($materials as $m)
                                <tr>
                                    <td class="px-4 py-3 text-gray-700">{{ $m->id }}</td>
                                    <td class="px-4 py-3">
                                        <div class="font-semibold text-gray-900">{{ $m->title }}</div>
                                        <div class="text-xs text-gray-500">/{{ $m->slug }}</div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="inline-flex items-center gap-2">
                                            <span class="px-2 py-1 rounded bg-gray-100 text-gray-700 text-xs">
                                                {{ $m->type === 'analytics' ? 'Аналитика' : 'Прогнозы и риски' }}
                                            </span>
                                            @if ($m->is_trending)
                                                <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800 text-xs">важное</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-gray-700">{{ $m->tags }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $m->author?->name }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $m->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="px-4 py-3 text-right">
                                        <a href="{{ route('editor.edit', $m) }}"
                                           class="text-sm text-indigo-600 hover:text-indigo-800">Редактировать</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                        Пока нет материалов
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Пагинация --}}
                    <div>
                        {{ $materials->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
