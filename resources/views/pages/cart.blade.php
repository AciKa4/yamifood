@extends("layouts.layout")

@section("keywords") Food,delivery,contact,yami,order @endsection


@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection

@section("content")

    <div class="container-xl-lg">

        @if(count($products) > 0)

            <div id="cartDiv" id="order">
                <div class="checkout-right table-responsive">
                    <h4 class="text-center py-4">Your order contains:
                        <span id="prodNumber">{{ count($products) }} Products</span></h4>
                    <table class="table w-75 mx-auto">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php
                            $total = 0;
                        @endphp

                        @foreach($products as $key => $product)
                            @php
                                $total+=$product->quantity*$product->price;
                            @endphp
                            <tr class="rem1" id="row{{$product->id}}">
                                <td class="invert">{{ $key + 1 }}</td>
                                <td class="invert-image">
                                    <a href="{{ route('product.show',['id' => $product->id]) }}">
                                        <img src="{{asset("assets/img/products/$product->image")}}" alt="Product {{ $product->name }}" class="img-responsive" />
                                    </a>
                                </td>
                                <td>
                                    <input type="number" class="formcontrol quantity" data-productid="{{ $product->id }}" value="{{ $product->quantity }}" />
                                </td>
                                <td class="">{{ $product->name }} </td>
                                <td class="">$<span id="priceProduct{{ $product->id}}">{{ $product->price }}</span></td>
                                <td class="">
                                    <div class="rem">
                                        <div class="text-center removeProductFromCart" data-productid="{{ $product->id }}"><i class="fa fa-trash" aria-hidden="true"></i> </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <div class="my-4 text-center ">
                        <h2 id="priceParent" >Total: $<span id="totalPrice">{{ $total }}</span></h2>
                        <h2 id="msg" class="alert alert-success w-50 mx-auto"></h2>
                    </div>
                </div>




                <div class="contact-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading-title text-center">
                                    <h2>Order</h2>
                                    <p>Add order details</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="contactForm" method="POST" action="">
                                    @csrf
                                    <input type="hidden" id="user-id" value="{{ session()->get('user')->id }}"/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="controllabel">Full name: </label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{session()->get("user")->first_name.' '. session()->get("user")->last_name  }}" }>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Mobile number:</label>
                                               <input type="text" class="form-control"  placeholder="Mobile number" id="phone" name="phone" />
                                                <small id="phoneHelp" class="form-text text-muted mt-2 mb-2">Example: +38162654868 </small>
                                                <div id="phoneError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="controllabel">Address: </label>
                                                <input type="text" class="form-control" placeholder="Address" id="address" name="address"/>
                                                <div id="addressError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="controllabel">City: </label>
                                                <input type="text" class="form-control" id="city"  placeholder="City" name="city"/>
                                                <div id="cityError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="submit-button text-left col-md-12">
                                                </br>
                                                <button type="submit" class="btn btn-common" id="submitOrder" name="submitOrder">Submit</button>
                                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>







                @else
                    <div class="col-12 text-center cartDiv" id="emptyOrder">
                        <div class='mx-auto d-flex w-75'><img class=' w-50 mx-auto' src='{{asset("assets/img/emptycart.png")}}' alt='Your order is empty'></div><h1 class='py-3'>Your order is empty</h1>
                    </div>
                @endif
    </div>

@endsection

@section("scriptsForPage")
    <script src="{{asset('assets/js/cart.js')}}"></script>
    <script src="{{asset('assets/js/orders.js')}}"></script>
@endsection
