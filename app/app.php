<?php
    require_once __DIR__."/../../title_case/vendor/autoload.php";
    require_once __DIR__."/../src/Task.php";

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    session_start();
    if (empty($_SESSION['list_of_tasks'])) {
        $_SESSION['list_of_tasks'] = array();
    }

    $app = new Silex\Application();
    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
       'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
       return $app['twig']->render('task.twig', array('tasks' => Task::getAll()));
   });

   $app->post("/tasks", function() use ($app) {
       $task = new Task($_POST['description']);
       $task->save();
       return $app['twig']->render('create_task.twig', array('newtask' => $task));
   });

   $app->post("/delete_tasks", function() use ($app) {
       Task::deleteAll();
       return $app['twig']->render('delete_tasks.twig');
   });

    return $app;
?>
