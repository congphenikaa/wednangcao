<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h3>customer name : {{$data->name}}</h3>

        <h3>customer address : {{$data->rec_address}}</h3>

        <h3>Phone : {{$data->phone}}</h3>

        <h2>Product title : {{$data->product->title}}</h2>

        <h2>Price : {{$data->product->price}}</h2>

        <img height="250" width="300" src="products/ {{$data->product->image}}" alt="">
    </center>
</body>
</html>