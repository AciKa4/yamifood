<form action="@if($action == "products.update") {{ route($action, $product->id) }} @else {{ route($action) }} @endif" method="POST" enctype="multipart/form-data">
    @csrf
    @if($action == 'products.update')
        @method("PUT")
    @endif

    <div class="form-group">
        <label for="name">Name</label>
        <input class="formcontrol" id="name" name="name" value="{{ $product->name ?? old('name') }}"/>
        @error('name')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description" class="">Description</label> </br>
        <textarea class="formcontrol w-50" name="description" id="description" rows="5">{{ $product->description ?? old('description') }}</textarea>
        @error('description')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        {{-- <input class="formcontrol" id="price" name="price" value="{{ old('price') ?? $product-
        >prices[count($product->prices) - 1]->price }}" /> --}}
        <input class="formcontrol" id="price" name="price" value="@if(isset($product)) {{ $product->price}} @else {{ old('price') }} @endif" />
        @error('price')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control w-25" name="category_id" id="category_id">@foreach($categories as $category)
                <option value="{{ $category->id }}" @if(isset($product) && $category->id == $product->category_id) selected="selected" @endif >{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="gender">Active</label>
        <div class="radio">
            <input type="radio" name="is_active" id="active_yes" value="1" @if(isset($product) && $product->is_active == 1) checked @endif/> Yes</div>
        <div class="radio">
            <input type="radio" name="is_active" value="0" @if(isset($product) && $product->is_active == 0) checked @endif /> No
        </div>
        @error('is_active')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>


    <div class="form-group">
        <dl class="dropdown ">
            <dt>
                <a href="#">
                    <span class="hida">Ingredients:</span>
                    <p class="multiSel"></p>
                </a>
            </dt>
            <dd>
                <div class="mutliSelect">
                    <ul>
                        @if(isset($product))
                            @foreach($product->ingredients as $ingProduct)
                                @php $arrayProduct[]=$ingProduct->id @endphp
                            @endforeach
                        @endif
                        @foreach($ingredients as $key => $in)
                            <li>
                                <input type="checkbox" name="ingredients[]" value="{{$in->id}}" @if(isset($product) && in_array($in->id,$arrayProduct)) checked @endif>{{$in->name}}
                            <li>
                        @endforeach
                    </ul>
                </div>
            </dd>
        </dl>
        @error('ingredients')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>


    <div class="form-group ">
        <label for="image">@if(isset($product)) {{$product->image}} @endif</label> </br>
        <input type="file" name="image" id="image" />
        @error('image')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
