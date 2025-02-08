<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tickets = Ticket::with(['user', 'assignedTo'])->latest()->filter(request(['category', 'id']))->simplePaginate(8);
        return view('tickets.index', [
            'tickets' => $tickets,
        ]);
    }

    // show only the current users tickets
    public function list()
    {
       $user = auth()->user()->id;
       $tickets = Ticket::where('user_id', '=', $user)->with(['user', 'assignedTo'])->latest()->filter(request(['category', 'id']))->simplePaginate(8);

       return view('tickets.index', [
        'tickets' => $tickets,
       ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:60',
            'description' => 'required|max:250',
            'category' => 'required',
            'priority' => 'required',
        ]);
        $validated['user_id'] = auth()->user()->id;
        $validated['assigned_to'] = null;
        $ticket = Ticket::create($validated);
        $ticket->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $ticket = Ticket::with('assignedTo')->find($ticket->id);
        $comments = Comment::where('ticket_id', $ticket->id)->get();
        // dd($comments);
        return view('tickets.show', [
            'ticket' => $ticket,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        // $ticket = Ticket::with(['assignedTo', 'user'])->find($ticket->id);
        $techs = User::where('isAdmin', true)->get();
        return view('tickets.edit', [
            'ticket' => $ticket,
            'techs' => $techs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $valid = $request->validate([
            'assigned_to' => Rule::requiredIf($request->user()->isAdmin),
            'priority' => 'string',
            'category' => 'string',
            'title' => 'string|max:80',
            'description' => 'string|max:250',
        ]);
    
        $ticket->assigned_to = $valid['assigned_to'];
        $ticket->priority = $valid['priority'];
        $ticket->category = $valid['category'];
        $ticket->title = $valid['title'];
        $ticket->description = $valid['description'];
        $ticket->save();

        return redirect('/ticket/' . $ticket->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
