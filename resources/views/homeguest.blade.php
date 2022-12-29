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
        <div class="hero-container"
            style="display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;">

            <div class="card overflow-auto" style="height:90rem; width:90rem">
                <div class="card-body">
                    <h3 class="card-title">Student List<span> | view</span></h3>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Project Title</th>
                                <th scope="col">Supervisor</th>
                                <th scope="col">Progress</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <th>{{ $item['studid'] }}</th>
                                    <td>{{ $item['studname'] }}</td>
                                    <td>{{ $item['title'] }}</td>
                                    <td>{{ $item['svid'] }}</td>
                                    <td>{{ $item['progress'] }}</td>
                                    <td>{{ $item['status'] }}</td>
                                </tr>
                            @endforeach
                            <div class="mx-auto pb-10 w-4/5">
                                {{ $list->links('pagination::bootstrap-5') }}
                            </div>

                        </tbody>
                    </table>

                </div><!-- End Content -->



            </div>
        </div>

    </section>

    <main id="main">





    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</body>

</html>
