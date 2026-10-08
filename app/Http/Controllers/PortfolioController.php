<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home
    |--------------------------------------------------------------------------
    */

    public function home()
    {
        return view('portfolio.home');
    }


    /*
    |--------------------------------------------------------------------------
    | Create Portfolio
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('portfolio.create');
    }


    /*
    |--------------------------------------------------------------------------
    | Store Portfolio
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',

            'about_me' => 'nullable|string',
            'educational_background' => 'nullable|string',
            'work_experience' => 'nullable|string',

            'skills' => 'nullable|string',
            'projects' => 'nullable|string',

            'website' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'social_links' => 'nullable|string',

            'additional_info' => 'nullable|string',
        ]);

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('profile-pictures', 'public');
        }

        $validated['template'] = 'simple';

        $portfolio = Portfolio::create($validated);

        return redirect()
            ->route('portfolio.templates', $portfolio->id)
            ->with('success', 'Portfolio information saved successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Template Selection
    |--------------------------------------------------------------------------
    */

    public function templates($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolio.templates', compact('portfolio'));
    }


    /*
    |--------------------------------------------------------------------------
    | Portfolio Preview
    |--------------------------------------------------------------------------
    */

    public function preview($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolio.preview', compact('portfolio'));
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Portfolio
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolio.edit', compact('portfolio'));
    }


    /*
    |--------------------------------------------------------------------------
    | Update Portfolio
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',

            'about_me' => 'nullable|string',
            'educational_background' => 'nullable|string',
            'work_experience' => 'nullable|string',

            'skills' => 'nullable|string',
            'projects' => 'nullable|string',

            'website' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'social_links' => 'nullable|string',

            'additional_info' => 'nullable|string',
        ]);

        if ($request->hasFile('profile_picture')) {

            if (
                $portfolio->profile_picture &&
                Storage::disk('public')->exists($portfolio->profile_picture)
            ) {
                Storage::disk('public')->delete($portfolio->profile_picture);
            }

            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('profile-pictures', 'public');
        }

        $portfolio->update($validated);

        return redirect()
            ->route('portfolio.manage')
            ->with('success', 'Portfolio updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Manage Portfolios
    |--------------------------------------------------------------------------
    */

    public function manage()
    {
        $portfolios = Portfolio::latest()->get();

        return view('portfolio.manage', compact('portfolios'));
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Portfolio
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if (
            $portfolio->profile_picture &&
            Storage::disk('public')->exists($portfolio->profile_picture)
        ) {
            Storage::disk('public')->delete($portfolio->profile_picture);
        }

        $portfolio->delete();

        return redirect()
            ->route('portfolio.manage')
            ->with('success', 'Portfolio deleted successfully.');
    }
}