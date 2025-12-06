{{-- resources/views/materials/risks.blade.php --}}
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-semibold">Прогнозы и риски</h1>
                    </div>

                    @if ($materials->count())
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($materials as $m)
                                <a href="{{ route('materials.show', $m) }}"
                                   class="group block rounded-lg border border-gray-200 hover:border-indigo-300 hover:shadow transition overflow-hidden">
                                    <div class="p-5 space-y-3">
                                        <div class="flex items-center gap-2">
                                            <span class="inline-flex items-center px-2 py-0.5 text-xs rounded bg-gray-100 text-gray-700">
                                                Прогнозы и риски
                                            </span>
                                            @if($m->is_trending)
                                                <span class="inline-flex items-center px-2 py-0.5 text-xs rounded bg-yellow-100 text-yellow-800">
                                                    важное
                                                </span>
                                            @endif
                                        </div>

                                        <h2 class="text-lg font-semibold text-gray-900 group-hover:text-indigo-700">
                                            {{ $m->title }}
                                        </h2>

                                        <p class="text-sm text-gray-600 line-clamp-3">
                                            {{ $m->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($m->content), 180) }}
                                        </p>

                                        <div class="flex items-center justify-between pt-2 text-xs text-gray-500">
                                            <div class="truncate">{{ $m->tags }}</div>
                                            <div>{{ $m->created_at->format('d.m.Y') }}</div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {{ $materials->links() }}
                        </div>
                    @else
                        <div class="text-gray-500">Пока нет материалов.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
