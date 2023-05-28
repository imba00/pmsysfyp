<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Parcel Management System Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">



    @include('admin.script')
</head>

<body>

    @include('admin.header')

    @include('admin.adminsidebar')

    <main id="main" class="main">
        <section class="section ">
            <!-- Content -->
            <div class="card overflow-auto">
                <div class="card-body" style="width:90rem">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title float-start">Parcel List<span class="mx-3"
                                    style="font-weight: bold; text-transform: uppercase; color: #012987">|
                                    {{ $apartment }}</span></h5>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="float-end">
                                <span class="fw-bold me-3">Parcel Status:</span>
                                <select class="" name="status" id="status" onchange="showTable(this.value)">
                                    <option selected value="ready">Ready to Collect</option>
                                    <option value="collected">Collected</option>
                                    <option value="all">All</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <table id="all-table" class="table table-bordered" style="display: none;">
                        <thead>
                            <tr>
                                <th scope="col">Parcel ID</th>
                                <th scope="col">Tracking Number</th>
                                <th scope="col">Resident ID</th>
                                <th scope="col" class="text-center">Phone Number</th>
                                <th scope="col" class="text-center">Arrive Date</th>
                                <th scope="col" class="text-center">Collect Date</th>
                                <th scope="col" class="text-center">Pick-up Location</th>
                                <th scope="col" class="text-center">Parcel Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parcellist as $item)
                                <tr>
                                    <th>{{ $item['parid'] }}</th>
                                    <th>{{ $item['tracknum'] }}</th>
                                    <td>{{ $item['studid'] }}</th>
                                    <td class="text-center">{{ $item['phoneno'] }}</td>
                                    <td class="text-center">{{ $item['arrivedate'] }}</td>
                                    <td class="text-center">{{ $item['collectdate'] }}</td>
                                    <td class="text-center">{{ $item['apartment'] }}</td>
                                    <td>
                                        @if ($item['status'] == 1)
                                            Ready to Pickup
                                        @elseif ($item['status'] == 2)
                                            Collected
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table id="ready-table" class="table table-bordered" style="display: table;">
                        <thead>
                            <tr>
                                <th scope="col">Parcel ID</th>
                                <th scope="col">Tracking Number</th>
                                <th scope="col">Resident ID</th>
                                <th scope="col" class="text-center">Phone Number</th>
                                <th scope="col" class="text-center">Arrive Date</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parcellist as $item)
                                @if ($item['apartment'] === $apartment)
                                    @if ($item['status'] == 1)
                                        <tr>
                                            <th>{{ $item['parid'] }}</th>
                                            <th>{{ $item['tracknum'] }}</th>
                                            <td>{{ $item['studid'] }}</th>
                                            <td class="text-center">{{ $item['phoneno'] }}</td>
                                            <td class="text-center">{{ $item['arrivedate'] }}</td>
                                            <td>
                                                <div class="flex justify-center space-x-1">
                                                    <button onClick="location.href='{{ ' parcol/' . $item['id'] }}'"
                                                        class="fa-solid fa-lock bg-gray-300 p-2 rounded-full"
                                                        title="Show Pin"></button>
                                                    <button
                                                        onClick="location.href='{{ ' updateparform/' . $item['id'] }}'"
                                                        class="fa-solid fa-pen-to-square bg-gray-300 p-2 rounded-full"
                                                        title="Edit Data"></button>
                                                    <button
                                                        onClick="if(confirm('Are you sure you want to delete this data?')){ location.href='{{ 'dltpar/' . $item['id'] }}' }"
                                                        class="fa-solid fa-trash bg-gray-300 p-2 rounded-full"
                                                        title="Delete Data"></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <table id="collected-table" class="table table-bordered" style="display: none;">
                        <thead>
                            <tr>
                                <th scope="col">Parcel ID</th>
                                <th scope="col">Tracking Number</th>
                                <th scope="col">Resident ID</th>
                                <th scope="col" class="text-center">Phone Number</th>
                                <th scope="col" class="text-center">Collect Date</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parcellist as $item)
                                @if ($item['apartment'] === $apartment)
                                    @if ($item['status'] == 2)
                                        <tr>
                                            <th>{{ $item['parid'] }}</th>
                                            <th>{{ $item['tracknum'] }}</th>
                                            <td>{{ $item['studid'] }}</th>
                                            <td class="text-center">{{ $item['phoneno'] }}</td>
                                            <td class="text-center">{{ $item['collectdate'] }}</td>
                                            <td>
                                                <div class="flex justify-center space-x-1">
                                                    <button
                                                        onClick="location.href='{{ ' updateparform/' . $item['id'] }}'"
                                                        class="fa-solid fa-pen-to-square bg-gray-300 p-2 rounded-full"
                                                        title="Edit Data"></button>
                                                    <button
                                                        onClick="if(confirm('Are you sure you want to delete this data?')){ location.href='{{ 'dltpar/' . $item['id'] }}' }"
                                                        class="fa-solid fa-trash bg-gray-300 p-2 rounded-full"
                                                        title="Delete Data"></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Content -->
            </div>
        </section>
    </main><!-- End #main -->


    <script>
        $(document).ready(function() {
            $('#ready-table').DataTable({
                order: [
                    [4, 'desc']
                ]
            });
        });

        function showTable(type) {
            // Hide all tables
            document.getElementById('ready-table').style.display = 'none';
            document.getElementById('collected-table').style.display = 'none';
            document.getElementById('all-table').style.display = 'none';
            $('#ready-table').DataTable().destroy();
            $('#collected-table').DataTable().destroy();
            $('#all-table').DataTable().destroy();

            // Show the selected table
            var tableId = type + '-table';
            document.getElementById(tableId).style.display = 'table';
            $(document).ready(function() {
                var dataTable = $('#' + tableId).DataTable({
                    order: [
                        [4, 'desc']
                    ]
                });

                // Apply filtering based on pick-up location
                if (type === 'all') {
                    var select = $('<select><option value="">All</option></select>')
                        .appendTo('.dataTables_filter')
                        .on('change', function() {
                            dataTable.column(6).search($(this).val()).draw();
                        });

                    select.wrap('<label>Pick-up Location: </label>');

                    dataTable
                        .column(6)
                        .data()
                        .unique()
                        .sort()
                        .each(function(value, index) {
                            select.append('<option value="' + value + '">' + value + '</option>');
                        });
                }
            });

            // Update dropdown button text
            document.getElementById('status').value = type;
        }
    </script>
</body>

</html>
