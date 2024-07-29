<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Controllers\BaseController;

use App\Validation\Validator;

class TestController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // TODO Implement a cleaner way to return view templates.
        $this->twig->display('login/login.php');
    }

    public function login(Request $request) 
    {
        if($request->getMethod() == 'GET')
        {
            $this->twig->display('form.php');
        }else
        {

            /** TODO Implement authentication.
            *
            * Get input data from form.
            * Check that the data fits the needed format (validation).
            * Filter and remove unwanted characters etc.
            * Check if the username is available in the database.
            * Check if the password is equal to the password in the database.
            *
            * If successful:
            * Create a new user session with needed email/id etc.
            *     - send user to the dashboard.
            *
            * If failiure:
            *   Send user back to login form with validation errors.
            */


            // TODO Build some kind of validation layer.
            // TODO Filter unwanted characters.
            $requestData = $request->request->all();

            $username = $requestData['username'];
            $password = $requestData['password'];

            $username = Validator::validate($username);
            $password = Validator::validate($password);
        }
    }
}
