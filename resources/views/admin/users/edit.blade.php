<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-6">Редактировать пользователя</h1>

                    @if ($errors->any())
                        <div class="mb-4 rounded border border-red-200 bg-red-50 p-3 text-red-700">
                            <div class="font-medium">Проверьте поля:</div>
                            <ul class="list-disc list-outside ml-5 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li class="mt-1">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Имя</label>
                            <input id="name" name="name" type="text" required value="{{ old('name', $user->name) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                            <input id="email" name="email" type="email" required value="{{ old('email', $user->email) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="group_id" class="block text-sm font-medium text-gray-700">Группа</label>
                            <select id="group_id" name="group_id" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @foreach ($groups as $g)
                                    <option value="{{ $g->id }}" @selected(old('group_id', $user->group_id) == $g->id)>{{ $g->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="pt-2">
                            <div class="text-sm text-gray-600 mb-1">Пароль (необязательно)</div>
                            <input id="password" name="password" type="password"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Подтверждение пароля (если меняете)</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                    class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                                Обновить
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="ml-3 text-gray-700 hover:underline">
                                Отмена
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
