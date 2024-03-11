<?php

namespace Database\Factories;

use App\Enums\InsuranceProduct;
use App\Models\Consumer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $consumer = Consumer::factory()->create();
        $products = InsuranceProduct::toArray();

        return [
            'consumer_id' => $consumer->id,
            'insurance_product' => array_rand($products),
        ];
    }
}
