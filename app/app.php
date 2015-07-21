<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Task.php";

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    session_start();
    if (empty($_SESSION['list_of_tasks'])) {
        $_SESSION['list_of_tasks'] = array();
    }

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->get("/", function() use ($app){
      return $app ['twig']->render ('index.html.twig', array('task' => Tasks::getAll()));
    });

    $app->post("/task", function() use ($app){
      $task = new Task($_POST['description']);
      $task->save();
      return $app['twig']->render('index.twig', array('task' => Tasks::getAll()));
    });

    return $app;
?>
