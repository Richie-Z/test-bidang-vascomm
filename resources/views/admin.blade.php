@extends('layout.admin')

@section('here')
    <div class="bg-white p-8 rounded-md w-full">
        <div class=" flex items-center justify-between pb-6">
            <div>
                <h2 class="text-gray-600 font-semibold">Customers</h2>
                <span class="text-xs">List of customers</span>
            </div>
        </div>
        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">

                <table class="min-w-full leading-normal" id="customer-table">
                    <thead>
                        <tr>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Username
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Option
                            </th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#customer-table').DataTable({
            processing: true,
            serverSide: true,
            "columnDefs": [{
                "width": "30%",
                "targets": 0
            }],
            ajax: '{{ route('getCustomers') }}',
            columns: [{
                    data: 'name',
                    name: 'name',
                    render: function(data, type, row) {
                        return `
                         <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-full h-full rounded-full"
                                                    src="{{ asset('customers') }}/${row['image']}"
                                                    alt="" />
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    ${data}
                                                </p>
                                            </div>
                                        </div>`;
                    },
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'is_approved',
                    name: 'is_approved',
                    render: function(data, type, row) {
                        return `
                         <span class="relative inline-block px-3 py-1 font-semibold leading-tight ${data ? 'text-green-900' : 'text-red-900'}">
                                            <span aria-hidden
                                                class="absolute inset-0 opacity-50 rounded-full ${ data ? '!bg-green-200' : '!bg-red-200' }"></span>
                                            <span class="relative">${ data ? 'Approved' : 'Not Approved' }</span>
                                        </span>`;
                    },
                },
                {
                    name: 'option',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                         <a href="{{ url('admin/') }}/${row['id']}"
                                            class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-indigo-600 ml-0 md:ml-4 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-indigo-500 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-indigo-600" >Detail</a>
                        <a href="{{ url('admin') }}/${ row['is_approved'] ? 'revoke' : 'approve' }/${row['id']}"
                                            class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white  ml-0 md:ml-4 md:px-3 md:w-auto md:rounded-full lg:px-5 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-indigo-600 ${row['is_approved'] ? "bg-red-600  hover:bg-red-500" : "bg-green-600 hover:bg-green-500"}">${ row['is_approved'] ? 'Revoke' : 'Approve' }</a>`;
                    },
                },
            ]
        });
    </script>
@endsection
