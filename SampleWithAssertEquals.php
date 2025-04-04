<?php

// declare(strict_types=1);
// final class Greeter
// {
//     public function greet(string $name): string
//     {
//         return 'Hello, ' . $name . '!';
//     }
// }

declare(strict_types=1);

final class SampleWithAssertEquals
{
    public function __construct(private string $first_name) {}
    public function great(string $last_name): string
    {
        return $this->first_name . $last_name;
    }
}
