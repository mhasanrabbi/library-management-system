<?php

namespace App\Listeners;

use App\Events\BookCreated;
use App\Models\User;
use App\Notifications\NewBookArrivedNotification;
use Illuminate\Support\Carbon;
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
    public function handle( BookCreated $event )
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

        // $users = DB::table('users')->where('role', '=', 0)->get();


        $users = User::where('role', 0)->get();
        // foreach($users as $user){
        //     $usersEmail[] = $user->email;
        // }
        // dd($usersEmail);

        // $input['title'] =  'new book added';
        // $input['book_name'] = $detailsBook->title;
        // $input['book_autor'] =  $detailsBook->author->author_name;
        // $input['book_category'] = $detailsBook->category;
        // $input['from_avaiable'] = $fromAvailableTime;
        // $input['url'] = 'https://www.abdulla.com';

        // dd($input);

        $details = [
            'greeting'   => 'Hi Artisan',
            'body'       => 'This is my first notification from Nicesnippests.com',
            'thanks'     => 'Thank you for using Nicesnippests.com tuto!',
            'actionText' => 'View My Site',
            'actionUrl'  => url( '/' ),
            'order_id'   => 101,
        ];

        Notification::send( $users, new NewBookArrivedNotification(  $details) );
        // Notification::send( $user, new NewBookArrivedNotification( $input ) );
        // Notification::send( $usersEmail, new NewBookArrivedNotification($input));

        // foreach ($users as $user) {
        // $input['user_email'] = $user->email;

        // ->line("Book Name: " . $this->offerData['book_name'])
        // ->line("Url: " . $this->offerData['url'])
        // ->line("Book author Name: " . $this->offerData['book_autor'])
        // ->line("Book Category: " . $this->offerData['book_category'])
        // ->line("Book from avaiable: " . $this->offerData['from_avaiable']);

        // $user = User::find($user->email)->toArray();

        // Mail::to($input['user_email'])->send(new NewbookComingEmail($input));

        // return response()->json([
        //     'message' => 'Email has been sent.'
        // ], Response::HTTP_OK);

        // $saveNotification = ModelUeserGetNotification::create($input);
        // }

        return redirect()->back()->with( 'success', 'Your email was sent!' );

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
