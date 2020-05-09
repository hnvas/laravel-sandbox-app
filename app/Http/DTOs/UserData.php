<?php


namespace App\Http\DTOs;


use App\Http\Requests\SaveUser;
use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{

    /** @var string */
    public $name;

    /** @var string */
    public $email;

    /** @var string */
    public $password;

    public static function fromRequest(SaveUser $request)
    {
        return new self([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => $request->input('password')
        ]);
    }

}