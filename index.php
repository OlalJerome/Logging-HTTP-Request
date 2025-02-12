<?php
// Middleware function to log requests
function requestLogger($request, $next) {
    // Log the request method, URL, and timestamp
    $log = "[" . date("Y-m-d H:i:s") . "] " . $request['method'] . " " . $request['url'] . "\n";
    file_put_contents('logs.txt', $log, FILE_APPEND);

    // Pass the request to the next middleware or handler
    return $next($request);
}

// Simulate an incoming HTTP request
$request = [
    'method' => $_SERVER['REQUEST_METHOD'], // Get the request method (e.g., GET, POST)
    'url' => $_SERVER['REQUEST_URI'] // Get the request URL
];

// Next middleware or final request handler
$next = function ($request) {
    echo "Request processed!\n";
};

// Execute the middleware
requestLogger($request, $next);
?>