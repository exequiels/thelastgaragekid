<?php

switch ($view) {
    case '/':
        $pageTitle = "The Last Garage Kid";
        break;
    case 'projects':
        $pageTitle = "Projects | The Last Garage Kid";
        break;
    case 'tools':
        $pageTitle = "Tools | The Last Garage Kid";
        break;
    case 'todo':
        $pageTitle = "Todo List | The Last Garage Kid";
        break;
    case 'who':
        $pageTitle = "Who | The Last Garage Kid";
        break;
    case 'webrings':
        $pageTitle = "Webrings | The Last Garage Kid";
        break;
    default:
        $pageTitle = "The Last Garage Kid";
}
