<?php

namespace Database\Seeders;

use App\Models\Auction;
use App\Models\AuctionBid;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AuctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::where('is_active', true)->get();
        $users = User::where('type', 'client')->get();

        if ($products->isEmpty() || $users->isEmpty()) {
            return;
        }

        // Create auctions with different statuses
        $this->createActiveAuctions($products, $users);
        $this->createPendingAuctions($products);
        $this->createEndedAuctions($products, $users);
    }

    private function createActiveAuctions($products, $users)
    {
        // Select 4 products for active auctions
        $activeProducts = $products->random(min(4, $products->count()));

        foreach ($activeProducts as $product) {
            $startingPrice = round($product->price * 0.7, 2); // 70% of product price
            $currentPrice = $startingPrice;

            $auction = Auction::create([
                'product_id' => $product->id,
                'starting_price' => $startingPrice,
                'current_price' => $currentPrice,
                'reserve_price' => round($product->price * 0.9, 2), // 90% of product price
                'bid_increment' => 5.00,
                'start_date' => Carbon::now()->subDays(rand(1, 3)),
                'end_date' => Carbon::now()->addDays(rand(1, 7)),
                'is_active' => true,
                'status' => 'active',
            ]);

            // Add some bids to active auctions
            $this->createBidsForAuction($auction, $users, rand(2, 5));
        }
    }

    private function createPendingAuctions($products)
    {
        // Select 2 products for pending auctions
        $pendingProducts = $products->random(min(2, $products->count()));

        foreach ($pendingProducts as $product) {
            $startingPrice = round($product->price * 0.7, 2);

            Auction::create([
                'product_id' => $product->id,
                'starting_price' => $startingPrice,
                'current_price' => $startingPrice,
                'reserve_price' => round($product->price * 0.9, 2),
                'bid_increment' => 5.00,
                'start_date' => Carbon::now()->addDays(rand(1, 3)),
                'end_date' => Carbon::now()->addDays(rand(7, 14)),
                'is_active' => true,
                'status' => 'pending',
            ]);
        }
    }

    private function createEndedAuctions($products, $users)
    {
        // Select 3 products for ended auctions
        $endedProducts = $products->random(min(3, $products->count()));

        foreach ($endedProducts as $product) {
            $startingPrice = round($product->price * 0.7, 2);
            $currentPrice = round($product->price * (0.9 + (rand(0, 20) / 100)), 2); // Between 90% and 110% of product price

            $auction = Auction::create([
                'product_id' => $product->id,
                'starting_price' => $startingPrice,
                'current_price' => $currentPrice,
                'reserve_price' => round($product->price * 0.85, 2),
                'bid_increment' => 5.00,
                'start_date' => Carbon::now()->subDays(rand(7, 14)),
                'end_date' => Carbon::now()->subDays(rand(1, 3)),
                'is_active' => true,
                'status' => 'ended',
                'winner_id' => $users->random()->id,
            ]);

            // Add bids to ended auctions
            $this->createBidsForAuction($auction, $users, rand(3, 8));
        }
    }

    private function createBidsForAuction($auction, $users, $numBids)
    {
        $currentPrice = $auction->starting_price;
        $bidIncrement = $auction->bid_increment;

        // Create a series of bids with increasing prices
        for ($i = 0; $i < $numBids; $i++) {
            $user = $users->random();
            $bidAmount = $currentPrice + $bidIncrement + rand(0, 10);
            $currentPrice = $bidAmount;

            AuctionBid::create([
                'auction_id' => $auction->id,
                'user_id' => $user->id,
                'amount' => $bidAmount,
                'is_winning' => ($i == $numBids - 1), // Last bid is winning
            ]);
        }

        // Update the auction's current price to match the highest bid
        $auction->current_price = $currentPrice;
        $auction->save();
    }
}
