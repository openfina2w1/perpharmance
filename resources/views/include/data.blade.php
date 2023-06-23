<select id="brand" class="select2" data-rel="chosen">
    <option>Brand</option>
    @foreach($productdetails as $productdetail_row)
        <option value="{{ $productdetail_row->proprietary_name }}">{{ $productdetail_row->proprietary_name }}</option>
    @endforeach
</select>