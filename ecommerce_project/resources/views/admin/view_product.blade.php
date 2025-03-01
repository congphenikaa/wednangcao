<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .table_deg {
            border: 2px solid greenyellow;
        }

        th {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }

        td{
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }

        .hidden {
        display: none;
        }

        input[type='search']{
            width: 500px;
            height: 60px;
            margin-left: 50px;
        }

    </style>
</head>

<body>

    <!-- Header-->
    @include('admin.header')
    <!--End Header-->
    <!--Sidebar-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <form action="{{url('product_search')}}" method="get">
                    @csrf
                    <input type="search" name="search">
                    <input type="submit" class="btn btn-secondary" value="Search">
                </form>

                <div class="div_deg">

                    <table class="table_deg">

                        <tr>

                            <th>Product Title</th>

                            <th>Description</th>

                            <th>Category</th>

                            <th>Price</th>

                            <th>Quantity</th>

                            <th>Image</th>

                            <th>Edit</th>

                            <th>Delete</th>
                        
                        </tr>

                        @foreach($product as $products)

                        <tr>

                            <td>{{$products->title}}</td>

                            <td>
                                <span id="shortDesc_{{ $products->id }}">
                                    {!! Str::limit($products->description, 50) !!}
                                </span>
                                <span id="fullDesc_{{ $products->id }}" class="hidden">
                                    {!! $products->description !!}
                                </span>
                                <button onclick="toggleDescription('{{ $products->id }}')" id="toggleDesc_{{ $products->id }}" class="text-blue-500 underline">
                                    Xem thêm
                                </button>
                            </td>

                            <td>{{$products->category}}</td>

                            <td>{{$products->price}}</td>

                            <td>{{$products->quantity}}</td>

                            <td>

                                <img height="120" width="120" src="products/{{$products->image}}" alt="">

                            </td>

                            <td>
                                <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a>
                            </td>
                            
                            <td>
                                <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                            </td>

                        </tr>

                        @endforeach
                    
                    </table>

                    

                </div>

                <div class="div_deg">

                    {{$product->onEachSide(1)->links()}}

                </div>

                

            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
    <script>
    function toggleDescription(id) {
        let shortDesc = document.getElementById("shortDesc_" + id);
        let fullDesc = document.getElementById("fullDesc_" + id);
        let btn = document.getElementById("toggleDesc_" + id);

        if (fullDesc.classList.contains("hidden")) {
            shortDesc.classList.add("hidden");
            fullDesc.classList.remove("hidden");
            btn.textContent = "Thu gọn";
        } else {
            shortDesc.classList.remove("hidden");
            fullDesc.classList.add("hidden");
            btn.textContent = "Xem thêm";
        }
    }
    </script>

    <script type="text/javascript">

    function confirmation(ev) {
        ev.preventDefault(); 

        var urlToRedirect = ev.currentTarget.getAttribute('href');

        swal({
            title: "Are You Sure to Delete This?",
            text: "This delete will be permanent",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = urlToRedirect;
            }
        });
    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>