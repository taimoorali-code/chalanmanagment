<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chalan Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($chalans as $chalan)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <div class="grid grid-cols-5 gap-4">
                            <!-- Rule Name Column -->
                            <div class="flex items-center">
                                <strong>Rule Name:</strong>
                                <span class="ml-2">{{ $chalan->rule->name ?? 'N/A' }}</span>
                            </div>
                            
                            <!-- Rule Amount Column -->
                            <div class="flex items-center">
                                <strong>Amount:</strong>
                                <span class="ml-2">${{ number_format($chalan->rule->amount ?? 0, 2) }}</span>
                            </div>
                            
                            <!-- Rule Status Column -->
                            <div class="flex items-center">
                                <strong>Status:</strong>
                                <span class="ml-2">{{ ucfirst($chalan->status) }}</span>
                            </div>
    
                            <!-- Description Column -->
                            <div class="flex items-center">
                                <strong>Description:</strong>
                                <span class="ml-2">{{ $chalan->rule->description }}</span>
                            </div>
    
                            <!-- Action Button Column (Aligned to the Right) -->
                            <div class="flex items-center justify-end">
                                <a href="{{ route('chalan.view', ['id' => $chalan->id]) }}" 
                                    style="background-color: #3b82f6; color: white; font-weight: 600; padding: 8px 16px; border-radius: 8px; display: inline-block; text-align: center;"
                                    onmouseover="this.style.backgroundColor='#2563eb'"
                                    onmouseout="this.style.backgroundColor='#3b82f6'">
                                    {{ $chalan->status === 'pending' ? 'Pay' : 'View' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
</x-app-layout>
