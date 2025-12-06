{{-- resources/views/materials/show.blade.php --}}
<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-6">
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center px-2 py-0.5 text-xs rounded bg-gray-100 text-gray-700">
                                {{ $material->type === 'analytics' ? 'Аналитика' : 'Прогнозы и риски' }}
                            </span>
                            @if($material->is_trending)
                                <span class="inline-flex items-center px-2 py-0.5 text-xs rounded bg-yellow-100 text-yellow-800">
                                    важное
                                </span>
                            @endif
                        </div>
                        <div class="text-xs text-gray-500">
                            {{ $material->created_at->format('d.m.Y H:i') }}
                        </div>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900">{{ $material->title }}</h1>

                    @if($material->excerpt)
                        <p class="text-gray-700 text-lg">{{ $material->excerpt }}</p>
                    @endif

                    <div class="prose max-w-none prose-indigo">
                        {!! nl2br(e($material->content)) !!}
                    </div>

                    @if($material->tags)
                        <div class="pt-4 flex flex-wrap gap-2">
                            @foreach (explode(',', $material->tags) as $tag)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs bg-gray-100 text-gray-700">
                                    #{{ trim($tag) }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <div class="pt-6">
                        <a href="{{ $material->type === 'analytics' ? route('materials.analytics') : route('materials.risks') }}"
                           class="inline-flex items-center text-indigo-600 hover:text-indigo-800">
                            ← Вернуться к списку
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
