<?php

class FilesController extends BaseController
{
    public function index()
    {
        return View::make('files.index');
    }

    public function getUpload()
    {
        return View::make('files.upload');
    }

    public function postUpload()
    {
        //$input = Input::all();
        //Agregar validaciones
        $destinationPath = 'uploads';
        $filename = Input::file('file')->getClientOriginalName();
        Input::file('file')->move($destinationPath, $filename);
        return Redirect::action('FilesController@index');
    }
}