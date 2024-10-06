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
                                    class="w-full mb-6 object-cover rounded-lg max-w-7xl h-87">
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
                                <a href="tel:+919322430953" class="ml-2">
                                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 18 20">
                                        <path d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z"/>
                                    </svg>                                </a>
                                <a href="mailto:shaukatelectrical@gmail.com?subject=Web Application Development" target="_blank" class="ml-2">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 20 20">
                                        <path d="M19.728 10.686c-2.38 2.256-6.153 3.381-9.875 3.381-3.722 0-7.4-1.126-9.571-3.371L0 10.437V18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-7.6l-.272.286Z"/>
                                        <path d="m.135 7.847 1.542 1.417c3.6 3.712 12.747 3.7 16.635.01L19.605 7.9A.98.98 0 0 1 20 7.652V6a2 2 0 0 0-2-2h-3V3a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v1H2a2 2 0 0 0-2 2v1.765c.047.024.092.051.135.082ZM10 10.25a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5ZM7 3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1H7V3Z"/>
                                    </svg>
                                </a>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


