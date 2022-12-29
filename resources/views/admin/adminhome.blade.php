<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
            <div class="col-12">
                <div class="card overflow-auto">
                    <div class="card-body" style="height:500px; width:90rem">
                        <h5 class="card-title">Student List<span>| view</span></h5>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Project Title</th>
                                    <th scope="col">Supervisor</th>
                                    <th scope="col">Progress</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Examiner</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <th>{{ $item['studid'] }}</th>
                                        <td>{{ $item['studname'] }}</td>
                                        <td>{{ $item['title'] }}</td>
                                        <td>
                                            @foreach ($lectlist as $sv)
                                                @if ($sv['lectid'] == $item['svid'])
                                                    {{ $sv['name'] }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $item['progress'] }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>
                                            @foreach ($lectlist as $sv)
                                                @if ($sv['lectid'] == $item['ex1'])
                                                    {{ $sv['name'] }}
                                                @endif
                                            @endforeach,
                                            @foreach ($lectlist as $sv)
                                                @if ($sv['lectid'] == $item['ex2'])
                                                    {{ $sv['name'] }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td><button onClick="location.href='{{ ' updlist/' . $item['id'] }}'"
                                                class="fa-solid fa-pen-to-square btn btn-light" title="edit data">
                                            </button>
                                            <button onClick="location.href='{{ ' dltlist/' . $item['id'] }}'"
                                                class="btn btn-light fa-solid fa-trash" title="delete data">
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                <div class="mx-auto pb-10 w-4/5">
                                    {{ $list->links() }}
                                </div>

                            </tbody>
                        </table>

                    </div><!-- End Content -->



                </div>
            </div>
        </section>

    </main><!-- End #main -->
</body>

</html>
