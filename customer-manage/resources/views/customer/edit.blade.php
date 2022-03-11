
<div class="form-group">
    <label>Tên khách hàng</label>
    <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" value="{{ $customer->email }}" required>
</div>
<div class="form-group">
    <label>Tỉnh thành</label>
    <select class="form-control" name="city_id">
        @foreach($cities as $city)
            <option
                    @if($customer->city_id == $city->id)
                    {{"selected"}}
                    @endif
                    value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select>
</div>
<button type="submit" class="btn btn-primary">Chỉnh sửa</button>
<button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
</form>
</div>
</div>
</div>
