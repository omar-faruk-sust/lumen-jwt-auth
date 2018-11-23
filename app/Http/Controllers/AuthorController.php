<?php
/**
 * Created by PhpStorm.
 * User: omarf
 * Date: 9/2/2018
 * Time: 7:45 PM
 */

namespace App\Http\Controllers;

use App\Author;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;
use Validator;

class AuthorController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function showAllAuthors()
    {
        return AuthorResource::collection(Author::paginate(1000));
    }

    public function showOneAuthor($id)
    {
        return response()->json(Author::find($id));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'location' => 'required|alpha'
        ]);

        if ($validator->fails()) {
            return $this->errorValidator(40001, $validator);
        }

        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:authors,email,'.$id,
            'location' => 'required|alpha'
        ]);

        if ($validator->fails()) {
            return $this->errorValidator(40001, $validator);
        }

        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

}