<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-6">
                    <h1 class="text-xl font-semibold">Добавить материал</h1>

                    {{-- Ошибки валидации --}}
                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded">
                            <div class="font-medium mb-1">Проверьте поля формы:</div>
                            <ul class="list-disc list-inside text-sm space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('editor.store') }}" method="post" class="space-y-5">
                        @csrf

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Заголовок *</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                   class="block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                   required>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Тип материала *</label>
                            <select name="type"
                                    class="block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                                <option value="" disabled {{ old('type') ? '' : 'selected' }}>— выберите —</option>
                                <option value="analytics" {{ old('type') === 'analytics' ? 'selected' : '' }}>Аналитика</option>
                                <option value="forecast"  {{ old('type') === 'forecast'  ? 'selected' : '' }}>Прогнозы и риски</option>
                            </select>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Теги (через запятую)</label>
                            <input type="text" name="tags" value="{{ old('tags') }}"
                                   placeholder="политика, экономика"
                                   class="block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Краткое описание</label>
                            <textarea name="excerpt" rows="3"
                                      class="block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('excerpt') }}</textarea>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Контент *</label>
                            <textarea name="content" rows="10" required
                                      class="block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('content') }}</textarea>
                        </div>

                        <div class="flex items-center gap-2">
                            <input id="is_trending" type="checkbox" name="is_trending" value="1" {{ old('is_trending') ? 'checked' : '' }}
                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="is_trending" class="text-sm text-gray-700">Пометить как важное/трендовое</label>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('editor.index') }}"
                               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-50">
                                Отмена
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700">
                                Сохранить
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
