<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Role;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends BaseApiController
{

    public function index(): JsonResponse
    {
        $tickets = Ticket::withTrashed()->with(["user" , "section"])->get();
        return $this->successResponse(
            TicketResource::collection($tickets),
            trans("Ticket.index_message"),
            201
        );
    }

    public function store(StoreticketRequest $request, Ticket $ticket): JsonResponse
    {
        $create = $ticket->create($request->validated());
        return $this->successResponse(
            TicketResource::make($create),
            trans("Ticket.success_store"),
            201
        );
    }

    public function show(Ticket $ticket): JsonResponse
    {
        return $this->successResponse(
          TicketResource::make($ticket->load(['section', "user"])),
          trans("Ticket.index_message"),
          201
        );
    }


    public function update(UpdateTicketRequest $request, Ticket $ticket): JsonResponse
    {
        $ticket->update($request->validated());
        return $this->successResponse(
          TicketResource::make($ticket),
          trans("Ticket.success_update"),
          201
        );
    }

    public function destroy(Ticket $ticket): JsonResponse
    {
        $ticket->delete();
        return $this->successResponse(
          $ticket->id,
          trans("Ticket.success_delete"),
          201
        );
    }
    public function forceDelete($id)
    {
        $ticket = Ticket::withTrashed()->findOrFail($id);
        if ($ticket->forceDelete()) {
            return "deleted successfully";
        } else {
            return "warning!";
        }
    }
    public function restore($id): string
    {
        $ticket = Ticket::onlyTrashed()->findOrFail($id);
        $ticket->restore();
        if ($ticket->restore()) {
            return "restore element successfully";
        } else {
            return "warning!";
        }
    }
}
