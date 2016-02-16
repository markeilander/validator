# Laravel 5 Validator

### Table of contents

[TOC]

## Usage
This package is based on laravel validation: http://laravel.com/docs/5.1/validation
    
### Create a validator

```php

use Eilander\Validator\LaravelValidator as Validator;

class UpdateUserValidator extends Validator
{
    protected static $rules = [
        'name'     => 'required',
        'email'    => 'required|email',
        'msg'      => 'required'
    ];
}

```

### Custom Error Messages

You may use custom error messages for validation instead of the defaults
http://laravel.com/docs/5.1/validation#working-with-error-messages

```php

protected static $messages = [
    'required' => 'The :attribute field is required.',
];

```

Or, you may wish to specify a custom error messages only for a specific field.

```php

protected static $messages = [
    'email.required' => 'We need to know your e-mail address!',
];

```

### Using the Validator

```php

use \Eilander\Validator\Exceptions\ValidatorException;

class PostsController extends BaseController {

    /**
     * @var PostRepository
     */
    protected $repository;
    
    /**
     * @var PostValidator
     */
    protected $validator;

    public function __construct(PostRepository $repository, PostValidator $validator){
        $this->repository = $repository;
        $this->validator  = $validator;
    }
   
    public function store()
    {
        if ($this->validator->fails($request->all())) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // do something
    }
}
```