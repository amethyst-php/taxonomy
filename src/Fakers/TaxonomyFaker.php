<?php

namespace Amethyst\Fakers;

use Faker\Factory;
use Railken\Bag;
use Railken\Lem\Faker;

class TaxonomyFaker extends Faker
{
    /**
     * @param bool $parent
     *
     * @return \Railken\Bag
     */
    public function parameters(bool $parent = true)
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('name', $faker->name);
        $bag->set('description', $faker->text);
        $bag->set('enabled', 1);
        $bag->set('weight', 1);
        $bag->set('icon', 'foo');

        if ($parent === true) {
            $bag->set('parent', TaxonomyFaker::make()->parameters(false)->toArray());
        }

        return $bag;
    }
}
