<!------------------------------------------------------------------------------
| List of elements in style form
|------------------------------------------------------------------------------->

{!! Form::open(['route'=>['styles.post', 'id' => @$item->id],  'files'=>true, 'method' => 'post'])  !!}

    <!--BUTTONS-->
    <div class='btn-form'>
        <!-- DELETE BUTTON -->
        @if($item)
            <a href="{!! URL::route('styles.delete',['id' => @$item->id, '_token' => csrf_token()]) !!}"
            class="btn btn-danger pull-right margin-left-5 delete">
                {!! trans($plang_admin.'.buttons.delete') !!}
            </a>
        @endif
        <!-- DELETE BUTTON -->

        <!-- SAVE BUTTON -->
        {!! Form::submit(trans($plang_admin.'.buttons.save'), array("class"=>"btn btn-info pull-right ")) !!}
        <!-- /SAVE BUTTON -->
    </div>
    <!--/BUTTONS-->

    <!--TAB MENU-->
    <ul class="nav nav-tabs">
        <!--MENU 1-->
        <li class="active">
            <a data-toggle="tab" href="#menu_1">
                {!! trans($plang_admin.'.tabs.menu_1') !!}
            </a>
        </li>

        <!--MENU 2-->
        <li>
            <a data-toggle="tab" href="#menu_2">
                {!! trans($plang_admin.'.tabs.menu_2') !!}
            </a>
        </li>

        <!--MENU 3-->
        <li>
            <a data-toggle="tab" href="#menu_3">
                {!! trans($plang_admin.'.tabs.menu_3') !!}
            </a>
        </li>
    </ul>
    <!--/TAB MENU-->

    <!--TAB CONTENT-->
    <div class="tab-content">

        <!--MENU 1-->
        <div id="menu_1" class="tab-pane fade in active">

            <!--STYLE NAME-->
            @include('package-category::admin.partials.input_text', [
                'name' => 'style_name',
                'label' => trans($plang_admin.'.labels.name-style'),
                'value' => @$item->style_name,
                'description' => trans($plang_admin.'.descriptions.name-style'),
                'errors' => $errors,
            ])
            <!--/STYLE NAME-->

            <!--VIEW FILE-->
            @include('package-category::admin.partials.input_text', [
                'name' => 'style_view_file',
                'label' => trans($plang_admin.'.labels.view-file'),
                'value' => @$item->style_view_file,
                'description' => trans($plang_admin.'.descriptions.view-file'),
                'errors' => $errors,
            ])
            <!--/VIEW FILE-->

            <!--VIEW CONTENT-->
            @include('package-category::admin.partials.textarea', [
                'name' => 'style_view_content',
                'label' => trans($plang_admin.'.labels.view-content'),
                'value' => @$item->style_view_content,
                'description' => trans($plang_admin.'.descriptions.view-content'),
                'tinymce' => false,
                'rows' => 30,
                'errors' => $errors,
            ])
            <!--/VIEW CONTENT-->

        </div>

        <!--MENU 2-->
        <div id="menu_2" class="tab-pane fade">


        </div>

        <!--MENU 3-->
        <div id="menu_3" class="tab-pane fade">
            <!--STYLE IMAGE-->
            @include('package-category::admin.partials.input_image', [
                'name' => 'style_image',
                'label' => trans($plang_admin.'.labels.image'),
                'value' => @$item->style_image,
                'description' => trans($plang_admin.'.descriptions.style-image'),
                'errors' => $errors,
            ])
            <!--/STYLE IMAGE-->

            <!--JS FILES-->
            @include('package-category::admin.partials.input_files', [
                'name' => 'js-file',
                'id' => 'js-file',
                'label' => trans($plang_admin.'.labels.js-file'),
                'value' => @$item->style_js_file,
                'description' => trans($plang_admin.'.descriptions.js-file'),
                'errors' => $errors,
            ])
            <!--/JS FILES-->

            <!--JS FILES-->
            @include('package-category::admin.partials.input_files', [
                'name' => 'css-file',
                'id' => 'css-file',
                'label' => trans($plang_admin.'.labels.css-file'),
                'value' => @$item->style_css_file,
                'description' => trans($plang_admin.'.descriptions.css-file'),
                'errors' => $errors,
            ])
            <!--/JS FILES-->
        </div>

    </div>
    <!--/TAB CONTENT-->

    <!--HIDDEN FIELDS-->
    <div class='hidden-field'>
        {!! Form::hidden('id',@$item->id) !!}
        {!! Form::hidden('context',$request->get('context',null)) !!}
    </div>
    <!--/HIDDEN FIELDS-->

{!! Form::close() !!}
<!------------------------------------------------------------------------------
| End list of elements in style form
|------------------------------------------------------------------------------>