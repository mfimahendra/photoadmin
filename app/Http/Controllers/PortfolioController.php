<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display portfolio management page
     */
    public function index()
    {
        $universities = DB::table('m_universities')
            ->orderBy('university', 'asc')
            ->get();

        // Load existing portfolio images from storage
        $portfolioFiles = [];
        if (Storage::disk('public')->exists('portfolio')) {
            $files = Storage::disk('public')->files('portfolio');
            foreach ($files as $file) {
                $filename = basename($file);
                $url = Storage::url($file);
                
                // Parse university prefix from filename
                $parts = explode('_', $filename, 2);
                $universityCode = count($parts) > 1 ? $parts[0] : 'Unknown';
                
                $portfolioFiles[] = [
                    'filename' => $filename,
                    'url' => $url,
                    'university_code' => $universityCode,
                    'path' => $file
                ];
            }
        }

        // Group by university
        $groupedPortfolio = collect($portfolioFiles)->groupBy('university_code');

        return view('portfolio.index', [
            'universities' => $universities,
            'groupedPortfolio' => $groupedPortfolio
        ]);
    }

    /**
     * Upload portfolio images
     */
    public function upload(Request $request)
    {
        try {
            $request->validate([
                'university_id' => 'required|exists:m_universities,id',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120' // 5MB max
            ]);

            $university = DB::table('m_universities')
                ->where('id', $request->university_id)
                ->first();

            if (!$university) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'University not found'
                ], 404);
            }

            // Extract university code (first word or abbrev)
            $universityCode = $this->extractUniversityCode($university->university);

            $uploadedFiles = [];

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $image->getClientOriginalExtension();
                    
                    // Create filename with university prefix: [CODE]_[timestamp]_[original].[ext]
                    $filename = $universityCode . '_' . time() . '_' . $originalName . '.' . $extension;
                    
                    // Store in public/portfolio
                    $path = $image->storeAs('portfolio', $filename, 'public');
                    
                    $uploadedFiles[] = [
                        'filename' => $filename,
                        'url' => Storage::url($path)
                    ];
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => count($uploadedFiles) . ' image(s) uploaded successfully',
                'files' => $uploadedFiles
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Delete portfolio image
     */
    public function delete(Request $request)
    {
        try {
            $filename = $request->input('filename');
            $path = 'portfolio/' . $filename;

            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
                
                return response()->json([
                    'status' => 'success',
                    'message' => 'Image deleted successfully'
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'File not found'
            ], 404);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Extract university code from university name
     * If it's already a short code (2-8 chars, all caps), use it
     * Otherwise, extract first letters of words
     */
    private function extractUniversityCode($universityName)
    {
        $name = trim($universityName);
        
        // If already short and uppercase (like ITB, UI, UGM), use as is
        if (strlen($name) <= 8 && strtoupper($name) === $name && !str_contains($name, ' ')) {
            return $name;
        }

        // Otherwise, extract initials from each word
        $words = explode(' ', $name);
        $code = '';
        
        foreach ($words as $word) {
            // Skip common words
            $word = trim($word);
            if (in_array(strtolower($word), ['universitas', 'institut', 'politeknik', 'sekolah', 'tinggi', 'dr', 'prof'])) {
                continue;
            }
            
            if (!empty($word)) {
                $code .= strtoupper(substr($word, 0, 1));
            }
        }

        // If no code extracted, use first 3 chars
        if (empty($code)) {
            $code = strtoupper(substr($name, 0, 3));
        }

        return $code;
    }
}
