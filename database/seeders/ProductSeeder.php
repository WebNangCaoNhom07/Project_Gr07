<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $path = storage_path('app/flipkart_laptop_dataset.csv');


        if (!File::exists($path)) {
            $this->command->error("File CSV không tồn tại: $path");
            return;
        }

        $file = fopen($path, 'r');
        $header = fgetcsv($file); // Bỏ qua dòng tiêu đề

        $count = 0;
        while (($data = fgetcsv($file)) !== false && $count < 100) {
            Product::create([
                'product_name'      => $data[1],
                'selling_price'     => (float) filter_var($data[2], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
                'actual_price'      => (float) filter_var($data[3], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
                'average_rating'    => is_numeric($data[4]) ? $data[4] : null,
                'rating_and_review' => $data[5],
                'ram'               => $data[6],
                'ssd'               => $data[7],
                'processor'         => $data[8],
                'operating_system'  => $data[9],
                'exchange_offer'    => $data[10],
                'display_size'      => $data[11],
            ]);
            $count++;
        }

        fclose($file);
    }
}
