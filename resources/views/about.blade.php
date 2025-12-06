<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            {{-- Карточка: Миссия, цели и принципы --}}
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-6">
                    <h1 class="text-xl">О нас</h1>
                    <p class="text-gray-700">
                        <strong>«СтратПолитика»</strong> — независимая аналитическая организация, предоставляющая
                        качественные исследования и экспертные консультации для государственных институтов, бизнеса и НКО.
                        Наша задача — помогать принимать взвешенные решения на основе данных.
                    </p>

                    <section class="space-y-3">
                        <h2 class="text-xl font-semibold">Миссия</h2>
                        <p class="text-gray-700">
                            Содействовать разработке осмысленной государственной политики через объективную аналитику,
                            прозрачные методологии и открытое экспертное сообщество.
                        </p>
                    </section>

                    <section class="space-y-3">
                        <h2 class="text-xl font-semibold">Цели</h2>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li>Оперативная и глубокая аналитика политических и социальных трендов.</li>
                            <li>Разработка практических рекомендаций для принятия решений.</li>
                            <li>Формирование устойчивых экспертных практик и стандартов качества исследований.</li>
                        </ul>
                    </section>

                    <section class="space-y-3">
                        <h2 class="text-xl font-semibold">Принципы</h2>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li><strong>Объективность:</strong> независимость выводов от внешнего влияния.</li>
                            <li><strong>Верифицируемость:</strong> прозрачные методы и источники данных.</li>
                            <li><strong>Профессионализм:</strong> междисциплинарный подход и этика исследования.</li>
                        </ul>
                    </section>
                </div>
            </div>

            {{-- Карточка: История и партнёры --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-6">
                    <section class="space-y-3">
                        <h2 class="text-xl font-semibold">Краткая история</h2>
                        <p class="text-gray-700">
                            Проект «СтратПолитика» сформирован командой исследователей и практиков государственной
                            политики. Мы объединили опыт полевых исследований, прикладной статистики и стратегического
                            консультирования, чтобы создавать аналитические продукты, которые реально используют.
                        </p>
                    </section>

                    <section class="space-y-3">
                        <h2 class="text-xl font-semibold">Партнёры</h2>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li>Академические и исследовательские центры.</li>
                            <li>Общественные организации и фонды.</li>
                            <li>Медиа и образовательные площадки.</li>
                        </ul>
                        {{-- при необходимости замените списки на реальные названия организаций --}}
                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
