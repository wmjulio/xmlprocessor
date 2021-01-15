<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

/**
 * Class PersonController
 * @package App\Http\Controllers\Api
 */
class PersonController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        $persons = Person::all();

        return response()->json(['persons' => $persons]);
    }

    /**
     * @param Person $person
     * @return \Illuminate\Http\JsonResponse
     */
    public function find(Person $person)
    {
        $person->phones;

        return response()->json(['person' => $person]);
    }
}
