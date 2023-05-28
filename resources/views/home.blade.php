<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PARCEL MANAGEMENT SYSTEM</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('script')
</head>

<body>
    @include('header')



    <section id="hero">
        <div class="hero-container">
            <div class="container py-3 bg-light" style="height:700px; width:90rem">
                <h2>parcel list</h2>
                <div class="md-6 mt-2 mx-5 d-flex align-items-center">
                    <h3 class="mb-3">{{ $user['name'] }} <span style="color: #e43c5c;"> ({{ $user['userid'] }})</span>
                    </h3>
                    <div class="float-end ms-auto">
                        <span class="fw-bold me-3">Parcel Status:</span>
                        <select class="" name="status" id="status" onchange="showTable(this.value)">
                            <option selected value="ready-parcel">Ready to Collect</option>
                            <option value="collected-parcel">Collected</option>
                        </select>
                    </div>
                </div>



                <table id="ready-parcel-table" class="table table-bordered mt-5" style="display: table;">
                    <thead>
                        <tr>
                            <th scope="col">Tracking Number</th>
                            <th data-sortable="true" scope="col">Arrived Date</th>
                            <th scope="col">Pick Up Location</th>
                            <th scope="col">Collect Pin</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($parcellist as $item)
                            @if ($item['status'] == 1)
                                <tr>
                                    <th>{{ $item['tracknum'] }}</th>
                                    <td>{{ $item['arrivedate'] }}</td>
                                    <td>{{ $item['apartment'] }}</td>
                                    <td>
                                        @if ($is_pin_shown && $showpin == $item['id'])
                                            {{ $item['collectpin'] }}
                                        @else
                                            <button type="button" class="btn btn-outline-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $item['id'] }}">
                                                Show Pin
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $item['id'] }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Verify
                                                                Password
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST"
                                                                action="{{ route('verify_password') }}">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item['id'] }}">
                                                                <div class="mb-3">
                                                                    <label for="password"
                                                                        class="form-label">Password</label>
                                                                    <input type="password" class="form-control"
                                                                        id="password" name="password">
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-outline-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                    @if ($errors->has('error'))
                        <div colspan="3" class="text-danger">{{ $errors->first('error') }}
                        </div>
                    @endif
                </table>

                <table id="collected-parcel-table" class="table table-bordered mt-5" style="display: none;">
                    <colgroup>
                        <col style="width: 33%;">
                        <col style="width: 33%;">
                        <col style="width: 33%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col">Tracking Number</th>
                            <th data-sortable="true" scope="col">Arrived Date</th>
                            <th scope="col">Collect Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parcellist as $item)
                            @if ($item['status'] == 2)
                                <tr>
                                    <th>{{ $item['tracknum'] }}</th>
                                    <td>{{ $item['arrivedate'] }}</td>
                                    <td>{{ $item['collectdate'] }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </section>

    <script>
        $(document).ready(function() {
            $('#ready-parcel-table').DataTable({
                order: [
                    [1, 'desc']
                ]
            });
        });


        function showTable(type) {
            // Hide all tables
            document.getElementById('ready-parcel-table').style.display = 'none';
            document.getElementById('collected-parcel-table').style.display = 'none';
            $('#ready-parcel-table').DataTable().destroy();
            $('#collected-parcel-table').DataTable().destroy();

            // Show the selected table
            document.getElementById(type + '-table').style.display = 'table';
            $(document).ready(function() {
                $('#' + type + '-table').DataTable({
                    order: [
                        [1, 'desc']
                    ]
                });
            });

            // Update dropdown button text
            document.getElementById('status').value = type;
        }
    </script>


</body>

</html>
