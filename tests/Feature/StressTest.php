<?php

use function Pest\Stressless\stress;

test('stress test with 1 concurrent request for 5 seconds', function () {
    $result = stress('http://localhost:8000')
        ->concurrently(1)
        ->for(5)->seconds()
        ->dump();

    $requests = $result->requests;

    expect($requests->failed->count)
        ->toBe(0);

    expect($requests->duration->med)
        ->toBeLessThan(20);
});

test('stress test with 5 concurrent requests for 10 seconds', function () {
    $result = stress('http://localhost:8000')
        ->concurrently(5)
        ->for(10)->seconds()
        ->dump();

    $requests = $result->requests;

    expect($requests->failed->count)
        ->toBe(0);

    expect($requests->duration->med)
        ->toBeLessThan(20);
});

test('stress test with 10 concurrent requests for 15 seconds', function () {
    $result = stress('http://localhost:8000')
        ->concurrently(10)
        ->for(15)->seconds()
        ->dump();

    $requests = $result->requests;

    expect($requests->failed->count)
        ->toBe(0);

    expect($requests->duration->med)
        ->toBeLessThan(20);
});
