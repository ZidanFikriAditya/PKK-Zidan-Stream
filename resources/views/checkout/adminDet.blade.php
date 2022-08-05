<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Category') }}
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ms-auto bg-warning p-1 rounded " style="cursor: pointer" id="print" onclick="myFunction()">
                {{ __('Print') }}
            </h2>
        </div>
        
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
        {{ $transaction->links() }}
    </table>
    <script>
        function myFunction(){
            window.print()
        }
    </script>
</x-app-layout>