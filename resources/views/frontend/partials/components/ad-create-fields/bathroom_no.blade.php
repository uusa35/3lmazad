<div class="form-group">
        <label for="bathroom_no" class="control-label col-sm-3">{{ trans('general.bathroom_no') }}</label>
        <div class="col-sm-9">
            <select id="bathroom_no" name="bathroom_no" class="form-control">
                <option value="area">{{ trans('general.bathroom_no') }}</option>
                @for($i=1;$i <= 5;$i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
</div>