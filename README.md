# All Different Directions 

[Task](https://open.kattis.com/problems/alldifferentdirections)

# Install

`composer install`

# Tests

`./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/`

# Usage

```
// You can integrate `App\Application` into current system. Example of usage:

$instructions = [];
$instructions[] = '87.342 34.30 start 0 walk 10.0';

$app = new Application($instructions);
$result = $app->calculate();

// Where $result is `App\Model\Result` class with 
```

# Todo

- Provide more strict validation for input data
