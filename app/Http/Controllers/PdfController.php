<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    // public function downloadPosts(){
    //     $posts=Post::all();
    //     $data = [
    //         'posts'=>$posts,
    //     ];
    //     $pdf = Pdf::loadView('postsPDF', $data);
    //     // $pdf->setPaper('A4', 'portrait');
    //     return $pdf->download('posts.pdf');
    // }


    public function downloadPosts(Request $request)
{
    // Ambil data dari filter
    $publishedFrom = $request->input('published_from');
    $publishedUntil = $request->input('published_until');

    $posts = Post::query()
        ->when($publishedFrom, fn ($query, $date) => $query->whereDate('published_at', '>=', $date))
        ->when($publishedUntil, fn ($query, $date) => $query->whereDate('published_at', '<=', $date))
        ->get();

    // Render tampilan PDF
    $pdf = Pdf::loadView('postsPDF', compact('posts', 'publishedFrom', 'publishedUntil'));

    // Download PDF
    return $pdf->download('posts.pdf');
}

public function __invoke(Post $post)
    {
        return Pdf::loadView('pdf', ['record' => $post])
            ->download($post->title. '.pdf');
    }

    // public function downloadPost($id){
    //     $post=Post::find($id);
    //     $data = [
    //         'posts'=>$post,
    //     ];
    //     $pdf = Pdf::loadView('postsPDF', $data);
    //     $pdf->setPaper('A4', 'portrait');
    //     return $pdf->download('post.pdf');
    // }
    // public function download(Post $record)
    // {
    //     $customer = new Buyer([
    //         'name' => 'John Doe',
    //         'custom_fields'=> [
    //             'email'=>'test@example.com',
    //         ]
    //     ]);

    //     $item=(new InvoiceItem())->title('Service 1')->pricePerUnit(2);
    //     $invoice=Invoice::make()
    //     ->buyer($customer)
    //     ->discountByPercent(10)
    //     ->taxRate(15)
    //     ->shipping(1.99)
    //     ->addItem($item);

    //     return $invoice->stream();
    // }
}
