<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTicketForm;
use App\Http\Requests\EditTicketForm;
use App\Ticket;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list all tickets
        $tickets = Ticket::all();
        //the method compact transform the result in array and pass it to the view
        return view('tickets.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTicketForm $request)
    {
        $slug = uniqid();
        $title = $request->title;
        $content = $request->content;
        
        $ticket = new Ticket(array(
            'title' => $title,
            'content' => $content,
            'slug' => $slug
        ));

        $ticket->save();

        $data = array(
            'slug' => $slug
        );
        
        Mail::send('emails.ticket',$data,function($message){
            $message->from('codigogmgs@gmail.com','Tickets App');
            $message->to('codigogmgs@gmail.com')->subject('New ticket received');
        });

        return redirect('/contact')->with('status','Your ticket has been created! Its unique id is: '.$slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $comments = $ticket->comments()->get();

        return view('tickets.show',compact('ticket','comments')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //select the ticket which id is 12
        $ticket = Ticket::whereSlug($slug)->firstOrFail();

        return view('tickets.edit',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTicketForm $request, $slug)
    {
        //select the ticket which slug is passed like parameter and update the register
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->title = $request->title;
        $ticket->content = $request->content;
        if($request->status != null){
            $ticket->status = 0;
        }else{
            $ticket->status = 1;
        }
        $ticket->save();

        return redirect(action('TicketsController@edit',$ticket->slug))->with('status','The ticket '.$ticket->slug.' has been modified successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->delete();

        return redirect('/tickets')->with('status','The ticket '.$ticket->slug.' has been deleted sccessfully!');
    }
}
