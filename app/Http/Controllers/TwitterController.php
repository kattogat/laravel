<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TwitterController extends Controller
{
    public function countWordsInTweets() {
        $tweets = Tweet::all();
        echo Tweet::countWords($tweets);
        //return View('twitter/index', ['tweets' => $send]);
    }

    public function searchTweets() {
        return View('twitter/index');
    }

    public function countWordsInTweetsAndSort(Request $request) {
        $ThemTweets = Tweet::getTweets($request->twittertoken, $request->word);
        $countedAndSorted = Tweet::countAndSort($ThemTweets);

        return View('twitter/show', ['words' => $countedAndSorted]);
    }
}
