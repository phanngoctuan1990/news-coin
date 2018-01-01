<?php

namespace App\Http\Controllers\Admin;

use Mail;
use Carbon\Carbon;
use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyContactRequest;

class ContactUsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contact_us.index');
    }

    /**
     * Show the form detail contact us
     *
     * @param integer $id contact us id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactUs             = ContactUs::find($id);
        $contactUs->name       = htmlentities($contactUs->name);
        $contactUs->subject    = htmlentities($contactUs->subject);
        $contactUs->message    = htmlentities($contactUs->message);
        return view('admin.contact_us.show', compact('contactUs'));
    }

    /**
     * Reply mail.
     *
     * @param ReplyContactRequest $request request reply
     * @param int                 $id      contact us id
     *
     * @return \Illuminate\Http\Response
     */
    public function reply(ReplyContactRequest $request, $id)
    {
        // update status reply
        $contactUs = ContactUs::find($id);
        $contactUs->replied = ContactUs::TYPE_REPLIED;
        $contactUs->save();

        // send mail
        $data['subject'] = $request->subject;
        $data['emailTo'] = $request->mail_to;
        $data['bodyMessage'] = $request->message;
        Mail::send('emails.reply-contact', $data, function ($message) use ($data) {
            $message->from(env('MAIL_USERNAME'), 'idautu.com')
                    ->to($data['emailTo'])
                    ->subject($data['subject']);
        });

        flash('Trả lời mail thành công', 'success');
        return redirect()->back();
    }

    /**
     * Get list contact us show datatables
     *
     * @return void
     */
    public function datatables()
    {
        $result = \Datatables::of(ContactUs::query())
            ->addColumn('action', 'admin.contact_us.datatables.browser')
            ->editColumn('name', function ($data) {
                return htmlentities($data->name);
            })
            ->editColumn('subject', function ($data) {
                return htmlentities($data->subject);
            })
            ->editColumn('replied', function ($data) {
                if ($data->replied == ContactUs::TYPE_NO_REPLIED) {
                    return '<span class="label label-warning">Chờ trả lời...</span>';
                }
                return '<span class="label label-success">Đã trả lời</span>';
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d-m-Y');
            })
            ->make(true);

        return $result;
    }
}
