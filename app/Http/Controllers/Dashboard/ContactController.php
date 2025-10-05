<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Notifications\NotifyUser;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Dashboard\MainController;

class ContactController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        parent::__construct();
        $this->setClass('contacts');
    }
    public function index()
    {

        $contacts = Contact::filter(request())->paginate($this->perPage);
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->is_read = true;
        $contact->save();
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
        public function sendMessage($id, Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "body" => "required|string"
        ]);
        $message = Contact::findOrFail($id);
        Notification::route('mail', $message->email)
            ->notify(new NotifyUser($request->body,  $request->title));
        
        return redirect()->back()->with('success', __('site.send_message_successfully'));
    }
}
