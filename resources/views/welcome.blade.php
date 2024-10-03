<x-layout>
    <x-slot:title>Home</x-slot:title>

    <main class="flex flex-col items-center p-6 space-y-10">
        <section
            class="w-full max-w-5xl p-12 text-white rounded-lg shadow-xl bg-gradient-to-r from-gray-900 to-gray-700">
            <div class="text-center">
                <h1 class="mb-6 text-4xl font-extrabold">Welcome to Shaukat Electric Works</h1>
                <p class="text-xl">Your trusted partner in providing high-quality electrical solutions for homes,
                    businesses, and farms. We aim to power your everyday life with reliable and sustainable energy
                    systems.</p>
            </div>
        </section>

        <section class="grid w-full max-w-5xl grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div class="p-8 transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl">
                <h2 class="mb-4 text-2xl font-semibold text-gray-800">Comprehensive Solar Solutions</h2>
                <p class="text-gray-600">We provide high-quality solar products, including solar panels and solar water
                    pumps, to help you save on electricity bills and reduce your energy consumption. Our solar systems
                    are perfect for both homes and businesses, offering a green and reliable energy source.</p>
            </div>
            <div class="p-8 transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl">
                <h2 class="mb-4 text-2xl font-semibold text-gray-800">Reliable Electrical Equipment</h2>
                <p class="text-gray-600">We offer a wide selection of trusted electrical equipment such as borewell
                    pumps, aluminium cables, and inverters for homes and offices. These products are built to last,
                    ensuring your home or business stays powered with quality materials.</p>
            </div>
            <div class="p-8 transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl">
                <h2 class="mb-4 text-2xl font-semibold text-gray-800">Expert Repairs and Services</h2>
                <p class="text-gray-600">Our skilled technicians are here to provide expert repair and maintenance
                    services for fans, DC motors, tube light frames, and more. Whether it's a small fix or a big
                    problem, we ensure your equipment works properly again, quickly and reliably.</p>
            </div>
            <div class="p-8 transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl">
                <h2 class="mb-4 text-2xl font-semibold text-gray-800">Trusted Brand Partnerships</h2>
                <p class="text-gray-600">We work with well-known brands like Laxmi Lada, Ellen, Crompton Greaves, Lubi,
                    Microtek, and more. Our customers get access to top-quality products that offer durability,
                    reliability, and excellent performance for years to come.</p>
            </div>
            <div class="p-8 transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl">
                <h2 class="mb-4 text-2xl font-semibold text-gray-800">Customizable Solutions</h2>
                <p class="text-gray-600">Every customer is different, and we understand that. That’s why we offer
                    customized solutions to meet your specific needs, whether it’s a solar setup, electrical equipment,
                    or other services. We make sure our products and services fit your home or business perfectly.</p>
            </div>
            <div class="p-8 transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl">
                <h2 class="mb-4 text-2xl font-semibold text-gray-800">Excellent Customer Support</h2>
                <p class="text-gray-600">We are here for you! Our team provides helpful and reliable support to assist
                    you with any questions or issues you may have. Whether it’s advice on products or service requests,
                    we ensure you’re always taken care of with prompt, friendly service.</p>
            </div>
        </section>

        <section class="transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl">
            <img src="{{ asset('images/brands.png') }}" alt="Brand Image" class="w-full max-w-5xl rounded-lg">
        </section>

        <section
            class="w-full max-w-5xl p-12 text-center text-white rounded-lg shadow-xl bg-gradient-to-r from-gray-700 to-gray-900">
            <h2 class="mb-6 text-3xl font-extrabold">Need an Account to Submit a Complaint?</h2>
            <p class="mb-6 text-xl">Joining us is simple and free! Get access to our easy-to-use platform for
                submitting complaints and enjoying smooth service. Signing up takes just a few minutes!</p>
            <a href="{{ route('register') }}"
                class="px-6 py-3 font-semibold text-white transition-colors duration-300 bg-gray-700 rounded-md hover:text-black hover:bg-gray-400">
                Register Now
            </a>
        </section>

        <section class="w-full max-w-5xl p-2 text-center">
            <h2 class="text-2xl font-bold">Where to Find Us</h2>
            <div class="mt-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d949.9250330610669!2d73.194992!3d17.758763!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be9c351eaf5124b%3A0x5ea06e1c5a7e72a5!2sShaukat%20Electric%20Works!5e0!3m2!1sen!2sin!4v1727893550578!5m2!1sen!2sin"
                    width="100%" height="450" style="border:0; border-radius: 0.5rem;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>
    </main>

</x-layout>
