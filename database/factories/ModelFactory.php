<?php

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


// USER TABLE SEEDER
$factory->define(App\User::class, function (Faker\Generator $faker) {

    $faker->addProvider(new Faker\Provider\sl_SI\Person($faker));

    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

// INSTANCES OF USERS DEFINED BY ROLE
$factory->defineAs(App\User::class, 'customer', function (Faker\Generator $faker) use ($factory) {

    $user = $factory->raw(App\User::class);

    return array_merge($user, ['userable_type' => 'App\Customer']);
});

$factory->defineAs(App\User::class, 'admin', function (Faker\Generator $faker) use ($factory) {

    $user = $factory->raw(App\User::class);

    return array_merge($user, ['userable_type' => 'App\Admin']);
});

$factory->defineAs(App\User::class, 'employee', function (Faker\Generator $faker) use ($factory) {

    $user = $factory->raw(App\User::class);

    return array_merge($user, ['userable_type' => 'App\Employee']);
});

// CUSTOMERS TABLE SEEDER
$factory->define(App\Customer::class, function(Faker\Generator $faker) {

    $faker->addProvider(new Faker\Provider\sl_SI\PhoneNumber($faker));
    $faker->addProvider(new Faker\Provider\sl_SI\Address($faker));

    return [
        'street' => $faker->address,
        'phone' => $faker->phoneNumber,
        'city_id' => factory(App\Municipality::class)->make()->id
    ];
});

// ADMIN TABLE SEEDER (empty set is return, just to increment the id and set the timestamps)
$factory->define(App\Admin::class, function(Faker\Generator $faker) {
    return [];
});

// EMPLOYEE TABLE SEEDER (empty set is return, just to increment the id and set the timestamps)
$factory->define(App\Employee::class, function(Faker\Generator $faker) {
    return [];
});

// MUNICIPALITY TABLE SEEDER
$factory->define(App\Municipality::class, function(Faker\Generator $faker) {

    $faker->addProvider(new Faker\Provider\sl_SI\Address($faker));

    return [
        'zip_code' => $faker->postcode,
        'name'     => $faker->city,
        'country'  => 'Slovenija',
    ];
});

// PRODUCT TABLE SEEDER
$factory->define(App\Product::class, function(Faker\Generator $faker) {

    return [
        'name' => str_random(20),
        'serial_num' => str_random(12),
        'manufacturer' => $faker->company,
        'stock' => rand(0, 100),
    ];
});


// ORDERS TABLE SEEDER
$factory->define(App\Order::class, function(Faker\Generator $faker) {
    return [];
});

// VOTES TABLE SSEDER
$factory->define(App\Vote::class, function(Faker\Generator $faker) use ($factory) {
    return [
        'vote' => rand(1,5),
        //'customer_id' => $factory->create('App\Customer')->id,
        //'product_id' => $factory->create('App\Product')->id
    ];
});

// ORDERS_PRODUCTS SEEDER
/*$factory->define(App\OrderProduct::class, function(Faker\Generator $faker) use($factory) {
    return [
        'quantity' => rand(1,40),
    ];
});*/
