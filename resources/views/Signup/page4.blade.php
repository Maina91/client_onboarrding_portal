@extends('layouts.registration_layout')

@section('content')
    <div class="container mx-auto mt-10 p-4">
        <!-- Deposit Card -->
        <div class="bg-white p-6 shadow-lg rounded-lg max-w-xl mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center">Make a Deposit</h2>

            <!-- Source of Funds and Amount to Invest -->
            <form action="" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="source-of-funds" class="block text-lg font-semibold mb-2">Source of Funds</label>
                    <input type="text" id="source-of-funds" name="source_of_funds"
                        class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter Source of Funds" required>
                </div>

                <div class="mb-6">
                    <label for="amount-to-invest" class="block text-lg font-semibold mb-2">Amount to Invest</label>
                    <input type="number" id="amount-to-invest" name="amount_to_invest"
                        class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter Amount to Invest" required>
                </div>

                <!-- Payment Method Selection -->
                <div class="mb-6">
                    <label class="block text-lg font-semibold mb-2">Choose Payment Method</label>
                    <div class="flex space-x-4">
                        <!-- Bank Payment Card -->
                        <div class="w-1/2 cursor-pointer bg-gray-100 p-4 rounded-lg hover:shadow-lg transition">
                            <img src="https://via.placeholder.com/100x60?text=Bank" alt="Bank"
                                class="w-full h-20 object-cover mb-4 rounded-lg">
                            <p class="text-center text-sm font-medium">Bank</p>
                        </div>

                        <!-- M-Pesa Payment Card -->
                        <div class="w-1/2 cursor-pointer bg-gray-100 p-4 rounded-lg hover:shadow-lg transition">
                            <img src="https://via.placeholder.com/100x60?text=M-Pesa" alt="M-Pesa"
                                class="w-full h-20 object-cover mb-4 rounded-lg">
                            <p class="text-center text-sm font-medium">M-Pesa</p>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 px-4 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">Proceed
                    to Payment</button>
            </form>
        </div>
    </div>
@endsection
