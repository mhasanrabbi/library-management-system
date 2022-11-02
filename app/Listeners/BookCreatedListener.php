<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\BookCreated;
use Illuminate\Support\Carbon;
use App\Mail\NewbookNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Queue\InteractsWithQueue;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ModelUeserGetNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class BookCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BookCreated  $event
     * @return void
     */
    public function handle(BookCreated $event)
    {
        // 'user_email',
        // 'book_name',
        // 'book_autor',
        // 'from_avaiable'
        // dump($event->book->updated_at->format('Y-m-d H:i:s'));
        // dump($detailsBook);
        // dump($detailsBook->title);
        // dump($event->book->author->author_name);
        // dump($event->book->category);


        $detailsBook = $event->book;
        $fromAvailableTime = Carbon::now()->toDateTimeString();

        $users = DB::table('users')->where('role', '=', 0)->get();
        // dd($users);

        foreach ($users as $user) {

            $input['user_email'] = $user->email;
            $input['book_name'] = $detailsBook->title;
            $input['book_autor'] =  $detailsBook->author->author_name;
            $input['book_category'] = $detailsBook->category;
            $input['from_avaiable'] = $fromAvailableTime;
            $input['title'] =  'new book added';
            $input['url'] = 'https://www.abdulla.com';

            // $user = User::find($user->email)->toArray();


            Mail::to($input['user_email'])->send(new NewbookNotification($input));

            
            // return response()->json([
            //     'message' => 'Email has been sent.'
            // ], Response::HTTP_OK);



            $saveNotification = ModelUeserGetNotification::create($input);
        }
        return redirect()->back()->with('success', 'Your email was sent!');




        // Mail::send('testemail', $data, function ($message) use ($input) {
        //     $message->to($input['user_email'], "abdulla rakib");
        //     $message->subject('Event Testing');
        // });

        // Mail::to('your_email@gmail.com')->send(new DemoMail($mailData));

        // dd("Email is sent successfully.");


        // $user = User::find($event->userId)->toArray();

        // Session::flash('success', 'Your email was sent!');

        // return   $saveNotification;

        // Notification::send($users, new BookCreatedNotification($event->project));
    }
}