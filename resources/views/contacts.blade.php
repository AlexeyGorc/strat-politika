<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    <h2 class="text-xl font-semibold mb-4">Контакты</h2>

                    <ul class="space-y-2">
                        <li><strong>Адрес:</strong> г. Москва, ул. Пушкина, д. 15</li>
                        <li><strong>E-mail:</strong> <a href="mailto:info@stratpolitika.ru"
                                                        class="text-blue-600 hover:underline">info@stratpolitika.ru</a>
                        </li>
                        <li><strong>Телефон:</strong> <a href="tel:+74951234567" class="text-blue-600 hover:underline">+7
                                (495) 123-45-67</a></li>
                    </ul>
                    <form action="#" method="POST" class="mt-6 space-y-4">
                        @csrf
                        <div class="mt-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Имя</label>
                            <input type="text" id="name" name="name" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>

                        <div class="mt-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                            <input type="email" id="email" name="email" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>

                        <div class="mt-3">
                            <label for="message" class="block text-sm font-medium text-gray-700">Сообщение</label>
                            <textarea id="message" name="message" rows="4" required
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea>
                        </div>

                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 mt-3 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Отправить
                        </button>
                    </form>

                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-600 bg-green-100 rounded-lg" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
