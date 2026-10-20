<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function home()
    {
        return view('portfolio.home');
    }

    protected function findOwnedPortfolio(int $id): Portfolio
    {
        $portfolio = Portfolio::find($id);

        abort_unless(
            $portfolio && $portfolio->user_id === auth()->id(),
            403,
            'You do not have permission to access this portfolio.'
        );

        return $portfolio;
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

        $validated['user_id'] = auth()->id();
        $validated['template'] = 'simple';

        $portfolio = Portfolio::create($validated);

        return redirect()
            ->route('portfolio.templates', $portfolio->id)
            ->with('success', 'Portfolio information saved successfully.');
    }

    public function templates($id)
    {
        $portfolio = $this->findOwnedPortfolio((int) $id);

        return view('portfolio.templates', compact('portfolio'));
    }

    public function simple($id)
    {
        $portfolio = $this->findOwnedPortfolio((int) $id);

        $portfolio->update([
            'template' => 'simple',
        ]);

        return redirect()->route('portfolio.customize', $portfolio->id);
    }

    public function modern($id)
    {
        $portfolio = $this->findOwnedPortfolio((int) $id);

        $portfolio->update([
            'template' => 'modern',
        ]);

        return redirect()->route('portfolio.customize', $portfolio->id);
    }

    public function creative($id)
    {
        $portfolio = $this->findOwnedPortfolio((int) $id);

        $portfolio->update([
            'template' => 'creative',
        ]);

        return redirect()->route('portfolio.customize', $portfolio->id);
    }

    public function customize($id)
    {
        $portfolio = $this->findOwnedPortfolio((int) $id);

        return view('portfolio.customize', compact('portfolio'));
    }

    public function saveCustomization(Request $request, $id)
    {
        $portfolio = $this->findOwnedPortfolio((int) $id);

        $validated = $request->validate([
            'accent_color' => 'required|string|max:255',
            'layout_style' => 'required|string|max:255',
        ]);

        $portfolio->update($validated);

        return redirect()
            ->route('portfolio.preview', $portfolio->id)
            ->with('success', 'Template customization saved successfully.');
    }

    public function preview($id)
    {
        $portfolio = $this->findOwnedPortfolio((int) $id);

        return match ($portfolio->template) {
            'modern' => view('portfolio.modern', compact('portfolio')),
            'creative' => view('portfolio.creative', compact('portfolio')),
            default => view('portfolio.simple', compact('portfolio')),
        };
    }

    public function manage()
    {
        $portfolios = Portfolio::where('user_id', auth()->id())->latest()->get();

        return view('portfolio.manage', compact('portfolios'));
    }

    public function edit($id)
    {
        $portfolio = $this->findOwnedPortfolio((int) $id);

        return view('portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = $this->findOwnedPortfolio((int) $id);

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
            if ($portfolio->profile_picture && Storage::disk('public')->exists($portfolio->profile_picture)) {
                Storage::disk('public')->delete($portfolio->profile_picture);
            }

            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('profile-pictures', 'public');
        }

        $portfolio->update($validated);

        return redirect()->route('portfolio.manage')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy($id)
    {
        $portfolio = $this->findOwnedPortfolio((int) $id);

        if ($portfolio->profile_picture && Storage::disk('public')->exists($portfolio->profile_picture)) {
            Storage::disk('public')->delete($portfolio->profile_picture);
        }

        $portfolio->delete();

        return redirect()->route('portfolio.manage')->with('success', 'Portfolio deleted successfully.');
    }

    public function toggleShare(Request $request, $id)
    {
        $portfolio = $this->findOwnedPortfolio((int) $id);
        $isPublic = $request->boolean('is_public', false);

        if ($isPublic) {
            $portfolio->is_public = true;
            $portfolio->share_token = $portfolio->share_token ?: Str::random(40);
        } else {
            $portfolio->is_public = false;
            $portfolio->share_token = null;
        }

        $portfolio->save();

        $message = $isPublic
            ? 'Public sharing enabled for this portfolio.'
            : 'Public sharing disabled for this portfolio.';

        return redirect()->route('portfolio.manage')->with('success', $message);
    }

    public function publicPortfolio(string $token)
    {
        $portfolio = Portfolio::where('is_public', true)
            ->where('share_token', $token)
            ->firstOrFail();

        return match ($portfolio->template) {
            'modern' => view('portfolio.modern', compact('portfolio')),
            'creative' => view('portfolio.creative', compact('portfolio')),
            default => view('portfolio.simple', compact('portfolio')),
        };
    }
}