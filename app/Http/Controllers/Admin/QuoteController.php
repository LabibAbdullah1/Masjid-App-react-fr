<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest()->paginate(10);
        return view('admin.quote.index', compact('quotes'));
    }

    public function create()
    {
        return view('admin.quote.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'source' => 'nullable|string|max:255',
        ]);

        Quote::create([
            'text' => $request->text,
            'source' => $request->source,
        ]);

        return redirect()->route('admin.quote.index')->with('success', 'Quote berhasil ditambahkan.');
    }

    public function edit(Quote $quote)
    {
        return view('admin.quote.edit', compact('quote'));
    }

    public function update(Request $request, Quote $quote)
    {
        $request->validate([
            'text' => 'required|string',
            'source' => 'nullable|string|max:255',
        ]);

        $quote->update([
            'text' => $request->text,
            'source' => $request->source,
        ]);

        return redirect()->route('admin.quote.index')->with('success', 'Quote berhasil diperbarui.');
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('admin.quote.index')->with('success', 'Quote berhasil dihapus.');
    }
}
