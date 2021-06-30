<!--
| @TITLE
| Select single item in form
|
|-------------------------------------------------------------------------------
| @REQUIRED
| $name is select name
| $items is list of items
| $label is select label
| $label is input lable
| $placehover is placehover text
| $errors is error name
| $description is description text
|
|÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
| @DESCRIPTION
|
|_______________________________________________________________________________
-->

<!--DATA-->
<?php
//name
$name = empty($name) ? 'undefined' : $name;

//items
$items = empty($items) ? [] : $items;

$checked = empty($checked) ? [] : $checked;

//value
$value = empty($value) ? $request->get($name) : $value;
// dd($value);
//label
$label = empty($label) ? '' : $label;

//place hover
$placehover = empty($placehover) ? $label : $placehover;

//eror
$errors = empty($errors) ? '' : $errors;

//description
$description = empty($description) ? '' : $description;

$href = empty($href) ? '' : $href;
?>
<!--/DATA-->

<!-- CATEGORY LIST -->
<div class="form-group">

    <!--element-->
    {!! Form::label($name, $label) !!}
    @if ($items)

        <ul class="list-group" style="height: 150px;overflow-y: scroll;border: 1px solid #ddd;border-radius: 4px;">

            @if ($checked)
                @foreach ($checked as $key => $item)

                    <label style="display: flex;justify-items: center;margin-bottom:0;">
                        <li class="list-group-item"
                            style="display: flex;justify-items: center;border: none;width:100%;">
                            {!! Form::checkbox($name . '[]', $key, true, ['placeholder' => $placehover, 'style' => 'margin-right: 1rem;']) !!}
                            {{ $item }}
                        </li>
                    </label>

                @endforeach
            @endif

            @foreach ($items as $key => $item)
                @if ($checked)
                    <?php if (array_key_exists($key, $checked)) continue; ?>
                @endif

                <label style="display: flex;justify-items: center;margin-bottom:0;">
                    <li class="list-group-item" style="display: flex;justify-items: center;border: none;width:100%;">
                        {!! Form::checkbox($name . '[]', $key, false, ['placeholder' => $placehover, 'style' => 'margin-right: 1rem;']) !!}
                        {{ $item }}
                    </li>
                </label>

            @endforeach

        </ul>
    @endif

    <!--description-->
    @if ($description)
        <span class='input-text-description'>
            <blockquote class="quote-card">
                <p>{!! $description !!}</p>
            </blockquote>
        </span>
    @endif

    <!--errors-->
    @if ($errors->has($name))
        <ul class='alert alert-danger error-item'>
            @foreach ($errors->get($name) as $error)
                @if ($error)
                    <li>
                        <span class='input-text-error'>{!! $error !!}</span>
                    </li>
                @endif
            @endforeach
        </ul>
    @endif
</div>
<!-- /CATEGORY LIST -->
