<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Like;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
        'game_title' => 'required|string|max:255',
        'game_description' => 'required|string',
        'game_rating' => 'required|integer|min:1|max:10',
        'game_status' => 'required|string',
        'category_id' => 'required|exists:category,id',
        'platform_id' => 'required|exists:platforms,id',
        'game_image' => 'nullable|url',
        'game_duration' => 'nullable|string|max:20',
        ]);

        $review = Review::create([
            'user_id' => auth()->id(),
            'game_title' => $request->game_title,
            'game_description' => $request->game_description,
            'game_image' => $request->game_image,
            'game_rating' => $request->game_rating,
            'game_status' => $request->game_status,
            'category_id' => $request->category_id,
            'platform_id' => $request->platform_id,
            'game_duration' => $request->game_duration,
            'review_likes' => 0,
        ]);

        return response()->json(['message' => 'Review criada com sucesso!', 'review' => $review]);
    }

    public function toggleLike($id)
    {
        $review = Review::findOrFail($id);
        $user = auth()->user();

        $like = Like::where('user_id', $user->id)
                    ->where('review_id', $review->id)
                    ->first();

        if ($like) {
            // Remover like
            $like->delete();
            $review->decrement('review_likes');
            $liked = false;
        } else {
            // Adicionar like
            Like::create([
                'user_id' => $user->id,
                'review_id' => $review->id,
            ]);
            $review->increment('review_likes');
            $liked = true;
        }

        return response()->json([
            'likes' => $review->review_likes,
            'liked' => $liked
        ]);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        if ($review->user_id !== auth()->id()) {
            return response()->json(['message' => 'Acesso negado.'], 403);
        }

        $review->delete();

        return response()->json(['message' => 'Análise excluída com sucesso.']);
    }

}
