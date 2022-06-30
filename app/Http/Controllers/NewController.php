<?php
  
namespace App\Http\Controllers;
   
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(5);
    
        return view('news.index',compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description'=>'required',
            'author'=>'required'
        ]);
    
        News::create($request->all());
     
        return redirect()->route('news.index')
                        ->with('success','1 new created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\News  $product
     * @return \Illuminate\Http\Response
     */
    public function show(News $new)
    {

        return view('news.show',compact('new'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new =  News::find($id);
        return view('news.edit',compact('new'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description'=>'required',
            'author'=>'required'
        ]);
        $new =  News::find($id);
        $new->update($request->all());
    
        return redirect()->route('news.index')
                        ->with('success','1 New updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new =  News::find($id);
        $new->delete();
    
        return redirect()->route('news.index')
                        ->with('success','1 New deleted successfully');
    }
}