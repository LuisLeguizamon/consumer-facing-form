<?php

namespace App\Services\InsuranceProduct;

use App\Enums\InsuranceProduct;

class GetInsuranceProducts
{
    public function execute(): array
    {
        $cases = [];

        foreach (InsuranceProduct::cases() as $case) {
            $title = ucwords(strtolower(str_replace('_', ' ', $case->name )));

            switch ($case->value) {
                case 'home':
                    $data = [
                        'image_url' => '/images/products/home-card.jpeg',
                        'subtitle' => 'Your current or soon-to-be home',
                        'title' => $title,
                        'value' => $case->value,
                    ];
                    break;
                case 'auto':
                    $data = [
                        'image_url' => '/images/products/auto-card.jpeg',
                        'subtitle' => 'Your personal vehicle(s)',
                        'title' => $title,
                        'value' => $case->value,
                    ];
                    break;
                case 'recreational_vehicle':
                    $data = [
                        'image_url' => '/images/products/recreational-vehicle-card.jpeg',
                        'subtitle' => 'Your boat RV, motorcycle, etc',
                        'title' => $title,
                        'value' => $case->value,
                    ];
                    break;
            }

            $cases[$case->value] = $data;
        }

        return $cases;
    }
}