<?php namespace Foostart\Slideshow\Validators;

use Foostart\Category\Library\Validators\FooValidator;
use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Foostart\Slideshow\Models\Style;

use Illuminate\Support\MessageBag as MessageBag;

class StyleValidator extends FooValidator
{

    protected $obj_style;

    public function __construct()
    {
        // add rules
        self::$rules = [
            'style_name' => ["required"],
            'style_view_file' => ["required"],
            'style_view_content' => ["required"],
        ];

        // set configs
        self::$configs = $this->loadConfigs();

        // model
        $this->obj_style = new Style();

        // language
        $this->lang_front = 'style-front';
        $this->lang_admin = 'style-admin';

        // event listening
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'style_name.required'          => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.name')]),
                'style_overview.required'      => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.overview')]),
                'style_description.required'   => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.description')]),
            ];
        });


    }

    /**
     *
     * @param ARRAY $input is form data
     * @return type
     */
    public function validate($input) {

        $flag = parent::validate($input);
        $this->errors = $this->errors ? $this->errors : new MessageBag();

        //Check length
        $_ln = self::$configs['length'];

        $params = [
            'name' => [
                'key' => 'style_name',
                'label' => trans($this->lang_admin.'.fields.name'),
                'min' => $_ln['style_name']['min'],
                'max' => $_ln['style_name']['max'],
            ],
        ];

        $flag = $this->isValidLength($input['style_name'], $params['name']) ? $flag : FALSE;

        return $flag;
    }


    /**
     * Load configuration
     * @return ARRAY $configs list of configurations
     */
    public function loadConfigs(){

        $configs = config('package-style');
        return $configs;
    }

}