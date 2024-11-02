<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Challan Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Challan Details</h3>
                    <div class="grid grid-cols-4 gap-4">
                        <!-- Display Challan Details -->
                        <div><strong>Rule Name:</strong> &nbsp; {{ $chalan->rule->name ?? 'N/A' }}</div>
                        <div><strong>Amount:</strong> &nbsp; ${{ number_format($chalan->rule->amount, 2) }}</div>
                        <div><strong>Status:</strong> &nbsp; {{ ucfirst($chalan->status) }}</div>
                        <div><strong>Payment Proof:</strong> 
                            @if($chalan->payment_proof !== "null")
                            &nbsp;   <a href="{{ asset('storage/' . $chalan->payment_proof) }}" target="_blank">View Proof</a>
                            @else
                              &nbsp;  Not provided
                            @endif
                        </div>
                    </div>
                    <hr class="my-4">
                    
                    <!-- File Upload Form for Payment Proof -->
                    <form action="{{ route('chalan.uploadPaymentProof', $chalan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="payment_proof" class="block mb-2 text-sm font-medium text-gray-700">Upload Payment Proof</label>
                        <input type="file" name="payment_proof" id="payment_proof" accept="image/*,application/pdf" class="block w-full text-sm text-gray-700">
                        @error('payment_proof')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <button type="submit" style="background-color: #3b82f6; color: white; padding: 10px 20px; border-radius: 8px; margin-top: 10px;">
                            Submit Payment Proof
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
