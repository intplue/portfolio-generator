<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display the home page.
     */
    public function home()
    {
        return view('portfolio.home');
    }

    /**
     * Display the portfolio creation form.
     */
    public function create()
    {
        return view('portfolio.create');
    }

    /**
     * Save a new portfolio.
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

    /**
     * Display the template selection page.
     */
    public function templates($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolio.templates', compact('portfolio'));
    }

    /**
     * Select the Simple template.
     */
    public function simple($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->update([
            'template' => 'simple',
        ]);

        return redirect()->route('portfolio.customize', $portfolio->id);
    }

    /**
     * Select the Modern template.
     */
    public function modern($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->update([
            'template' => 'modern',
        ]);

        return redirect()->route('portfolio.customize', $portfolio->id);
    }

    /**
     * Select the Creative template.
     */
    public function creative($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->update([
            'template' => 'creative',
        ]);

        return redirect()->route('portfolio.customize', $portfolio->id);
    }

    /**
     * Display the customization page.
     */
    public function customize($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolio.customize', compact('portfolio'));
    }

    /**
     * Validate and save template customization.
     */
    public function saveCustomization(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'accent_color' => [
                'required',
                'in:green,blue,plum,custom',
            ],
            'custom_color' => [
                'nullable',
                'required_if:accent_color,custom',
                'regex:/^#[0-9A-Fa-f]{6}$/',
            ],
            'layout_style' => [
                'required',
                'in:standard,cards,editorial',
            ],
        ]);

        $presetColors = [
            'green' => '#526b5d',
            'blue' => '#3d6fa8',
            'plum' => '#432a46',
        ];

        if ($validated['accent_color'] === 'custom') {
            $accentColor = strtolower($validated['custom_color']);
        } else {
            $accentColor = $presetColors[$validated['accent_color']];
        }

        $portfolio->update([
            'accent_color' => $accentColor,
            'layout_style' => $validated['layout_style'],
        ]);

        return redirect()
            ->route('portfolio.preview', $portfolio->id)
            ->with('success', 'Template customization saved successfully.');
    }

    /**
     * Display the selected portfolio template.
     */
    public function preview($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $view = $this->getTemplateView($portfolio);

        return view($view, compact('portfolio'))->with('showNavigation', true);
    }

    /**
     * Display all saved portfolios.
     */
    public function manage()
    {
        $portfolios = Portfolio::latest()->get();

        return view('portfolio.manage', compact('portfolios'));
    }

    /**
     * Download the generated portfolio as an HTML file.
     */
    public function download($id)
{
    $portfolio = Portfolio::findOrFail($id);

    $view = $this->getTemplateView($portfolio);

    $filename = Str::slug(
        $portfolio->full_name ?: 'portfolio'
    ) . '-portfolio.pdf';

    $pdf = Pdf::loadView($view, compact('portfolio'))
        ->setPaper('a4', 'portrait')
        ->setOptions([
            'isRemoteEnabled' => true,
        ]);

    return $pdf->download($filename);
}
    /**
     * Display the edit form.
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolio.edit', compact('portfolio'));
    }

    /**
     * Update existing portfolio information.
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

    /**
     * Delete a portfolio and its stored profile picture.
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

    /**
     * Return the Blade view for the selected template.
     */
    private function getTemplateView(Portfolio $portfolio): string
    {
        return match ($portfolio->template) {
            'modern' => 'portfolio.modern',
            'creative' => 'portfolio.creative',
            default => 'portfolio.simple',
        };
    }
}
