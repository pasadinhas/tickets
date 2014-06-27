<?php

class SessionController extends \BaseController {

    public function show() {
        return Auth::user();
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $code = Input::get('code');
        $fenix = OAuth::consumer('FenixEdu', 'http://localhost/dsi/tickets/public/login');

        if (!empty($code)) {
            $token = $fenix->requestAccessToken($code);
            $result = json_decode($fenix->request('/person'), true);

            $user = User::where('username', $result['username'])->first();

            if ($user) {
                Auth::login($user);
                return Redirect::to('/profile');
            } else {
                return 'Não estás na base de dados! oops...';
            }

        } else {
            $url = (string) $fenix->getAuthorizationUri();
            return Redirect::to($url);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
	}


}
