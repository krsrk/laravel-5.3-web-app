<?php
use App\User;
use Faker\Generator as FakerGen;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(User::class, function (FakerGen $faker) {
    $fields = [
    'name' => $faker->name,
    'email' => $faker->email,
    'password' => bcrypt('secret'),];
        
    return $fields;
});

///Factory para la tabla post
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(5),
	'abstract' => $faker->sentence(15),
        'content' => $faker->text(),
    ];
});

///Factory para la tabla post_comment    
$factory->define(App\PostComment::class, function (Faker\Generator $faker) {
    return [
        'comment' => $faker->sentence(15),
    ];
});

