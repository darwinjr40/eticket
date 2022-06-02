<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketApiController extends Controller
{
    public function index()
    {
        $ticket = Ticket::included()
                    ->filter()
                    ->sort()
                    ->getOrPaginate();
        return TicketResource::collection($ticket);
    }

    public function store(Request $request)
    {
        $date = request()->validate(Ticket::$rules);
        $ticket = Ticket::create($request->all());
        return TicketResource::make($ticket);
    }


    public function show($id)
    {
        $ticket = Ticket::included()->findOrFail($id);
        return TicketResource::make($ticket);
    }

    public function update(Request $request,  $id)
    {
        $ticket = Ticket::findOrFail($id);
        request()->validate(Ticket::$rules);
        $ticket->update($request->all());
        $ticket->save();
        return TicketResource::make($ticket);
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return TicketResource::make($ticket);
    }
}
