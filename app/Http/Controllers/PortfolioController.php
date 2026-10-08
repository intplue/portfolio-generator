<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

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
            'contact_number' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

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

    private function samplePortfolio()
    {
        return new Portfolio([
            'id' => 1,

            'full_name' => 'Noelah Claire M. Indayo',
            'email' => 'claire@example.com',
            'contact_number' => '09XX XXX XXXX',
            'address' => 'Cebu, Philippines',
            'profile_picture' => null,

            'about_me' =>
                'A student interested in technology, design, and creating meaningful digital experiences.',

            'educational_background' =>
                "Bachelor's Degree in Information Technology\nUniversity Name — 2026",

            'work_experience' =>
                "Student Project Developer\nAcademic Project — 2026",

            'skills' =>
                "Laravel\nPHP\nJava\nMySQL\nUI/UX Design",

            'projects' =>
                "Online Portfolio Template Generator\nA Laravel-based portfolio generation system.",

            'website' => 'https://example.com',
            'linkedin' => 'https://linkedin.com',
            'github' => 'https://github.com',
            'social_links' => '@example',

            'additional_info' =>
                'Interested in web development, software design, and creative digital projects.',

            'template' => 'simple',
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Temporary UI Preview
    |--------------------------------------------------------------------------
    */

    public function templatesPreview()
    {
        $portfolio = $this->samplePortfolio();

        return view('portfolio.templates', compact('portfolio'));
    }

    public function simplePreview()
    {
        $portfolio = $this->samplePortfolio();

        return view('portfolio.simple', compact('portfolio'));
    }

    public function modernPreview()
    {
        $portfolio = $this->samplePortfolio();

        return view('portfolio.modern', compact('portfolio'));
    }

    public function creativePreview()
    {
        $portfolio = $this->samplePortfolio();

        return view('portfolio.creative', compact('portfolio'));
    }

    public function previewDemo()
    {
        $portfolio = $this->samplePortfolio();

        return view('portfolio.preview', compact('portfolio'));
    }

    public function managePreview()
    {
        $portfolio = $this->samplePortfolio();

        return view('portfolio.manage', compact('portfolio'));
    }

    /*
    |--------------------------------------------------------------------------
    | Real CRUD
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

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

        $portfolio->update($validated);

        return redirect()
            ->route('portfolio.preview', $portfolio->id)
            ->with('success', 'Portfolio updated successfully.');
    }

    public function manage()
    {
        $portfolio = Portfolio::latest()->first();

        return view('portfolio.manage', compact('portfolio'));
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->delete();

        return redirect()
            ->route('portfolio.manage')
            ->with('success', 'Portfolio deleted successfully.');
    }
}