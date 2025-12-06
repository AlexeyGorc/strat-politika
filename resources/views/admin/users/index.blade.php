<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-semibold">Пользователи</h1>
                        <a href="{{ route('admin.users.create') }}"
                           class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                            Добавить пользователя
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-left text-sm font-medium text-gray-600 border-b">ID</th>
                                <th class="px-3 py-2 text-left text-sm font-medium text-gray-600 border-b">Имя</th>
                                <th class="px-3 py-2 text-left text-sm font-medium text-gray-600 border-b">E-mail</th>
                                <th class="px-3 py-2 text-left text-sm font-medium text-gray-600 border-b">Группа</th>
                                <th class="px-3 py-2 text-left text-sm font-medium text-gray-600 border-b">Создан</th>
                                <th class="px-3 py-2 text-left text-sm font-medium text-gray-600 border-b w-40">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($users as $u)
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="px-3 py-2 border-b">{{ $u->id }}</td>
                                    <td class="px-3 py-2 border-b">{{ $u->name }}</td>
                                    <td class="px-3 py-2 border-b">{{ $u->email }}</td>
                                    <td class="px-3 py-2 border-b">
                                        @switch($u->group_id)
                                            @case(1) Администратор @break
                                            @case(2) Редактор @break
                                            @case(3) Пользователь @break
                                            @default —
                                        @endswitch
                                    </td>
                                    <td class="px-3 py-2 border-b text-gray-600">{{ $u->created_at }}</td>
                                    <td class="px-3 py-2 border-b">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.users.edit', $u) }}"
                                               class="inline-flex items-center rounded border border-gray-200 px-3 py-1 text-sm hover:bg-gray-50">
                                                Редактировать
                                            </a>
                                            @if (auth()->id() !== $u->id)
                                                <form action="{{ route('admin.users.destroy', $u) }}" method="POST"
                                                      onsubmit="return confirm('Удалить пользователя «{{ $u->name }}»?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="inline-flex items-center rounded border border-red-200 px-3 py-1 text-sm text-red-700 hover:bg-red-50">
                                                        Удалить
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-3 py-6 text-center text-gray-500">Нет пользователей</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.index') }}" class="text-blue-600 hover:underline">← Назад в админку</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
