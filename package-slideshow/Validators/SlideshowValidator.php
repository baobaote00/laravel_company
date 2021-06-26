<?php namespace Foostart\Slideshow\Validators;

use Foostart\Category\Library\Validators\FooValidator;
use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Foostart\Slideshow\Models\Slideshow;

use Illuminate\Support\MessageBag as MessageBag;

class SlideshowValidator extends FooValidator
{

    protected $obj_slideshow;

    public function __construct()
    {
        // add rules
        self::$rules = [
            'slideshow_name' => ["required"],
            'slideshow_overview' => ["required"],
            'slideshow_description' => ["required"],
        ];

        // set configs
        self::$configs = $this->loadConfigs();

        // model
        $this->obj_slideshow = new Slideshow();

        // language
        $this->lang_front = 'slideshow-front';
        $this->lang_admin = 'slideshow-admin';

        // event listening
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'slideshow_name.required'          => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.name')]),
                'slideshow_overview.required'      => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.overview')]),
                'slideshow_description.required'   => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.description')]),
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
                'key' => 'slideshow_name',
                'label' => trans($this->lang_admin.'.fields.name'),
                'min' => $_ln['slideshow_name']['min'],
                'max' => $_ln['slideshow_name']['max'],
            ],
            'overview' => [
                'key' => 'slideshow_overview',
                'label' => trans($this->lang_admin.'.fields.overview'),
                'min' => $_ln['slideshow_overview']['min'],
                'max' => $_ln['slideshow_overview']['max'],
            ],
            'description' => [
                'key' => 'slideshow_description',
                'label' => trans($this->lang_admin.'.fields.description'),
                'min' => $_ln['slideshow_description']['min'],
                'max' => $_ln['slideshow_description']['max'],
            ],
        ];

        $flag = $this->isValidLength($input['slideshow_name'], $params['name']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['slideshow_overview'], $params['overview']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['slideshow_description'], $params['description']) ? $flag : FALSE;

        return $flag;
    }


    /**
     * Load configuration
     * @return ARRAY $configs list of configurations
     */
    public function loadConfigs(){

        $configs = config('package-slideshow');
        return $configs;
    }

}