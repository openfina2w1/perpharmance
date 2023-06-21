@if($sidebar == 'default-sidebar')

@else
    @foreach($productdetails as $productdetail_row)
        <li class="dropdown-item" href="#">{{ $productdetail_row->proprietary_name }}</li>
    @endforeach
@endif