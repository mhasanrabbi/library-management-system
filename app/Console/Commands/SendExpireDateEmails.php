<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\BookBorrow;
use Illuminate\Console\Command;
use App\Mail\ReminderEmailDigest;
use Illuminate\Support\Facades\Mail;

class SendExpireDateEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'date:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to user about due date.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // get all due dates for today
        $books = BookBorrow::query()->where('due_date', '<', \Carbon\Carbon::now())->where('status', '0')->orderBy('user_id')->get();

        // group by user
        $data = [];
        foreach ($books as $book) {
            $data[$book->user_id][] = $book->toArray();
        }

        // dd($data);
        // send email

        foreach ($data as $userId) {
            // $this->sendEmailToUser($userId);
        }

        // return Command::SUCCESS;
        // dd($userId);
        dd(User::all());
    }

    // private function sendEmailToUser($userId)
    // {
    //     dd(User::find($userId));
    //     $user = User::find($userId);

    //     Mail::to($user)->send(new ReminderEmailDigest());
    // }
}