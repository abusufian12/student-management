<select id="year" name="year" class="form-control ">
    {{ $last= date('Y')-30 }}
    {{ $now = date('Y') }}
    
    <option value="">---Select Year---</option>
    @for ($i = $now; $i >= $last; $i--)
        <option value="{{ $i }}">{{ $i }}</option>
    @endfor
</select>
