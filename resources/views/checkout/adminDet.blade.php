<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>
    <table class="table table-striped-columns">
        <tr>
            <th>
                No
            </th>
            <th>
                Nama
            </th>
            <th>
                Reference
            </th>
            <th>
                Merchant Ref
            </th>
            <th>
                Amount
            </th>
            <th class="text-center">
                Status
            </th>
        </tr>
        @foreach ($transaction as $trans)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $trans->User->name }}</td>
                <td>{{ $trans->reference }}</td>
                <td>{{ $trans->merchant_ref }}</td>
                <td>{{ $trans->amount }}</td>
                @if ($trans->status == 'paid')
                <td class="text-center"><span class="bg-success text-white  p-1 rounded text-uppercase">{{ $trans->status }}</span></td>
                
                @else
                <td class="text-center"><span class="bg-danger text-white  p-1 rounded text-uppercase">{{ $trans->status }}</span></td>
                    
                @endif
            </tr>
        @endforeach
    </table>
</x-app-layout>