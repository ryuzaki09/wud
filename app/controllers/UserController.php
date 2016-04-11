<?php

class UserController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return Response::json(array(
            'error' => false,
            'urls' => $users->toArray()
        ),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $user = new User;
        $user->firstname = Request::get('firstname');
        $user->lastname = Request::get('lastname');
        $user->email = Request::get('email');

        $user->save();

        //XXXXXXXXXXXXXXX Send email to user

        return Response::json(array(
            'error' => false,
            'user' => $user->toArray()
        ),
            200
        );
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return Response::json(array(
            'error' => false,
            'urls' => $user->toArray()
        ),
            200
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::find($id);
        $user->firstname = Request::get('firstname');
        $user->lastname = Request::get('lastname');
        $user->email = Request::get('email');
        $user->save();

        return Response::json(array(
            'error' => false,
            'urls' => $user->toArray()
        ),
            200
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return Response::json(array(
            'error' => false,
        ),
            200
        );
    }
}
