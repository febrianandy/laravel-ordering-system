<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use Termwind\Components\Dd;
use App\Models\OrderItem;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        return view('pages.welcome', compact('menus'));
    }

    public function food()
    {
        $makanan = Menu::where('kategori', 'makanan')->get();
        return view('pages.food', compact('makanan'));
    }

    public function drinks()
    {
        $minuman = Menu::where('kategori', 'minuman')->get();
        return view('pages.drinks', compact('minuman'));
    }

    public function carts()
    {
        return view('pages.carts');
    }

    public function addToCart($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "order_id" => 1,
                    "menu_id" => $menu->id,
                    "nama" => $menu->nama,
                    "quantity" => 1,
                    "harga" => $menu->harga,
                    "gambar" => $menu->gambar
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success-cart', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success-cart', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "order_id" => 1,
            "menu_id" => $menu->id,
            "nama" => $menu->nama,
            "quantity" => 1,
            "harga" => $menu->harga,
            "gambar" => $menu->gambar
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success-cart', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
            return redirect()->back();
        }
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function order(Request $request)
    {

        $cart = session()->get('cart');



        $order = new Order();
        $order->user_id = 1;
        $order->total = 0;
        $order->status = "pending";
        $order->save();



        foreach ($cart as $key => $value) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->menu_id = $value['menu_id'];
            $orderItem->jumlah = 2;
            $orderItem->save();
        }


        session()->forget('cart');

        return redirect("/carts")->with('success', 'Order berhasil, silahkan tunggu konfirmasi dari kami');
    }
}
