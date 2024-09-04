<x-layout>
    <x-slot:title>Home</x-slot:title>

    <main class="p-6 space-y-10 flex flex-col items-center">
        <section class="bg-gradient-to-r from-gray-900 to-gray-700 text-white p-12 rounded-lg shadow-xl w-full max-w-5xl">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold mb-6">Welcome to Shaukat Electric Works</h1>
                <p class="text-xl">TODO!</p>
            </div>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-5xl">
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Feature 1</h2>
                <p class="text-gray-600">TODO.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Feature 2</h2>
                <p class="text-gray-600">TODO.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Feature 3</h2>
                <p class="text-gray-600">TODO.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Feature 4</h2>
                <p class="text-gray-600">TODO.</p>
            </div>
        </section>

        <section class="bg-gradient-to-r from-gray-700 to-gray-900 text-white p-12 rounded-lg shadow-xl text-center w-full max-w-5xl">
            <h2 class="text-3xl font-extrabold mb-6">Need an Account to Submit a Complaint?</h2>
            <p class="text-xl mb-6">Join us today and gain access to our comprehensive platform. Signing up is quick, easy, and absolutely free!</p>
            <a href="{{ route('register') }}" class=" bg-gray-700 text-white hover:text-black hover:bg-gray-400 px-6 py-3 rounded-md font-semibold transition-colors duration-300">
                Register Now
            </a>
        </section>
    </main>

</x-layout>
