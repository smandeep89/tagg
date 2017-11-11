@if (count($errors) > 0)
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group{{ $errors->has('org_name') ? ' has-error' : '' }}">
    <label for="org_name" class="col-md-4 control-label">Business Name <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

    <div class="col-md-6">
        <input id="org_name" type="text" class="form-control" name="org_name" value="{{ old('org_name') }}"  required autofocus>

        @if ($errors->has('org_name'))
            <span class="help-block">
                <strong>{{ $errors->first('org_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('org_description') ? ' has-error' : '' }}">
    <label for="org_description" class="col-md-4 control-label">Business Description</label>

    <div class="col-md-6">
        <input id="org_description" type="text" class="form-control" name="org_description" value="{{ old('org_description') }}" autofocus>

        @if ($errors->has('org_description'))
            <span class="help-block">
                <strong>{{ $errors->first('org_description') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('organization_type_id') ? ' has-error' : '' }}">
    <label for="org_description" class="col-md-4 control-label"> Business Type <span
                style="color: red; font-size: 20px; vertical-align:middle;">*</span>
    </label>

    <div class="col-md-6">
        {!! Form::select('organization_type_id', array(null => 'Select...') + $Organization_types->all(), null, ['class'=>'form-control']) !!}
        @if ($errors->has('organization_type_id'))
            <span class="help-block">
                                        <strong>{{ $errors->first('organization_type_id') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('street_address1') ? ' has-error' : '' }}">
    <label for="street_address1" class="col-md-4 control-label">Street Address 1 <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

    <div class="col-md-6">
        <input id="street_address1" type="text" class="form-control" name="street_address1" value="{{ old('street_address1') }}"  required autofocus>

        @if ($errors->has('street_address1'))
            <span class="help-block">
                <strong>{{ $errors->first('street_address1') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('street_address2') ? ' has-error' : '' }}">
    <label for="street_address2" class="col-md-4 control-label">Street Address 2 </label>

    <div class="col-md-6">
        <input id="street_address2" type="text" class="form-control" name="street_address2" value="{{ old('street_address2') }}" autofocus>

        @if ($errors->has('street_address2'))
            <span class="help-block">
                <strong>{{ $errors->first('street_address2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    <label for="city" class="col-md-4 control-label">City <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

    <div class="col-md-6">
        <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}"  required autofocus>

        @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
    <label for="state" class="col-md-4 control-label">State <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

    <div class="col-md-6">
        {!! Form::select('state', array(null => 'Select...') + $states->all(), null, ['class'=>'form-control']) !!}
        @if ($errors->has('state'))
            <span class="help-block">
                <strong>{{ $errors->first('state') }}</strong>
            </span>
        @endif
    </div>

</div>

<div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
    <label for="zipcode" class="col-md-4 control-label">Zip Code <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

    <div class="col-md-6">
        <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}"  required autofocus>

        @if ($errors->has('zipcode'))
            <span class="help-block">
                <strong>{{ $errors->first('zipcode') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
    <label for="phone_number" class="col-md-4 control-label">Phone Number <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

    <div class="col-md-6">
        <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}"  required autofocus>

        @if ($errors->has('phone_number'))
            <span class="help-block">
                <strong>{{ $errors->first('phone_number') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('organizations.index')}}" class="btn btn-primary">Cancel</a>
        <span style="color: red"> <h5>Fields Marked With (<span style="color: red; font-size: 20px; vertical-align:middle;">*</span>) Are Mandatory</h5></span>
    </div>
</div>
