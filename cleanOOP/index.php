<?php

session_start();

require_once("DataBase.php");
require_once("Config.php");
require_once("Validate.php");
require_once("Input.php");
require_once("Token.php");
require_once("Session.php");
require_once("User.php");

$GLOBALS['config'] = [
    'mysql'   => [
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'marlin_clean_oop',
    ],
    'session' => [
        'token_name' => 'token',
    ]

];
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();

        $validation = $validate->check($_POST, [
            'username'       => [
                'required' => true,
                'min'      => 2,
                'max'      => 15,
                'unique'   => 'users'
            ],
            'password'       => [
                'required' => true,
                'min'      => 3,
            ],
            'password_again' => [
                'required' => true,
                'matches'  => 'password',
            ],
        ]);



        if ($validation->passed()) {
            $user = new User();

            $user->create([
                    'username' => Input::get('username'),
                    'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT),
            ]);

            Session::flash('success', 'register success');
            header("Location: ./test.php");
        } else {
            foreach ($validation->errors() as $error) {
                echo $error . "</br>";
            }
        }
    }
}

?>

<form action="" method="post">
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo Input::get('username'); ?>">
    </div>
    <div class="field">
        <label for="username">Password</label>
        <input type="text" name="password">
    </div>
    <div class="field">
        <label for="username">Password_Again</label>
        <input type="text" name="password_again">
    </div>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <div class="field">
        <button type="submit">
            Send
        </button>
    </div>
</form>

