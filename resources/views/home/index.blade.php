{{-- resources/views/home/index.blade.php --}}
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- HERO: Миссия и деятельность --}}
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 space-y-6 p-6">
                    <div class="flex items-start justify-between gap-6 flex-col lg:flex-row">
                        <div class="space-y-4">
                            <h1 class="text-3xl font-bold">СтратПолитика</h1>
                            <p class="text-gray-700 text-lg leading-relaxed max-w-3xl">
                                Независимая аналитическая организация. Мы готовим исследования и рекомендации
                                для государственных институтов, бизнеса и НКО — чтобы решения принимались на основе данных.
                            </p>
                        </div>

                        @if($trending->count())
                            <div class="w-full lg:w-96">
                                <div class="rounded-lg border border-blue-200 bg-amber-50/50">
                                    <div class="px-4 py-3 border-b border-blue-200 flex items-center gap-2">
                                        <span class="inline-block h-2 w-2 rounded-full bg-amber-500"></span>
                                        <span class="text-sm font-medium text-blue-900">Важное сейчас</span>
                                    </div>
                                    <ul class="p-4 space-y-3">
                                        @foreach($trending as $m)
                                            <li>
                                                <a href="{{ route('materials.show', $m) }}"
                                                   class="block group">
                                                    <div class="text-sm font-semibold text-gray-900 group-hover:text-indigo-700">
                                                        {{ $m->title }}
                                                    </div>
                                                    <div class="text-xs text-gray-600">
                                                        {{ $m->created_at->format('d.m.Y') }}
                                                        • {{ $m->type === 'analytics' ? 'Аналитика' : 'Прогнозы и риски' }}
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Последние публикации / исследования --}}
            <div class="bg-white shadow-sm sm:rounded-lg mt-4 p-6">
                <div class="p-8 text-gray-900">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-semibold">Последние публикации</h2>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('materials.analytics') }}"
                               class="text-sm text-indigo-600 hover:text-indigo-800">Все аналитические →</a>
                            <span class="text-gray-300">|</span>
                            <a href="{{ route('materials.risks') }}"
                               class="text-sm text-indigo-600 hover:text-indigo-800">Все прогнозы и риски →</a>
                        </div>
                    </div>

                    @if($latest->count())
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($latest as $m)
                                <a href="{{ route('materials.show', $m) }}"
                                   class="group block rounded-lg border border-gray-200 hover:border-indigo-300 hover:shadow transition overflow-hidden">
                                    <div class="p-5 space-y-3">
                                        <div class="flex items-center gap-2">
                                            <span class="px-2 py-0.5 text-xs rounded bg-gray-100 text-gray-700">
                                                {{ $m->type === 'analytics' ? 'Аналитика' : 'Прогнозы и риски' }}
                                            </span>
                                            @if($m->is_trending)
                                                <span class="px-2 py-0.5 text-xs rounded bg-yellow-100 text-yellow-800">
                                                    важное
                                                </span>
                                            @endif
                                        </div>

                                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-indigo-700">
                                            {{ $m->title }}
                                        </h3>

                                        <p class="text-sm text-gray-600">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($m->excerpt ?: $m->content), 180) }}
                                        </p>

                                        <div class="flex items-center justify-between pt-2 text-xs text-gray-500">
                                            <div class="truncate">{{ $m->tags }}</div>
                                            <div>{{ $m->created_at->format('d.m.Y') }}</div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-gray-500">Пока нет публикаций.</div>
                    @endif
                </div>
            </div>

            {{-- Основные направления --}}
            <div class="bg-white shadow-sm sm:rounded-lg mt-4">
                <div class="p-8 text-gray-900 space-y-6 p-6">
                    <h2 class="text-2xl font-semibold">Основные направления</h2>
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        <a href="{{ route('materials.analytics') }}"
                           class="group rounded-lg border border-gray-200 p-5 hover:border-indigo-300 hover:shadow transition block">
                            <div class="text-sm uppercase tracking-wide text-gray-500">Направление</div>
                            <div class="mt-2 text-lg font-semibold text-gray-900 group-hover:text-indigo-700">
                                Политические и социальные тренды
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                Наблюдаем динамику ценностей и поведения, объясняем причины и последствия.
                            </p>
                        </a>

                        <a href="{{ route('materials.analytics') }}"
                           class="group rounded-lg border border-gray-200 p-5 hover:border-indigo-300 hover:shadow transition block">
                            <div class="text-sm uppercase tracking-wide text-gray-500">Направление</div>
                            <div class="mt-2 text-lg font-semibold text-gray-900 group-hover:text-indigo-700">
                                Геополитические конфликты
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                Анализ акторов, интересов и сценариев, оценка рисков и точек эскалации.
                            </p>
                        </a>

                        <a href="{{ route('consultations') }}"
                           class="group rounded-lg border border-gray-200 p-5 hover:border-indigo-300 hover:shadow transition block">
                            <div class="text-sm uppercase tracking-wide text-gray-500">Услуги</div>
                            <div class="mt-2 text-lg font-semibold text-gray-900 group-hover:text-indigo-700">
                                Консультации для политиков
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                Индивидуальная аналитика и брифинги.
                            </p>
                        </a>

                        <a href="{{ route('materials.risks') }}"
                           class="group rounded-lg border border-gray-200 p-5 hover:border-indigo-300 hover:shadow transition block">
                            <div class="text-sm uppercase tracking-wide text-gray-500">Прогнозы</div>
                            <div class="mt-2 text-lg font-semibold text-gray-900 group-hover:text-indigo-700">
                                Прогнозы событий
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                Вероятностные сценарии и временные горизонты: что важно отслеживать.
                            </p>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
