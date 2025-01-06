@extends('layouts.main_layout')

@section('content')
    <div class="bg-gray-50">
        <!-- Hero Section -->
        <section class="bg-blue-600 text-white py-12">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl font-bold mb-4">About Us</h1>
                <p class="text-lg">Discover our mission, values, and the passion that drives us forward.</p>
            </div>
        </section>

        <!-- Who We Are Section -->
        <section class="py-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap items-center">
                    <div class="w-full md:w-1/2 px-4">
                        <h2 class="text-3xl font-bold mb-4">Who We Are</h2>
                        <p class="text-gray-700 leading-relaxed">
                            We are a dynamic organization committed to delivering innovative and trusted solutions
                            tailored to our clients' needs. Our team is dedicated to excellence in every aspect of our work.
                        </p>
                    </div>
                    <div class="w-full md:w-1/2 px-4">
                        <div class="relative">
                            <img src="/images/who-we-are.jpg" alt="Who We Are" class="rounded-lg shadow-md">
                            <div class="absolute inset-0 bg-blue-600 opacity-20 rounded-lg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission, Vision, and Values Section -->
        <section class="bg-gray-100 py-12">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-8">Our Mission, Vision & Values</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Mission Card -->
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition duration-300">
                        <h3 class="text-xl font-bold mb-2">Mission</h3>
                        <p class="text-gray-700">
                            To transform lives by delivering innovative and impactful solutions.
                        </p>
                    </div>
                    <!-- Vision Card -->
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition duration-300">
                        <h3 class="text-xl font-bold mb-2">Vision</h3>
                        <p class="text-gray-700">
                            To be the most trusted and innovative partner for creating value.
                        </p>
                    </div>
                    <!-- Values Card -->
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition duration-300">
                        <h3 class="text-xl font-bold mb-2">Values</h3>
                        <p class="text-gray-700">
                            Integrity, Innovation, and Excellence form the core of our philosophy.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Team Section -->
        <section class="py-12">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-8">Meet Our Team</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition duration-300">
                        <img src="/images/team-member-1.jpg" alt="Team Member" class="rounded-full w-32 h-32 mx-auto mb-4">
                        <h4 class="text-lg font-bold">John Doe</h4>
                        <p class="text-gray-700 text-sm">CEO & Founder</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition duration-300">
                        <img src="/images/team-member-2.jpg" alt="Team Member" class="rounded-full w-32 h-32 mx-auto mb-4">
                        <h4 class="text-lg font-bold">Jane Smith</h4>
                        <p class="text-gray-700 text-sm">CTO</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition duration-300">
                        <img src="/images/team-member-3.jpg" alt="Team Member" class="rounded-full w-32 h-32 mx-auto mb-4">
                        <h4 class="text-lg font-bold">Alice Johnson</h4>
                        <p class="text-gray-700 text-sm">Head of Marketing</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section class="bg-blue-600 text-white py-12">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-4">Contact Us</h2>
                <p class="text-lg mb-6">Get in touch with us to learn more about our services and how we can help you.</p>
                <a href="/contact"
                    class="inline-block bg-white text-blue-600 font-bold py-2 px-6 rounded-full hover:bg-gray-100 transition duration-300">
                    Reach Out
                </a>
            </div>
        </section>
    </div>
@endsection
