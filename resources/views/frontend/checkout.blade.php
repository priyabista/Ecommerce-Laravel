@extends('frontend.layouts.main')
@section('main-section')
    @extends('frontend.layouts.header')
    @extends('frontend.layouts.navbar')

    <div class="container">
        <div class="row">
            
            <div class="col-md-8">
                <form action="{{url('/')}}/place-order" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName" placeholder="John Doe" name="fullname" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="john@example.com" name="email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="123 Main St" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity" name="city" required>
                        </div>
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Place Order</button>
                
            </div>

            <div class=" card col-md-4 mt-3 py-2 position-relative">
                <table>
                    <thead>
                        <th>Product:</th>
                        <th>Price:</th>
                        <th>Total:</th>
                    </thead>
                    <tbody>
                        @php
                        $total=0;
                        @endphp
                    @foreach($cartProducts as $item)
                        @php   
                        $total += $item->quantity * $item->price
                        @endphp
                        <tr>
                            <input type="hidden" value="{{$item->id}}" name="card_id[]">
                            <input type="hidden" value="{{$item->name}}" name="product_name[]">
                            <td>{{$item->name}}<strong class="mx-2">X</strong>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->quantity * $item->price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="card col-md-12 position-absolute bottom-0 start-0">
                   Total:
                   <hr>
                   <h4>{{$total}}</h4>
                </div>
                </form> 
            </div>
            
        </div>
    </div>
@endsection
