<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    <h1 class="text-2xl font-semibold">Консультации</h1>
                    <p class="text-gray-700">
                        Мы предоставляем аналитические консультации для государственных институтов, НКО и бизнеса:
                        подготовка аналитических записок, оценка рисков, сценарный анализ, поддержка в принятии решений.
                    </p>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-lg border border-gray-200 p-4">
                            <h3 class="font-medium">Чем помогаем</h3>
                            <p class="mt-2 text-gray-700">
                                Быстрые брифы, глубинные исследования, краткие policy notes, презентации для
                                руководства.
                            </p>
                        </div>
                        <div class="rounded-lg border border-gray-200 p-4">
                            <h3 class="font-medium">Форматы работы</h3>
                            <p class="mt-2 text-gray-700">
                                Разовые консультации, сопровождение проектов, экспертные сессии, peer-review материалов.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-600 bg-green-100 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3">
                    <div class="font-medium">Проверьте поля формы:</div>
                    <ul class="list-disc list-outside ml-5 mt-2">
                        @foreach ($errors->all() as $error)
                            <li class="mt-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-semibold">Отправить запрос</h2>
                    <form action="{{ route('consultations.submit') }}" method="POST"
                          class="mt-6 grid gap-4 sm:grid-cols-2">
                        @csrf
                        <div class="sm:col-span-1">
                            <label for="name" class="block text-sm font-medium text-gray-700">Имя</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="sm:col-span-1">
                            <label for="organization"
                                   class="block text-sm font-medium text-gray-700">Организация</label>
                            <input id="organization" name="organization" type="text" value="{{ old('organization') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="purpose" class="block text-sm font-medium text-gray-700">Цель обращения</label>
                            <input id="purpose" name="purpose" type="text" value="{{ old('purpose') }}" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="message" class="block text-sm font-medium text-gray-700">Сообщение</label>
                            <textarea id="message" name="message" rows="5" required
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('message') }}</textarea>
                        </div>

                        <div class="sm:col-span-2">
                            <button type="submit"
                                    class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Отправить запрос
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-6">
                    <h2 class="text-xl font-semibold">Наши эксперты</h2>

                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <article class="rounded-lg border border-gray-200 p-4">
                            <div class="flex items-center gap-4">
                                <img src="/images/experts/expert-1.jpg" alt="Фото эксперта"
                                     class="h-14 w-14 rounded-full object-cover"
                                     onerror="this.src='https://placehold.co/96x96'">
                                <div>
                                    <h3 class="font-medium">Анна Соколова</h3>
                                    <p class="text-sm text-gray-600">Руководитель исследований</p>
                                </div>
                            </div>
                            <p class="mt-3 text-sm text-gray-700">
                                Политические и социальные тренды, сравнительная политика, поведенческие индикаторы.
                            </p>
                        </article>

                        <article class="rounded-lg border border-gray-200 p-4">
                            <div class="flex items-center gap-4">
                                <img src="/images/experts/expert-2.jpg" alt="Фото эксперта"
                                     class="h-14 w-14 rounded-full object-cover"
                                     onerror="this.src='https://placehold.co/96x96'">
                                <div>
                                    <h3 class="font-medium">Дмитрий Орлов</h3>
                                    <p class="text-sm text-gray-600">Ведущий аналитик</p>
                                </div>
                            </div>
                            <p class="mt-3 text-sm text-gray-700">
                                Геополитические конфликты, оценка рисков, сценарный анализ, международные отношения.
                            </p>
                        </article>

                        <article class="rounded-lg border border-gray-200 p-4">
                            <div class="flex items-center gap-4">
                                <img src="/images/experts/expert-3.jpg" alt="Фото эксперта"
                                     class="h-14 w-14 rounded-full object-cover"
                                     onerror="this.src='https://placehold.co/96x96'">
                                <div>
                                    <h3 class="font-medium">Екатерина Миронова</h3>
                                    <p class="text-sm text-gray-600">Эксперт-консультант</p>
                                </div>
                            </div>
                            <p class="mt-3 text-sm text-gray-700">
                                Госуправление, политика в сфере безопасности, институциональная аналитика.
                            </p>
                        </article>
                    </div>

                    <p class="text-sm text-gray-500">
                        Хотите пригласить конкретного эксперта? Укажите это в поле «Цель обращения».
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
