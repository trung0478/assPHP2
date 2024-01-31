<?php
define('BASE_URL', '/learn_php/php2/assignment_copy/');

use Phroute\Phroute\RouteCollector;

$url = isset($_GET['url']) ? $_GET['url'] : '/';

$router = new RouteCollector();

//ADMIN
// check nếu chưa đăng nhập admin thì chuyển đến trang login
$router->filter('auth',function () {
    if (!isset($_SESSION['accountAdmin'])) {
        header("Location:".BASE_URL."loginAdminInterface");
        return false;
    }
});

// đăng nhập
$router->get('/loginAdminInterface', [App\Controllers\Admin\AccountsControllers::class, 'loginAdminInterface']);
$router->post('/loginAdmin', [App\Controllers\Admin\AccountsControllers::class, 'loginAdmin']);

$router->group(['before'=>'auth'], function ($router) {
// quizzes
$router->get('/admin', [App\Controllers\Admin\HomeControllers::class, 'home']);
$router->get('/test', [App\Controllers\Admin\TestControllers::class, 'listQuiz']);

$router->get('/addTestInterface', [App\Controllers\Admin\TestControllers::class, 'addQuizInterface']);
$router->post('/addTest', [App\Controllers\Admin\TestControllers::class, 'addQuiz']);

// khi dùng biến {idQuiz} thì hàm để hứng cũng phải biến biến hứng là idQuiz
$router->get('/updateTestInterface_{idQuiz}', [App\Controllers\Admin\TestControllers::class, 'updateQuizInterface']);
$router->post('/updateTest_{idQuiz}', [App\Controllers\Admin\TestControllers::class, 'updateQuiz']);

$router->get('/deleteTest_{idQuiz}', [App\Controllers\Admin\TestControllers::class, 'deleteQuiz']);

// question answer
$router->get('/listQuestion_{idQuiz}', [App\Controllers\Admin\QuesAnsControllers::class, 'listQuestion']);
$router->get('/listAnswer_{idQues}', [App\Controllers\Admin\QuesAnsControllers::class, 'listAnswer']);

$router->get('/addQuesAnsInterface', [App\Controllers\Admin\QuesAnsControllers::class, 'addQuesAnsInterface']);
$router->post('/addQuesAns', [App\Controllers\Admin\QuesAnsControllers::class, 'addQuesAns']);

$router->get('/updateQuesAnsInterface_{idQues}', [App\Controllers\Admin\QuesAnsControllers::class, 'updateQuesAnsInterface']);
$router->post('/updateQuesAns_{idQues}', [App\Controllers\Admin\QuesAnsControllers::class, 'updateQuesAns']);

//đăng xuất admin
$router->get('/logoutAdmin',[App\Controllers\Admin\AccountsControllers::class,'logoutAdmin']);
});

// USER
$router->get('/', [App\Controllers\User\HomeControllers::class, 'home']); // trang chủ
$router->get('/quiz_{idQuiz}', [App\Controllers\User\QuizzesControllers::class, 'quiz']); // bài test
                
// đăng nhập
$router->get('/loginInterface', [App\Controllers\User\AccountsControllers::class, 'loginInterface']);
$router->post('/login', [App\Controllers\User\AccountsControllers::class, 'login']);
// đăng xuất
$router->get('/logout', [App\Controllers\User\AccountsControllers::class, 'logout']);
// đăng ký
$router->get('/registerInterface', [App\Controllers\User\AccountsControllers::class, 'registerInterface']);
$router->post('/register', [App\Controllers\User\AccountsControllers::class, 'register']);
// quên mật khẩu
$router->get('/forgetPassInterface', [App\Controllers\User\AccountsControllers::class, 'forgetPassInterface']);
$router->post('/forgetPass', [App\Controllers\User\AccountsControllers::class, 'forgetPass']);

// start: bắt đầu test
$router->get('/start_{idQuiz}', [App\Controllers\User\QuizzesControllers::class, 'start']);
$router->post('/start_{idQuiz}', [App\Controllers\User\QuizzesControllers::class, 'start']);
// submit: chấm điểm và lưu kết quả
$router->post('/submit', [App\Controllers\User\QuizzesControllers::class, 'submit']);
// history
$router->get('/testHistory', [App\Controllers\User\ResultControllers::class, 'testHistory']);


$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
?>