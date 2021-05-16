<div class="col-xl-3 col-lg-3 col-md-4 ">
    <div class="row">
        <div class="col-12">
            <div class="small-tittle mb-45">
                <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                        <path fill-rule="evenodd" fill="rgb(27, 207, 107)" d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"></path>
                    </svg>
                </div>
                <h4>Filter Product</h4>
            </div>
        </div>
    </div>
    <div class="category-listing mb-50">
        <div class="categories-wrapper">
            <div class="row">
                <div class="col-12">

                    <div class="select-categories">

                        <select name="select1">
                            @foreach ($categories as $category)
                            <option value="{{ asset('/products?category=' . $category->category_id) }}"><a href="{{ asset('/products?category=' . $category->category_id) }}">{{ $category->category_name }}</a></option>
                            @endforeach
                        </select>

                    </div>

                </div>

            </div>
        </div>

    </div>

</div>