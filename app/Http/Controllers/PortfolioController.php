<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function home()
    {
        return view('portfolio.home');
    }


    public function create()
    {
        return view('portfolio.create');
    }


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


    public function simple($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->update([
            'template' => 'simple',
        ]);

        return redirect()
            ->route('portfolio.customize', $portfolio->id);
    }


    public function modern($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->update([
            'template' => 'modern',
        ]);

        return redirect()
            ->route('portfolio.customize', $portfolio->id);
    }


    public function creative($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->update([
            'template' => 'creative',
        ]);

        return redirect()
            ->route('portfolio.customize', $portfolio->id);
    }


    /*
    |--------------------------------------------------------------------------
    | Customize Template
    |--------------------------------------------------------------------------
    */

    public function customize($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolio.customize', compact('portfolio'));
    }


    public function saveCustomization(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'accent_color' => 'required|string|max:255',
            'layout_style' => 'required|string|max:255',
        ]);

        $portfolio->update($validated);

        return redirect()
            ->route('portfolio.preview', $portfolio->id)
            ->with('success', 'Template customization saved successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Portfolio Preview
    |--------------------------------------------------------------------------
    */

    public function preview($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return match ($portfolio->template) {

            'modern' => view(
                'portfolio.modern',
                compact('portfolio')
            ),

            'creative' => view(
                'portfolio.creative',
                compact('portfolio')
            ),

            default => view(
                'portfolio.simple',
                compact('portfolio')
            ),
        };
    }


    /*
    |--------------------------------------------------------------------------
    | Portfolio Management
    |--------------------------------------------------------------------------
    */

    public function manage()
    {
        $portfolios = Portfolio::latest()->get();

        return view(
            'portfolio.manage',
            compact('portfolios')
        );
    }


    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view(
            'portfolio.edit',
            compact('portfolio')
        );
    }


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
                Storage::disk('public')->exists(
                    $portfolio->profile_picture
                )
            ) {
                Storage::disk('public')->delete(
                    $portfolio->profile_picture
                );
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


    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);


        if (
            $portfolio->profile_picture &&
            Storage::disk('public')->exists(
                $portfolio->profile_picture
            )
        ) {
            Storage::disk('public')->delete(
                $portfolio->profile_picture
            );
        }


        $portfolio->delete();


        return redirect()
            ->route('portfolio.manage')
            ->with('success', 'Portfolio deleted successfully.');
    }
}