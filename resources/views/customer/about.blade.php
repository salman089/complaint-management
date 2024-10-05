<x-app-layout>
    <x-slot:title>About Us</x-slot:title>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            About Us
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="space-y-10">
                        <section
                            class="w-full p-12 text-gray-900 rounded-lg shadow-xl bg-gradient-to-r from-gray-900 to-gray-700">
                            <h1 class="mb-6 text-4xl font-extrabold text-white">Welcome to Shaukat Electric Works</h1>
                            <p class="text-xl text-white">
                                Founded in 1988, Shaukat Electric Works has over 35 years of experience in providing
                                exceptional electrical solutions for residential, commercial, and agricultural needs.
                                Our commitment to quality and customer satisfaction sets us apart as a trusted name in
                                the industry. With a strong focus on innovation, we are continuously evolving to meet
                                the demands of a rapidly changing market, ensuring our clients receive the best possible
                                service and solutions.
                            </p>
                        </section>

                        <section class="p-6 bg-white rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold text-gray-900">Our Mission</h2>
                            <p class="text-sm text-gray-600">
                                Our mission is to empower our clients with innovative and sustainable energy solutions.
                                We strive to deliver reliable products and services that enhance the quality of life for
                                our customers and the community. Our dedication to excellence drives us to exceed
                                expectations in every project we undertake.
                            </p>
                        </section>

                        <section class="p-6 bg-white rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold text-gray-900">Our Values</h2>
                            <ul class="space-y-2 text-sm text-gray-600 list-disc list-inside">
                                <li>Integrity: We believe in honest business practices.</li>
                                <li>Quality: Our products and services are of the highest standard.</li>
                                <li>Customer Focus: Our customers are at the heart of everything we do.</li>
                                <li>Innovation: We continuously seek new ways to improve our services.</li>
                                <li>Community: We are committed to giving back and supporting our local community.</li>
                            </ul>
                        </section>

                        <section class="p-6 bg-white rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold text-gray-900">Our Team</h2>
                            <p class="text-sm text-gray-600">
                                Our team consists of highly skilled professionals who are passionate about their work.
                                With years of experience in the electrical industry, we are equipped to handle projects
                                of any scale, ensuring your needs are met with expertise and care. We foster a
                                collaborative environment where every team member contributes to our success and growth.
                            </p>
                        </section>

                        <section class="p-6 bg-white rounded-lg shadow-md">
                            <h2 class="mb-2 text-lg font-semibold text-gray-900">Shop</h2>
                            <a href="{{ asset('images/shop.png') }}" target="_blank">
                                <img src="{{ asset('images/shop.png') }}" alt="Our Shop"
                                    class="w-full mb-6 rounded-lg max-w-7xl h-87">
                            </a>
                            <h2 class="mb-2 text-lg font-semibold text-gray-900">Where to find us</h2>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d949.9250330610669!2d73.194992!3d17.758763!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be9c351eaf5124b%3A0x5ea06e1c5a7e72a5!2sShaukat%20Electric%20Works!5e0!3m2!1sen!2sin!4v1727893550578!5m2!1sen!2sin"
                                width="100%" height="450" style="border:0; border-radius: 0.5rem;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </section>

                        <section class="p-6 bg-white rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold text-gray-900">Join Us</h2>
                            <p class="mt-2 mb-2 text-sm text-gray-600">
                                We invite you to become a part of our journey. Whether you are looking for reliable
                                electrical solutions or seeking a rewarding career with us, we welcome you to connect
                                with us today! If you are interested in joining our team as an employee or wish to learn
                                how to work in the electrical field, we offer training opportunities and mentorship.
                                For inquiries, please reach out via email or phone.
                            </p>
                            <div class="flex items-center justify-center p-2">
                                <a href="tel:+919322430953" >
                                    <img src="{{ asset('images/phone.png') }}" class="cursor-pointer h-9 w-9" alt="Phone Logo">
                                </a>
                                <a href="mailto:shaukatelectrical@gmail.com?subject=Web Application Development" target="_blank">
                                    <img src="{{ asset('images/email.png') }}" class="w-8 h-8 cursor-pointer" alt="Email Logo">
                                </a>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


