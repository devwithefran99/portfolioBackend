<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background:#f4f4f4; margin:0; padding:0; }
        .wrap { max-width:580px; margin:30px auto; background:#fff; border-radius:10px; overflow:hidden; }
        .header { background:#1a1a2e; padding:28px 32px; text-align:center; }
        .header h1 { color:#fff; margin:0; font-size:22px; letter-spacing:1px; }
        .header p { color:#aaa; margin:4px 0 0; font-size:13px; }
        .body { padding:32px; }
        .greeting { font-size:17px; color:#222; font-weight:600; margin-bottom:12px; }
        .message { background:#f8f9fa; border-left:4px solid #6c63ff;
                   padding:16px 20px; border-radius:6px; color:#333;
                   font-size:15px; line-height:1.7; margin-bottom:24px; }
        .footer { background:#f4f4f4; padding:18px 32px; text-align:center; }
        .footer p { color:#888; font-size:12px; margin:0; }
        .footer a { color:#6c63ff; text-decoration:none; }
    </style>
</head>
<body>
<div class="wrap">

    <div class="header">
        <h1>Ekram Hossen</h1>
        <p>Graphic & UI Designer — Chattogram</p>
    </div>

    <div class="body">
        <p class="greeting">Hi {{ $clientName }},</p>
        <p style="color:#555;font-size:14px;margin-bottom:16px;">
            Thank you for reaching out! Here's my reply to your message:
        </p>
        <div class="message">{{ $replyMessage }}</div>
        <p style="color:#555;font-size:14px;">
            Feel free to reply to this email if you have any further questions.
            Looking forward to working with you!
        </p>
        <p style="color:#555;font-size:14px;margin-top:20px;">
            Best regards,<br>
            <strong>Ekram Hossen</strong><br>
            <a href="mailto:ekramhusain60@gmail.com" style="color:#6c63ff;">ekramhusain60@gmail.com</a>
        </p>
    </div>

    <div class="footer">
        <p>© 2026 Ekram Hossen Portfolio &nbsp;|&nbsp;
           <a href="#">Chattogram, Bangladesh</a>
        </p>
    </div>

</div>
</body>
</html>