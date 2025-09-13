<x-app-layout title="Product Sales">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Sales') }}
        </h2>
    </x-slot>

    <div class="space-y-4 min-h-[calc(100vh-92px)] p-6">
        @if($sales->isEmpty())
            <div class="bg-gray-800/60 shadow rounded-lg p-6">
                <p class="text-gray-500 dark:text-gray-400">No sales found for your products yet.</p>
            </div>
        @else
            <div class="bg-gray-800/70 shadow rounded-lg p-6">
                <table class="w-full border-collapse text-left">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 border-b">Product</th>
                            <th class="px-4 py-2 border-b">Customer ID</th>
                            <th class="px-4 py-2 border-b">Amount</th>
                            <th class="px-4 py-2 border-b">Date</th>
                            <th class="px-4 py-2 border-b">Shipping</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sale)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-2 border-b">{{ $sale->product->name }}</td>
                                <td class="px-4 py-2 border-b">{{ $sale->customerID }}</td>
                                <td class="px-4 py-2 border-b">Rs. {{ number_format($sale->amount, 2) }}</td>
                                <td class="px-4 py-2 border-b">{{ $sale->salesDateTime }}</td>
                                <td class="px-4 py-2 border-b">{{ $sale->shippingMethod }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
