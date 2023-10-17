<?php 

/*
Necesitamos almacenar la siguiente información en un array multidimensional:

- **John**
    - email: `john@demo.com`
    - website: `www.john.com`
    - age: `22`
    - password: `pass`
- **Anna**
    - email: `anna@demo.com`
    - website: `www.anna.com`
    - age: `24`
    - password: `pass`
- **Peter**
    - email: `peter@mail.com`
    - website: `www.peter.com`
    - age: `42`
    - password: `pass`
- **Max**
    - email: `max@mail.com`
    - website: `www.max.com`
    - age: `33`
    - password: `pass`

Almacena e imprime la información. 
*/

$personas = array(
    "John" => array("email" => "john@demo.com", "website" => "www.john.com", "age" => 22, "password" => "pass"),
    "Anna" => array("email" => "anna@demo.com", "website" => "www.anna.com", "age" => 24, "password" => "pass"),
    "Peter" => array("email" => "peter@mail.com", "website" => "www.peter.com", "age" => 42, "password" => "pass"),
    "Max" => array("email" => "max@mail.com", "website" => "www.max.com", "age" => 33, "password" => "pass")
);

echo "<ul>";
foreach ($personas as $p => $info){
    echo "<li>", $p;
    echo "<ul>";
    echo "<li>", "email: {$info['email']}", "</li>";
    echo "<li>", "website: {$info['website']}", "</li>";
    echo "<li>", "age: {$info['age']}", "</li>";
    echo "<li>", "password: {$info['password']}", "</li>";
    echo "</ul>";
    echo "</li>";
}
echo "</ul>";

?>