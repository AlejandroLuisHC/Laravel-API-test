<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = $this->faker->randomElement(['B', 'P', 'V']);

        return [
           'customer_id'    => Customer::factory(),
           'amount'         => $this->faker->randomFloat(100, 20000),
           'status'         => $status,
           'billed_at'      => $this->faker->dateTimeThisDecade(),
           'paid_at'        => $status === 'P' ? $this->faker->dateTimeThisDecade() : null,
        ];
    }
}
