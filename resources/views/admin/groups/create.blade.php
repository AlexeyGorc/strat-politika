<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-6">Добавить группу</h1>

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

                    <form action="{{ route('admin.groups.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Название</label>
                            <input id="name" name="name" type="text" required value="{{ old('name') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700">Slug (необязательно)</label>
                            <input id="slug" name="slug" type="text" value="{{ old('slug') }}"
                                   placeholder="например: editor"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <p class="mt-1 text-xs text-gray-500">Если оставить пустым — будет сгенерирован из названия.</p>
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                    class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                                Сохранить
                            </button>
                            <a href="{{ route('admin.groups.index') }}" class="ml-3 text-gray-700 hover:underline">
                                Отмена
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
