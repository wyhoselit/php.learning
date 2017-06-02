<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Quote;
use App\Events\QuoteCreated;
use Illuminate\Support\Facades\Event;

class QuoteController extends Controller
{
  public function getHome($author = null){
    $quotes = null;
    $msg = "";
    if(!is_null($author)){
      $filter_author = Author::where('name','like','%'.$author.'%')->first();
      if($filter_author){
        $quotes = $filter_author
                ->quotes()
                ->orderBy('created_at','desc')
                ->paginate(6);
      }
    }
    if(is_null($quotes) || !$quotes){
      $quotes = Quote::orderBy('created_at','desc')
              ->paginate(6);
    }

    return view('home',['quotes'=>$quotes]);
  }

  public function postQuote(Request $request){

    $this->validate($request, [
      'author' => 'required|max:60',
      'quote' => 'required|max:500'
    ]);
    $authorText = ucfirst($request->author);
    $quoteText = $request->quote;

    $author = Author::where('name',$authorText)->first();

    if(!$author){
      //if new add new author in db.
      $author = new Author();
      $author->name = $authorText;
      $author->save();
    }
    $quote = new Quote();
    $quote->quote = $quoteText;
    //save with relation author;
    $author->quotes()->save($quote);
    Event::fire(new QuoteCreated($author));

    return redirect()->route('home')->with([
              'success' => 'Quote saved!'
            ]);
  }

  public function deleteQuote($quote_id){

    // $quote = Quote::where('id', $quote_id)->first();
    $quote = Quote::find($quote_id);
    $is_author_delete = false;
    if(Count($quote->author->quotes)== 1){
      $quote->author()->delete();
      $is_author_delete = true;
    }
    $quote->delete();
    $msg = $is_author_delete ? 'Quote and Author deleted!': 'Quote deleted';
    return redirect()->route('home')
          ->with(['success' => $msg]);
  }
}
