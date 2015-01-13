<?php

class SessionsController extends BaseController
{
    
    public function create()
    {
        if (Auth::check()) return Redirect::to('/');
        
        return View::make('sessions.create');
    }
    
    public function store()
    {
        $input = Input::only('email', 'password');
        
        $attempt = Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ]);
        
        if ($attempt) return Redirect::intended('/')->with('flash_message', 'Bienvenido');
        
        return Redirect::back()->with('flash_message', 'Cuenta de usuario inválida')->withInput();
    }
    
    public function destroy()
    {
        Auth::logout();
        
        return Redirect::to('/')->with('flash_message', 'Su sesión se ha cerrado correctamente');
    }
}