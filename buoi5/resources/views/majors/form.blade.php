
<div class="mb-3 row">
    <label for="name_major" class="col-form-label text-lg-end col-lg-2 col-xl-3">Name Major</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('name_major') ? ' is-invalid' : '' }}" name="name_major" type="text" id="name_major" value="{{ old('name_major', optional($major)->name_major) }}" minlength="1" placeholder="Enter name major here...">
        {!! $errors->first('name_major', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

