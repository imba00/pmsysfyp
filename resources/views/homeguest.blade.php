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

            <div class="card overflow-auto" style="height:500px; width:90rem">
                <div class="card-body">
                    <h3 class="card-title">Parcel List<span> | view</span></h3>

                    <table style="margin-top: 10px" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Tracking Number</th>
                                <th scope="col">Student ID</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Apartment</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <th>{{ $item['tracknum'] }}</th>
                                    <th>{{ $item['studid'] }}</th>
                                    <td>{{ $item['phoneno'] }}</td>
                                    <td>{{ $item['apartment'] }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['status'] }}</td>

                                    <td><button type="submit" class="btn btn-outline-dark" title="edit data">UPDATE
                                        </button>
                                    </td>
                                    </form>
                                </tr>
                            @endforeach
                            <div class="mx-auto pb-10 w-4/5">
                                {{-- {{ $list->links('pagination::bootstrap-5') }} --}}
                            </div>


                        </tbody>
                    </table>

                </div><!-- End Content -->



            </div>
        </div>

    </section>
</body>

</html>
