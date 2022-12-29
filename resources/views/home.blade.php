<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FYP Manager</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('script')
</head>

<body>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>


    <script>
        function removeduplicate() {
            var mycode = {};
            $("select[id='mylist'] > option").each(function() {
                if (mycode[this.text]) {
                    $(this).remove();
                } else {
                    mycode[this.text] = this.value;
                }
            });
        }
    </script>
    @include('header')



    <section id="hero">
        <div class="hero-container">
            <div class="container py-10 bg-light">

                <h2>profile</h2>
                <h3>Student <span style="color: #e43c5c;"> Info</span></h3>


                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Project Title</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <th>{{ $item['studid'] }}</th>
                                <td>{{ $item['studname'] }}</td>
                                <td>{{ $item['title'] }}</td>
                                <form action="/editsv" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <input type="hidden" name="studname" value="{{ $item['studname'] }}">
                                    <input type="hidden" name="studid" value="{{ $item['studid'] }}">
                                    <input type="hidden" name="title" value="{{ $item['title'] }}">
                                    <input type="hidden" name="svid" value="{{ $item['svid'] }}">
                                    <input type="hidden" name="duration" value="{{ $item['duration'] }}">
                                    <input type="hidden" name="sdate" value="{{ $item['sdate'] }}">
                                    <input type="hidden" name="edate" value="{{ $item['edate'] }}">
                                    <input type="hidden" name="ex1" value="{{ $item['ex1'] }}">
                                    <input type="hidden" name="ex2" value="{{ $item['ex2'] }}">
                                    <td>
                                        <div class="">
                                            <input type="text" name="progress" class="form-control" id="progress"
                                                required value="{{ $item['progress'] }}">
                                        </div>
                                    </td>
                                    <td>

                                        <div class="">
                                            <input type="text" name="status" class="form-control" id="status"
                                                required value="{{ $item['status'] }}">
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <select class="form-select" id="mylist" aria-label="Default select example">
                                            <option selected value="{{ $item['progress'] }}">{{ $item['progress'] }}
                                            </option>
                                            <option value="Milestone 1">Milestone 1</option>
                                            <option value="Milestone 2">Milestone 2</option>
                                            <option value="Final Report">Final Report</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>{{ $item['status'] }}</option>
                                            <option value="On track">On track</option>
                                            <option value="Delayed">Delayed</option>
                                            <option value="Extended">Extended</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </td> --}}

                                    <td><button type="submit" class="btn btn-outline-dark" title="edit data">UPDATE
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        <div class="mx-auto pb-10 w-4/5">
                            {{ $list->links('pagination::bootstrap-5') }}
                        </div>

                    </tbody>
                </table>


            </div>
        </div>

    </section>

    <main id="main">





    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</body>

</html>
