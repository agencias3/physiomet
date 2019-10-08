<?php

use Faker\Generator as Faker;
use AgenciaS3\Services\UtilObjeto;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(AgenciaS3\Entities\PostTag::class, function (Faker $faker) {

    return [
        'post_id' => rand(1, 10),
        'tag_id' => rand(1, 10)
    ];
});
