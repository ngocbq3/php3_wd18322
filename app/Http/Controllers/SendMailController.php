<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendMail()
    {
        $tieude = "Liên hệ việc làm";
        $hoten = "Bùi Quang Ngọc";
        $noidung = "Tôi thấy công ty đang tuyển nhân sự, vì vậy tôi viết thư này <br> liên hệ với quý công ty để được phỏng vấn";

        //Gửi mail
        Mail::mailer()
            ->to('ngocbq@fpt.edu.vn')
            ->send(new SendMail($tieude, $hoten, $noidung));

        return "Gửi mail thành công";
    }
}
