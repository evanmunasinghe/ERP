<?php

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('database seeder adds business data without adding users', function () {
    $this->seed(DatabaseSeeder::class);

    expect(User::count())->toBe(0);
    expect(Customer::count())->toBe(5);
    expect(Product::count())->toBe(8);
    expect(Invoice::count())->toBe(5);
    expect(Invoice::query()->withCount('items')->get()->min('items_count'))->toBeGreaterThan(0);
});

test('database seeder is idempotent', function () {
    $this->seed(DatabaseSeeder::class);
    $this->seed(DatabaseSeeder::class);

    expect(User::count())->toBe(0);
    expect(Customer::count())->toBe(5);
    expect(Product::count())->toBe(8);
    expect(Invoice::count())->toBe(5);
});
