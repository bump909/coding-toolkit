<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

/**
 * Class ProductPolicy
 *
 * This policy class is responsible for defining the authorization logic
 * for viewing products. It checks if the user has purchased the product
 * before allowing them to view it.
 */
class ProductPolicy
{
    public function view(?User $user, Product $product): bool
    {
        // If the user is not logged in, they cannot view the product
        if (!$user) {
            return false;
        }
        return in_array($product->id, session('purchased_product_ids', []));
    }
}
