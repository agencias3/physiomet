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

$factory->define(AgenciaS3\Entities\Tag::class, function (Faker $faker) {

    $name = $faker->name;
    $utilObjeto = new UtilObjeto();
    $seoLink = $utilObjeto->nameUrl($name);
    return [
        'name' => $name,
        'active' => 'y',
        'seo_description' => $name,
        'seo_keywords' => $name,
        'seo_link' => $seoLink
    ];
});
