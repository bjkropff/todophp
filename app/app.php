<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/TitleCaseGenerator.php";

    $app = new Silex\Application();

    $app->get("/", function() use ($app){
      return $app ['twig']->render ('index.twig', array('categories' => Categories::getAll()));
    });

    $app->post("/categories", function() use ($app){
      $category = new Category($_POST['name']);
      $category->save();
      return $app['twig']->render('index.twig', arra('categories' => Categories::getAll()));
    });

    return $app;
?>
