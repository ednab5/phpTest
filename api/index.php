<?php
require '../vendor/autoload.php';

// ovaj htaccess je da pristupimo index.html-u sa backenda na frontend
//vendor nam ne treba na githubu, samo composer.json


// /will echo back that Hello world, bez da kazemo npr index.php
// (to se automatski vraca)
// prebaciti ovo na bitnami
//

use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="user",
 *     description="User related operations"
 * )
 * @OA\Info(
 *     version="1.0",
 *     title="Example for response examples value",
 *     description="Example info",
 *     @OA\Contact(name="Swagger API Team")
 * )
 * @OA\Server(
 *     url="https://localhost/phpTest/api",
 *     description="API server"
 * )
 */
Flight::route('/', function(){
    echo 'Hello world!';
});

//this is post request so this is not working like this
//post allows us to have a body and we send that body
//our body sis username/password/email..
// for the project, we use json format docu

class UserUpdateEndpoint
{
}

/**
 * @OA\Post(
 *     path="/users",
 *     summary="Register a user with the user info",
 *     description="Register a user",
 *     operationId="addUser",
 *     tags={"user"},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="password",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="username",
 *                     type="string"
 *                 ),
 *                  @OA\Property(
 *                     property="email",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="phone",
 *                     oneOf={
 *                     	   @OA\Schema(type="string"),
 *                     	   @OA\Schema(type="integer"),
 *                     }
 *                 ),
 *                 example={"username": "burch1", "password": " password123", "phone": 12345678, "email":"example.email@gmail"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             oneOf={
 *                 @OA\Schema(type="boolean")
 *             },
 *             @OA\Examples(example="result", value={"success": true}, summary="An result object."),
 *             @OA\Examples(example="bool", value=false, summary="A boolean value."),
 *         )
 *     )
 * )
 */

Flight::route('POST /register', function(){

    $username = Flight::request()->data->username;

    echo 'I received a POST request form' .$username;
    //we need to create username values in postman
    // valid app json tyle is required -we need header in postman with the value

});

Flight::start();


//Flight: we need body in format json
//we can send also image, instead od app json
//if we go with jQuery post json for example it would be ayax requests
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

Flight::route('/main', function(){
    echo 'hello world!';
});

Flight::route('POST /register', function(){
    $username = Flight::request()->data->username;
    $password = Flight::request()->data->password;
    $email = Flight::request()->data->email;
    $phone = Flight::request()->data->phone;
    if(strlen($username) <= 3){
        Flight::json(["status" => "error", "message" => "Username is not Valid"]);
        exit;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        Flight::json(["status" => "error", "message" => "Email is not Valid"]);
        exit;
    }
    if(strlen($password) < 8){
        Flight::json(["status" => "error", "message" => "Password is not Valid"]);
        exit;
    }
    Flight::json(["username" => "".$username."", "password" => "".$password."", "email" => "".$email.""]);
});

/**
 * @OA\Post(
 *     path="/users",
 *     summary="Allows user to login into the system",
 *     description="User login",
 *     operationId="addUser",
 *     tags={"user"},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="password",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="username",
 *                     type="string"
 *                 ),
 *                  
 *                 ),
 *                 example={"username": "burch1", "password": " password123"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             oneOf={
 *                 @OA\Schema(type="boolean")
 *             },
 *             @OA\Examples(example="result", value={"success": true}, summary="An result object."),
 *             @OA\Examples(example="bool", value=false, summary="A boolean value."),
 *         )
 *     )
 * )
 */

Flight::route('POST /login', function(){
    $email = Flight::request()->data->email;
    $password = Flight::request()->data->password;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        Flight::json(["status" => "error", "message" => "Email is not Valid"]);
        exit;
    }
    if($password < 8){
        Flight::json(["status" => "error", "message" => "Password is not Valid"]);
        exit;
    }
    Flight::json([ "password" => "".$password."", "email" => "".$email.""]);
});

Flight::start();



