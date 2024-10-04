<x-app-layout>
    <x-slot:title>Contact Us</x-slot:title>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Contact Us
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="space-y-10">
                        <section class="w-full p-12 text-gray-900 rounded-lg shadow-xl bg-gradient-to-r from-gray-900 to-gray-700">
                            <h1 class="mb-6 text-4xl font-extrabold text-white">Get in Touch</h1>
                            <p class="text-xl text-white">You can reach us via phone or email or via our location.</p>
                        </section>

                        <div class="p-6 bg-white rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold text-gray-900">Contact Information</h2>
                            <div class="mt-5 space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <h3 class="text-sm font-bold text-gray-900">Phone Number</h3>
                                        <p class="mt-1 text-sm text-gray-600">+91 94224 30953</p>
                                    </div>
                                    <a href="tel:+919322430953" class="ml-2">
                                        <img src="{{ asset('images/phone.png') }}" class="cursor-pointer h-9 w-9" alt="Phone Logo">
                                    </a>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <h3 class="text-sm font-bold text-gray-900">Email Address</h3>
                                        <p class="mt-1 text-sm text-gray-600">shaukatelectricsworks@gmail.com</p>
                                    </div>
                                    <a href="mailto:shaukatelectrical@gmail.com?subject=Web Application Development" target="_blank" class="ml-2">
                                        <img src="{{ asset('images/email.png') }}" class="w-8 h-8 cursor-pointer" alt="Email Logo">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <section class="p-6 bg-white rounded-lg shadow-md">
                            <h2 class="mb-6 text-lg font-semibold text-gray-900">Location</h2>
                            <div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d949.9250330610669!2d73.194992!3d17.758763!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be9c351eaf5124b%3A0x5ea06e1c5a7e72a5!2sShaukat%20Electric%20Works!5e0!3m2!1sen!2sin!4v1727893550578!5m2!1sen!2sin"
                                        width="100%" height="450" style="border:0; border-radius: 0.5rem;"
                                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
