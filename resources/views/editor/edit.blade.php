<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 space-y-6">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-semibold">Редактировать материал</h1>
                        <a href="{{ route('editor.index') }}" class="text-sm text-gray-600 hover:text-gray-800">← к списку</a>
                    </div>

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

                    {{-- ФОРМА ОБНОВЛЕНИЯ (ОТДЕЛЬНАЯ) --}}
                    <form action="{{ route('editor.update', $material) }}" method="post" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Заголовок *</label>
                            <input type="text" name="title" value="{{ old('title', $material->title) }}"
                                   class="block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Тип материала *</label>
                            <select name="type" class="block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="analytics" @selected(old('type',$material->type)==='analytics')>Аналитика</option>
                                <option value="forecast"  @selected(old('type',$material->type)==='forecast')>Прогнозы и риски</option>
                            </select>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Теги (через запятую)</label>
                            <input type="text" name="tags" value="{{ old('tags', $material->tags) }}"
                                   class="block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Краткое описание</label>
                            <textarea name="excerpt" rows="3"
                                      class="block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('excerpt', $material->excerpt) }}</textarea>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm text-gray-700">Контент *</label>
                            <textarea name="content" rows="12" required
                                      class="block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('content', $material->content) }}</textarea>
                        </div>

                        <div class="flex items-center gap-2">
                            <input id="is_trending" type="checkbox" name="is_trending" value="1"
                                   @checked(old('is_trending', $material->is_trending))
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="is_trending" class="text-sm text-gray-700">Пометить как важное/трендовое</label>
                        </div>

                        <div class="flex items-center gap-3">
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700">
                                Сохранить изменения
                            </button>
                        </div>
                    </form>

                    {{-- ФОРМА УДАЛЕНИЯ (ОТДЕЛЬНАЯ, НЕ ВНУТРИ ДРУГОЙ) --}}
                    <form action="{{ route('editor.destroy', $material) }}" method="post"
                          onsubmit="return confirm('Удалить материал?');" class="pt-2">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-red-300 text-red-700 rounded hover:bg-red-50">
                            Удалить
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
