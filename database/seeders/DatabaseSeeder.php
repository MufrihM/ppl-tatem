<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Pembayaran;
use App\Models\Report;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Produk::create([
            'nama' => 'Tahu',
            'slug' => 'tahu',
            'harga' => '13000',
            'keterangan' => '',
            'gambar' => 'gambar-produk/cyiWpFzGpkuHUDxJSc6gqcjp6HoJOk608VtcIPqr.jpg'
        ]);

        Produk::create([
            'nama' => 'Tempe',
            'slug' => 'tempe',
            'harga' => '10000',
            'keterangan' => '',
            'gambar' => 'gambar-produk/nRTxBUX68NKzAFO60ou0AYCYoyMUjeVeh5Ojtqgd.jpg'
        ]);

        User::create([
            'nama' => 'admin',
            'alamat' => 'jalanin aja dulu',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        User::create([
            'nama' => 'Mufrih Madjid',
            'alamat' => 'jalan jalan',
            'email' => 'mufrihmajid@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        Order::create([
            'user_id' => '2',
            'produk_id' => '1',
            'jumlah' => '1'
        ]);

        Order::create([
            'user_id' => '2',
            'produk_id' => '2',
            'jumlah' => '2'
        ]);

        Pembayaran::create([
            'order_id' => '1',
            'gambar' => 'gambar-produk/nRTxBUX68NKzAFO60ou0AYCYoyMUjeVeh5Ojtqgd.jpg',
            'status' => 'Terkonfirmasi'
        ]);

        Pembayaran::create([
            'order_id' => '2',
            'gambar' => 'gambar-produk/nRTxBUX68NKzAFO60ou0AYCYoyMUjeVeh5Ojtqgd.jpg',
            'status' => 'tidak terkonfirmasi'
        ]);

        Report::create([
            'pembayaran_id' => '1'
        ]);
    }
}
